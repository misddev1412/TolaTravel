<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $table = 'amenities';

    protected $fillable = ['icon'];

    protected $hidden = [];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    public function getListAll()
    {
        $amenities = self::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return $amenities;
    }
}