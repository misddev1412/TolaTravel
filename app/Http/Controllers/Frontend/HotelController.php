<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Hotel;
use App\Models\Country;
use App\Models\RoomAmenity;
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

    public function detail(Request $request, $country_slug, $hotel_slug)
    {
        $detail = Hotel::where('slug', $hotel_slug)->with('room')->with('room.room_type')
        ->with('room.images')
        ->with('room.amenities')
        ->first();
        $data['detail']  = $detail;
        // dd($detail);
        return view('frontend.hotel.detail', $data);
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

    public function getListMoreByCountry($country_slug, Request $request)
    {
        $hotels = Hotel::select();
        $country_id = Country::select('id')->where('slug', $country_slug)->first()->id ?? null;
        if ($country_id) {
            $hotels->where('country_id', $country_id);
        }

        $hotels = $hotels->orderBy('created_at', 'desc')->paginate(12);

    
        $hotels->map(function ($collection) {
            $roomIds    = [];
            foreach ($collection->room as $room) {
                $roomIds[] = $room->id;
            }
            $amenlities = RoomAmenity::select('amenity_id')->whereIn('room_id', $roomIds)->get();
            $amenlitiesIds = [];
            foreach ($amenlities as $item) {
                $amenlitiesIds[] = $item->amenity_id;
            }
            $listAmenlitiesByRoom = Amenities::select('id', 'name', 'icon')->whereIn('id', $amenlitiesIds)->get()->toArray();
            $collection->amenlities = $listAmenlitiesByRoom;

            $collection->price  = $collection->room->avg('price') ?? 0;
            $collection->promotion_price  = $collection->room->avg('promotion_price');
        });


        return view('frontend.hotel.list', [
            'hotels'    => $hotels,
            'country_slug' => $country_slug
        ]);
    }
}
