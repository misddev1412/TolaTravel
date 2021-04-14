<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

    protected $table = 'room_type';

    protected $fillable = [
        'name'
    ];

}
