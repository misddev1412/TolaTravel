<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Place;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $wishlist;
    private $response;

    public function __construct(Wishlist $wishlist, Response $response)
    {
        $this->wishlist = $wishlist;
        $this->response = $response;
    }

    public function addWishlist(Request $request)
    {
        $request['user_id'] = Auth::id();
        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        $have_wishlist = Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('place_id', $request->place_id)
            ->exists();

        if (!$have_wishlist) {
            $wislist = new Wishlist();
            $wislist->fill($data)->save();
            return $this->response->formatResponse(200, [], "success");
        } else {
            return $this->response->formatResponse(208, [], "This place is already in your wishlist!");
        }
    }

    public function removeWishlist(Request $request)
    {
        $request['user_id'] = Auth::id();
        $data = $this->validate($request, [
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        Wishlist::query()
            ->where('user_id', Auth::id())
            ->where('place_id', $request->place_id)
            ->delete();

        return $this->response->formatResponse(200, [], "success");
    }

    public function pageProfile()
    {
        $app_name = setting('app_name', 'Golo.');
        SEOMeta("User profile - {$app_name}");
        return view('frontend.user.user_profile');
    }

    public function pageMyPlace(Request $request)
    {
        $filter = [
            'city' => $request->city_id,
            'category' => $request->category_id,
            'keyword' => $request->keyword,
        ];

        // Get list places
        $places = Place::query()
            ->with('city')
            ->with('categories')
            ->where('user_id', Auth::id())
            ->where('status', '<>', Place::STATUS_DELETE)
            ->orderByDesc('id')
            ->orderByDesc('status')
            ->select(['id', 'name', 'thumb', 'slug', 'city_id', 'category', 'status']);
        if ($filter['city']) {
            $places->where('city_id', $filter['city']);
        }
        if ($filter['category']) {
            $places->where('category', 'like', '%' . $filter['category'] . '%');
        }
        if ($filter['keyword']) {
            $places->where('name', 'like', '%' . $filter['keyword'] . '%');
        }
        $places = $places->paginate();

        // Get list city have in places
        $city_ids = Place::query()
            ->where('user_id', Auth::id())
            ->get(['city_id', 'category'])
            ->toArray();
        $city_ids = array_column($city_ids, 'city_id');
        $cities = City::query()
            ->whereIn('id', $city_ids)
            ->get();

        // Get all categories
        $categories = Category::query()
            ->where('type', Category::TYPE_PLACE)
            ->get();

        $app_name = setting('app_name', 'Golo.');
        SEOMeta("My places - {$app_name}");
        return view('frontend.user.user_my_place', [
            'places' => $places,
            'cities' => $cities,
            'categories' => $categories,
            'filter' => $filter
        ]);
    }

    public function pageWishList()
    {
        $wishlists = Wishlist::query()
            ->where('user_id', Auth::id())
            ->get('place_id')->toArray();

        $wishlists = array_column($wishlists, 'place_id');

        $places = Place::query()
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->whereIn('id', $wishlists)
            ->paginate();

        $app_name = setting('app_name', 'Golo.');
        SEOMeta("Wishlist - {$app_name}");
        return view('frontend.user.user_wishlist', [
            'places' => $places
        ]);
    }

    public function pageResetPassword(Request $request)
    {
        $token = $request->token;
        return view('frontend.user.user_forgot_password', [
            'token' => $token
        ]);
    }

    public function updateProfile(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'phone_number' => '',
            'facebook' => '',
            'instagram' => '',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        if ($request->hasFile('avatar')) {
            $icon = $request->file('avatar');
            $file_name = $this->uploadImage($icon, '');
            $data['avatar'] = $file_name;
        }

        $user = User::find(Auth::id());
        $user->fill($data)->save();

        return back()->with('success', 'Update profile success!');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        $data = $this->validate($request, [
            'old_password' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ]);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Wrong old password!');
        }

        if ($request->password !== $request->password_confirmation) {
            return back()->with('error', 'Password confirm do not match!');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return back()->with('success', 'Change password success!');
    }

    public function deleteMyPlace(Request $request)
    {
//        return $request;
        $place = Place::find($request->place_id);

        if ($place->user_id !== Auth::id()) {
            return back()->with('error', 'Delete place error!');
        }

        $place->status = Place::STATUS_DELETE;
        $place->save();

        return back()->with('success', 'Delete place success!');
    }


}
