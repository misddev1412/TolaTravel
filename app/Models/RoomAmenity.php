<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoomAmenity extends Model
{

    protected $table = 'room_amenity';

    protected $fillable = [
        'room_id', 'amenity_id'
    ];

}
