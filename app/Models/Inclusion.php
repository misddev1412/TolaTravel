<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Inclusion extends Model
{

    protected $table = 'inclusions';

    protected $fillable = [
        'name', 'icon'
    ];

}
