<?php

namespace App\Models;


use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use Translatable;

    public $translatedAttributes = ['name'];

    protected $table = 'amenities';

    protected $fillable = ['icon', 'category'];

    protected $hidden = [];

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;

    const TYPE              = [
        1                   => 'Furniture',
        2                   => 'Outside',
        3                   => 'Utilities',
    ];
    const TYPE_FURNITURE    = 1;
    const TYPE_OUTSIDE      = 2;
    const TYPE_UTILITIES    = 3;


    public function getListAll()
    {
        $amenities = self::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return $amenities;
    }
}