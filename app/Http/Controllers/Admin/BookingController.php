<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function list()
    {
        $bookings = Booking::query()
            ->with('user')
            ->with('place')
            ->orderBy('created_at', 'desc')
            ->get();

//        return $bookings;

        return view('admin.booking.booking_list', [
            'bookings' => $bookings
        ]);
    }

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = Booking::find($request->booking_id);
        $model->fill($data)->save();

        return back()->with('success', 'Update status success!');
    }
}