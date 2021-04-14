<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    protected $fillable = [
        'disk', 'original_image', 'thumbnail', 'big_image', 'big_image_two', 'medium_image', 'medium_image_two', 'medium_image_three', 'small_image'
    ];

}
