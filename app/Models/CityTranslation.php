<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'intro', 'description'];
}