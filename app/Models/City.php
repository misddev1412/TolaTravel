<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'intro', 'description'];

    protected $table = 'cities';

    protected $fillable = [
        'country_id', 'slug',
        'thumb', 'banner', 'best_time_to_visit', 'currency', 'language', 'lat', 'lng', 'seo_title', 'seo_description',
        'priority', 'status'
    ];

    protected $hidden = [];

    protected $casts = [
        'country_id' => 'integer',
        'priority' => 'integer',
        'lat' => 'double',
        'lng' => 'double',
        'status' => 'integer',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function places()
    {
        return $this->hasMany(Place::class, 'city_id');
    }

    public function getListByCountry($country_id)
    {
        $cities = self::query();
        if ($country_id) {
            $cities->where('country_id', $country_id);
        }
        $cities = $cities->orderBy('created_at', 'desc')->get();
        return $cities;
    }

    public function getBySlug($slug)
    {
        return self::query()
            ->with('country')
            ->where('slug', $slug)
            ->first();
    }
}