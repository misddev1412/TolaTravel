<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoomGallery extends Model
{

    protected $table = 'room_gallery';

    protected $fillable = [
        'room_id', 'image_id'
    ];

}
