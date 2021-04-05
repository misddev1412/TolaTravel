<?php
/**
 * Created by PhpStorm.
 * User: minhthe
 * Date: 2020-04-27
 * Time: 16:07
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $user = $this->getUserByApiToken($request);
        return $user;
    }

    public function getPlaceByUser($user_id)
    {
        $places = Place::query()
            ->where('user_id', $user_id)
            ->paginate();

        return $places;
    }

    public function getPlaceWishlistByUser($user_id)
    {
        $wishlists = Wishlist::query()
            ->where('user_id', $user_id)
            ->get('place_id')->toArray();

        $wishlists = array_column($wishlists, 'place_id');

        $places = Place::query()
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->whereIn('id', $wishlists)
            ->paginate();

        return $places;
    }

}