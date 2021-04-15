<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Hotel extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'hotels';
    public $translatedAttributes = ['about', 'policy', 'short_description', 'address'];

    protected $fillable = [
        'name', 'slug', 'address', 'about', 'policy', 'short_description', 'city_id', 'is_verified', 'is_enable', 'is_featured', 'viewed', 'star', 'liked', 'dislike', 'checkin', 'shared', 'manager_id', 'is_branch', 'belong', 'thumb', 'language', 'google_map'
    ];

    protected $hidden = [];

    public function getListByCity($city_id)
    {
        $hotels = self::query();
        if ($city_id) {
            $hotels->where('city_id', $city_id);
        }
        $hotels = $hotels->orderBy('created_at', 'desc')->get();
        return $hotels;
    }

    public function room()
    {
        return $this->hasMany('App\Models\Room', 'hotel_id', 'id');
    }

}
