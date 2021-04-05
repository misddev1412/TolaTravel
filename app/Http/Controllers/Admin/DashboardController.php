<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\City;
use App\Models\Place;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $count_cities = City::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        $count_places = Place::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        $count_bookings = Booking::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        $count_reviews = Review::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        $count_users = User::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        return view('admin.dashboard.index', [
            'count_cities' => $count_cities,
            'count_places' => $count_places,
            'count_bookings' => $count_bookings,
            'count_reviews' => $count_reviews,
            'count_users' => $count_users,
        ]);
    }
}