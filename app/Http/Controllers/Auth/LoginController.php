<?php

namespace App\Http\Controllers\Auth;

use App\Commons\APICode;
use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $user;
    protected $response;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Response $response)
    {
        $this->middleware('guest')->except('logout');
        $this->user = $user;
        $this->response = $response;
    }

    public function login(Request $request)
    {
        $validator = $this->user->validateLogin($request);

        if ($validator->code == APICode::SUCCESS) {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $validator->code = APICode::PAGE_NOT_FOUND;
                $validator->message = 'Email not found!';
            } else {
                if ($user->status === 0) {
                    $validator->code = APICode::PERMISSION_DENIED;
                    $validator->message = 'Account is deactive!';
                } elseif (!Hash::check($request->password, $user->password)) {
                    $validator->code = APICode::PAGE_NOT_FOUND;
                    $validator->message = 'Wrong password!';
                } else {
                    Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
                    $user = $this->guard()->user();

                    if (Schema::hasColumn('users', 'api_token')) {
                        $user->generateApiToken();
                    }

                }
            }
        }

        return $this->response->formatResponse($validator->code, null, $validator->message);
    }
}
