<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HotelController extends Controller
{

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function list()
    {

    }

    public function detail(Request $request, $slug, $cat_slug = null)
    {
      

        return view('frontend.hotel.detail');
    }

    public function getListByCountry($country_id)
    {
        $cities = City::query();
        if ($country_id) {
            $cities->where('country_id', $country_id);
        }
        $cities = $cities->orderBy('created_at', 'desc')->get();
        return $cities;
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $cities = City::query();

        if (isset($keyword)) {
            $cities->whereTranslationLike('name', "%{$keyword}%");
        }

        $cities = $cities->limit(20)->get();

        return $cities;
    }

    public function getListMoreByCountry($country_id, Request $request)
    {
        $cities = City::query();
        if ($country_id) {
            $cities->where('country_id', $country_id);
        }
        $cities = $cities->orderBy('created_at', 'desc')->paginate(12);
        return view('frontend.hotel.list', [
            'cities'    => $cities
        ]);
    }
}
