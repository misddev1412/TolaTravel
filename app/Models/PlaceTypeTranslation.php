<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PlaceTypeTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}