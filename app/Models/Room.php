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
        return $this->hasOne('App\Models\RoomType', 'id', 'room_type_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'room_gallery', 'room_id', 'image_id');
    }

    public function amenities()
    {
        return $this->belongsToMany('App\Models\Amenities', 'room_amenity', 'room_id', 'amenity_id');

    }
}
