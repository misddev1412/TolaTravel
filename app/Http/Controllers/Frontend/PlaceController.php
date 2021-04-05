<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Review;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    private $place;
    private $country;
    private $city;
    private $category;
    private $amenities;
    private $response;

    public function __construct(Place $place, Country $country, City $city, Category $category, Amenities $amenities, Response $response)
    {
        $this->place = $place;
        $this->country = $country;
        $this->city = $city;
        $this->category = $category;
        $this->amenities = $amenities;
        $this->response = $response;
    }

    public function detail($slug)
    {
        $place = $this->place->getBySlug($slug);
        if (!$place) abort(404);

        $city = City::query()
            ->with('country')
            ->where('id', $place->city_id)
            ->first();

        $amenities = Amenities::query()
            ->whereIn('id', $place->amenities ? $place->amenities : [])
            ->get(['id', 'name', 'icon']);

        $categories = Category::query()
            ->whereIn('id', $place->category ? $place->category : [])
            ->get(['id', 'name', 'slug', 'icon_map_marker']);

        $place_types = PlaceType::query()
            ->whereIn('id', $place->place_type ? $place->place_type : [])
            ->get(['id', 'name']);

        $reviews = Review::query()
            ->with('user')
            ->where('place_id', $place->id)
            ->where('status', Review::STATUS_ACTIVE)
            ->get();
        $review_score_avg = Review::query()
            ->where('place_id', $place->id)
            ->where('status', Review::STATUS_ACTIVE)
            ->avg('score');

        $similar_places = Place::query()
            ->with('place_types')
            ->with('avgReview')
            ->withCount('reviews')
            ->withCount('wishList')
            ->where('city_id', $city->id)
            ->where('id', '<>', $place->id);
        foreach ($place->category as $cat_id):
            $similar_places->where('category', 'like', "%{$cat_id}%");
        endforeach;
        $similar_places = $similar_places->limit(4)->get();

//        return $categories;

        // SEO Meta
        $title = $place->seo_title ? $place->seo_title : $place->name;
        $description = $place->seo_description ? $place->seo_description : Str::limit($place->description, 165);
        SEOMeta($title, $description, getImageUrl($place->thumb));

        $template = setting('template', '01');

        return view("frontend.place.place_detail_{$template}", [
            'place' => $place,
            'city' => $city,
            'amenities' => $amenities,
            'categories' => $categories,
            'place_types' => $place_types,
            'reviews' => $reviews,
            'review_score_avg' => $review_score_avg,
            'similar_places' => $similar_places
        ]);
    }

    public function pageAddNew(Request $request, $id = null)
    {
        $place = Place::find($id);

        if ($place) abort_if($place->user_id !== Auth::id(), 401);

        $country_id = $place ? $place->country_id : false;

        $countries = $this->country->getFullList();
        $cities = $this->city->getListByCountry($country_id);
        $categories = $this->category->getListAll(Category::TYPE_PLACE);

        $place_types = Category::query()
            ->with('place_type')
            ->get();

        $amenities = $this->amenities->getListAll();

        $app_name = setting('app_name', 'Golo.');
        SEOMeta("Add new place - {$app_name}");
        return view('frontend.place.place_addnew', [
            'place' => $place,
            'countries' => $countries,
            'cities' => $cities,
            'categories' => $categories,
            'place_types' => $place_types,
            'amenities' => $amenities,
        ]);
    }

    public function create(Request $request)
    {
        $request['user_id'] = Auth::id();
        $request['slug'] = getSlug($request, 'name');
        $request['status'] = Place::STATUS_PENDING;

        $rule_factory = RuleFactory::make([
            'user_id' => '',
            'country_id' => '',
            'city_id' => '',
            'category' => '',
            'place_type' => '',
            '%name%' => '',
            'slug' => '',
            '%description%' => '',
            'price_range' => '',
            'amenities' => '',
            'address' => '',
            'lat' => '',
            'lng' => '',
            'email' => '',
            'phone_number' => '',
            'website' => '',
            'social' => '',
            'opening_hour' => '',
            'gallery' => '',
            'video' => '',
            'link_bookingcom' => '',
            'status' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        $model = new Place();
        $model->fill($data);

        if ($model->save()) {
            return redirect(route('user_my_place'))->with('success', 'Create place success. Wating admin review and apporeve!');
        }

        return $request;
    }

    public function update(Request $request)
    {
        $request['slug'] = getSlug($request, 'name');

        $rule_factory = RuleFactory::make([
            'user_id' => '',
            'country_id' => '',
            'city_id' => '',
            'category' => '',
            'place_type' => '',
            '%name%' => '',
            'slug' => '',
            '%description%' => '',
            'price_range' => '',
            'amenities' => '',
            'address' => '',
            'lat' => '',
            'lng' => '',
            'email' => '',
            'phone_number' => '',
            'website' => '',
            'social' => '',
            'opening_hour' => '',
            'gallery' => '',
            'video' => '',
            'link_bookingcom' => '',
            'status' => '',
            'thumb' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $data = $this->validate($request, $rule_factory);

        if ($request->hasFile('thumb')) {
            $thumb = $request->file('thumb');
            $thumb_file = $this->uploadImage($thumb, '');
            $data['thumb'] = $thumb_file;
        }

        $model = Place::find($request->place_id);
        $model->fill($data);

        if ($model->save()) {
            return redirect(route('user_my_place'))->with('success', 'Update place success!');
        }

        return $request;
    }

    public function getListMap(Request $request)
    {
        $city = City::find($request->city_id);

        $places = Place::query()
            ->with('categories')
            ->with('avgReview')
            ->withCount('reviews')
            ->where('city_id', $request->city_id)
            ->where('category', 'like', '%' . $request->category_id . '%')
            ->where('status', Place::STATUS_ACTIVE)
            ->get();

        $data = [
            'city' => $city,
            'places' => $places
        ];

        return $this->response->formatResponse(200, $data, 'success');
    }

    public function getListFilter(Request $request)
    {
        $city_id = $request->city_id;
        $category_id = $request->category_id;

        $sort_by = $request->sort_by;
        $price_range = $request->price;
        $place_types = $request->place_types;
        $amenities = $request->amenities;

        $places = Place::query()
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->where('city_id', $city_id)
            ->where('category', 'like', "%$category_id%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($price_range) {
            $places->where('price_range', $price_range);
        }
        if ($place_types) {
            foreach ($place_types as $place_type) {
                $places->where('place_type', 'like', "%$place_type%");
            }
        }
        if ($amenities) {
            foreach ($amenities as $item) {
                $places->where('amenities', 'like', "%$item%");
            }
        }

        if ($sort_by) {
            if ($sort_by === 'price_asc') $places->orderBy('price_range', 'asc');
            if ($sort_by === 'price_desc') $places->orderBy('price_range', 'desc');
        }

        $places = $places->get();

        $html = "";
        if (count($places)) :
            foreach ($places as $place) :
                $place_detail_url = route('place_detail', $place->slug);
                $place_price_range = PRICE_RANGE[$place->price_range];
                $place_thumb = getImageUrl($place->thumb);

                $html_place_type = "";
                foreach ($place['place_types'] as $type) :
                    $html_place_type .= "<a href='#' title='{$type->name}'> {$type->name}</a>";
                endforeach;

                if ($place->wish_list_count) {
                    $class_wishlist = "remove_wishlist active";
                } else {
                    Auth::user() ? $class_wishlist = "add_wishlist" : $class_wishlist = "open-login";
                }

                $html_review = "";
                if ($place->reviews_count) $html_review .= "{$place->avgReview} <i class='la la-star'></i>";

                $html .= "
                <div class='col-xl-3 col-lg-4 col-6'>
                    <div class='places-item hover__box'>
                        <div class='places-item__thumb hover__box__thumb'>
                            <a title='Barcelona' href='{$place_detail_url}'><img src='{$place_thumb}' alt='{$place->name}'></a>
                        </div>
                        <a href='#' class='place-item__addwishlist {$class_wishlist}' data-id='{$place->id}' title='Add Wishlist'>
                            <i class='la la-bookmark la-24'></i>
                        </a>
                        <div class='places-item__info'>
                            <div class='places-item__category'>
                                {$html_place_type}
                            </div>
                            <h3><a href='{$place_detail_url}' title='{$place->name}'>{$place->name}</a></h3>
                            <div class='places-item__meta'>
                                <div class='places-item__reviews'>
                                    <span class='places-item__number'>
                                        {$html_review}
                                        <span class='places-item__count'>({$place->reviews_count} reviews)</span>
                                    </span>
                                </div>
                                <div class='places-item__currency'>
                                    {$place_price_range}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            endforeach;
        else:
            $html .= "<div class='col-md-12 text-center'>No places</div>";
        endif;

        return $html;
    }
}
