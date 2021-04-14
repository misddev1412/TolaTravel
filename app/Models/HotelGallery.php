<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HotelGallery extends Model
{

    protected $table = 'hotel_gallery';

    protected $fillable = [
        'hotel_id', 'image_id'
    ];

}
