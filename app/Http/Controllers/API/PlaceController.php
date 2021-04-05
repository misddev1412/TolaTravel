<?php

namespace App\Http\Controllers\API;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\Review;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function detail($id)
    {
        $place = Place::find($id);
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

        return $this->response->formatResponse(200, [
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

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('address', 'like', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE)
            ->get(['id', 'city_id', 'name', 'slug', 'address']);

        return $this->response->formatResponse(200, [
            'places' => $places
        ]);
    }

    public function addPlaceToWishlist(Request $request)
    {
        $user = $this->getUserByApiToken($request);
        $request['user_id'] = $user->id;

        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        $have_wishlist = Wishlist::query()
            ->where('user_id', $data['user_id'])
            ->where('place_id', $data['place_id'])
            ->exists();

        if (!$have_wishlist) {
            $wislist = new Wishlist();
            $wislist->fill($data)->save();
            return $this->response->formatResponse(200, [], "success");
        } else {
            return $this->response->formatResponse(208, [], "This place is already in your wishlist!");
        }
    }

    public function removePlaceFromWishlist(Request $request)
    {
        $user = $this->getUserByApiToken($request);
        $request['user_id'] = $user->id;

        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        Wishlist::query()
            ->where('user_id', $data['user_id'])
            ->where('place_id', $data['place_id'])
            ->delete();

        return $this->response->formatResponse(200, [], "success");
    }

}