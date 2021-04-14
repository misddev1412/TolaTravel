<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $table = 'rooms';

    protected $fillable = [
        'room_type_id', 'price', 'promotion_price', 'capacity', 'bed', 'booked', 'pass_wifi', 'thumb', 'hotel_id'
    ];


    public function room_type()
    {
        return $this->hasMany('App\Models\RoomType', 'id', 'room_type_id');
    }
}
