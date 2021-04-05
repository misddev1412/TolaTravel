<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'user_id', 'place_id', 'numbber_of_adult', 'numbber_of_children', 'date', 'time',
        'name', 'email', 'phone_number', 'message', 'type', 'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'user_id' => 'integer',
        'place_id' => 'integer',
        'numbber_of_adult' => 'integer',
        'numbber_of_children' => 'integer',
        'type' => 'integer',
        'status' => 'integer'
    ];

    const TYPE_BOOKING_FORM = 1;
    const TYPE_CONTACT_FORM = 2;
    const TYPE_AFFILIATE = 3;
    const TYPE_BANNER = 4;

    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PENDING = 2;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function place()
    {
        return $this->hasOne(Place::class, 'id', 'place_id');
    }


}