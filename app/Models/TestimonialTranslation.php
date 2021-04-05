<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'job_title', 'content'];
}
