<?php

namespace App\Http\Controllers\Admin;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Amenities;
use App\Models\Inclusion;
use App\Models\Room;
use App\Models\RoomGallery;
use App\Models\RoomAmenity;
use App\Models\RoomType;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use EasySlugger\Utf8Slugger;

class HotelController extends Controller
{
    private $country;
    private $city;
    private $response;

    public function __construct(Country $country, City $city, Response $response, Hotel $hotel)
    {
        $this->country = $country;
        $this->city = $city;
        $this->response = $response;
        $this->hotel = $hotel;
    }

    public function list(Request $request)
    {
        $param_country_id = $request->country_id;
        $countries  = $this->country->getFullList();
        $cities     = $this->city->getListByCountry($param_country_id);
        $hotels     = $this->hotel->getListByCity($request->city_id);
//        return $cities;

        return view('admin.hotel.list', [
            'countries' => $countries,
            'cities' => $cities,
            'hotels'    => $hotels,
            'country_id' => (int)$param_country_id
        ]);
    }

    public function create(Request $request)
    {
        $request['slug'] = Utf8Slugger::slugify($request->name);
        $data = $request->all();
        // $rule_factory = RuleFactory::make([
        //     'country_id' => 'required',
        //     '%name%' => '',
        //     'slug' => 'required',
        //     '%intro%' => '',
        //     '%description%' => '',
        //     'currency' => '',
        //     'language' => '',
        //     'best_time_to_visit' => '',
        //     'lat' => '',
        //     'lng' => '',
        //     'seo_title' => '',
        //     'seo_description' => '',
        //     'thumb' => 'mimes:jpeg,jpg,png,gif',
        //     'banner' => 'mimes:jpeg,jpg,png,gif'
        // ]);
        // $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }
        if ($request->hasFile('fileUpload')) {
            $banner = $request->file('fileUpload');
            $banner_file = $this->uploadImage($banner, '');
            $data['banner'] = $banner_file;
        }

        $result = Hotel::create($data);
        Room::where('hotel_id', $request->hotel_id)->update(['hotel_id' => $result->id]);


        return back()->with('success', 'Add hotel success!');
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'country_id' => 'required',
            '%name%' => '',
            'slug' => 'required',
            '%intro%' => '',
            '%description%' => '',
            'currency' => '',
            'language' => '',
            'best_time_to_visit' => '',
            'lat' => '',
            'lng' => '',
            'seo_title' => '',
            'seo_description' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif',
            'banner' => 'mimes:jpeg,jpg,png,gif'
        ]);
        $data = $this->validate($request, $rule_factory);

//        return $data;

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $banner_file = $this->uploadImage($banner, '');
            $data['banner'] = $banner_file;
        }

        $model = City::find($request->city_id);
        $model->fill($data);

        if ($model->save()) {
            return back()->with('success', 'Update city success!');
        }
    }

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $model = City::find($request->city_id);
        $model->fill($data);

        if ($model->save()) {
            return $this->response->formatResponse(200, $model, 'Update city status success!');
        }
    }

    public function destroy(Request $request, $id)
    {
        City::destroy($id);
        return back()->with('success', 'Delete city success!');
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

    public function add()
    {
       
        $data['room_types'] = RoomType::get();
        $data['amenities'] = Amenities::orderBy('name', 'asc')->get();
        $data['amenitiesType'] = Amenities::TYPE;
        $data['inclusions'] = Inclusion::get();
        $data['hotel_id']   = rand(100000000000, 999999999999);
        return view('admin.hotel.add', $data);
    }

    public function roomStore(Request $request)
    {
        $data = $request->only('room_type_id', 'price', 'promotion_price', 'capacity', 'bed', 'booked', 'pass_wifi', 'hotel_id');

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }
        $result = Room::create($data);
        if ($request->has('room_gallery')) {
            foreach($request->room_gallery as $gallery) {
                $gallery_file = $this->uploadImage($gallery, '', true);
                RoomGallery::create(['room_id' => $result->id, 'image_id' => $gallery_file]);
            }
        }
        if ($request->has('amenities')) {
            foreach($request->amenities as $amenities) {
                RoomAmenity::create(['room_id' => $result->id, 'amenity_id' => $amenities]);
            }
        }
        if ($request->has('inclusions')) {
            foreach($request->inclusions as $inclusion) {
                // RoomAmenity::create(['hotel_id' => $result->id, 'amenity_id' => $inclusion]);
            }
        }

        return response()->json(['status' => 200, 'id' => $result->id, 'type' => RoomType::find($request->room_type_id)->name]);
    }

    public function roomEdit(Request $request)
    {
        $id = $request->id;
        return response()->json(['status' => 200, 'data' => Room::find($id)]);

    }

}