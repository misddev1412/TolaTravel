<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Place;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function booking(Request $request)
    {
        $request['user_id'] = Auth::id();

        if ($request->date) {
            $request['date'] = Carbon::parse($request->date);
        }

        $data = $this->validate($request, [
            'user_id' => '',
            'place_id' => '',
            'numbber_of_adult' => '',
            'numbber_of_children' => '',
            'date' => '',
            'time' => '',
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'message' => '',
            'type' => ''
        ]);

        $booking = new Booking();
        $booking->fill($data);

        if ($booking->save()) {
            $place = Place::find($request['place_id']);

            if ($request->type == Booking::TYPE_CONTACT_FORM) {
                Log::debug("Booking::TYPE_CONTACT_FORM: " . $request->type);
                $name = $request->name;
                $email = $request->email;
                $phone = $request->phone_number;
                $datetime = "";
                $numberofadult = "";
                $numberofchildren = "";
                $text_message = $request->message;
            } else {
                Log::debug("Booking::submit: " . $request->type);
                $name = user()->name;
                $email = user()->email;
                $phone = user()->phone_number;
                $datetime = Carbon::parse($booking->date)->format('Y-m-d') . " " . $booking->time;
                $numberofadult = $booking->numbber_of_adult;
                $numberofchildren = $booking->numbber_of_children;
                $text_message = "";
            }

            Mail::send('frontend.mail.new_booking', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'place' => $place->name,
                'datetime' => $datetime,
                'numberofadult' => $numberofadult,
                'numberofchildren' => $numberofchildren,
                'text_message' => $text_message,
                'booking_at' => $booking->created_at
            ], function ($message) use ($request) {
                $message->to(setting('email_system'), "{$request->first_name}")->subject('Booking from ' . $request->first_name);
            });

        }

        return $this->response->formatResponse(200, $booking, 'You successfully created your booking!');
    }
}