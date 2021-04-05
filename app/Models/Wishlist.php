<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';

    protected $fillable = [
        'user_id', 'place_id'
    ];

    protected $hidden = [];

    protected $casts = [
        'user_id' => 'integer',
        'place_id' => 'integer'
    ];
}