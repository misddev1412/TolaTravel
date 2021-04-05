<?php

namespace App\Http\Controllers\Admin;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $country;
    private $city;
    private $response;

    public function __construct(Country $country, City $city, Response $response)
    {
        $this->country = $country;
        $this->city = $city;
        $this->response = $response;
    }

    public function list(Request $request)
    {
        $param_country_id = $request->country_id;
        $countries = $this->country->getFullList();
        $cities = $this->city->getListByCountry($param_country_id);

//        return $cities;

        return view('admin.city.city_list', [
            'countries' => $countries,
            'cities' => $cities,
            'country_id' => (int)$param_country_id
        ]);
    }

    public function create(Request $request)
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
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'banner' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

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

        $model = new City();
        $model->fill($data)->save();

        return back()->with('success', 'Add city success!');
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
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'banner' => 'mimes:jpeg,jpg,png,gif|max:10000'
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

}