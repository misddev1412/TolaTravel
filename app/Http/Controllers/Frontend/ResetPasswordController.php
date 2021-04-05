<?php

namespace App\Http\Controllers\Frontend;

use App\Commons\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;


class ResetPasswordController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        if (!$user) {
            return $this->response->formatResponse(200, [], 'Email not found!');
        }

        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);

        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }

        return $this->response->formatResponse(200, [], 'Password reset email has been sent.');
    }

    public function reset(Request $request)
    {
        $token = $request->token;
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            return back()->with('error', 'This password reset token is invalid.');
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            return back()->with('error', 'This password reset token is invalid.');
        }

        $user = User::where('email', $passwordReset->email)->firstOrFail();

        if (!$user) {
            return back()->with('error', 'We can\'t find a user with that e-mail address.');
        }

        $updatePasswordUser = $user->update(['password' => bcrypt($request->password)]);
        $passwordReset->delete();

        return back()->with('success', 'Your password has been reset successfully. You can login with your new password now!');
    }
}
