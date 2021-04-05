<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Translatable;

    protected $table = "testimonials";

    protected $fillable = ['avatar', 'status'];

    protected $hidden = [];

    protected $casts = [];

    public $translatedAttributes = ['name', 'job_title', 'content'];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

}
