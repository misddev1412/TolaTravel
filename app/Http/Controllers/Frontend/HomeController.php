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
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        // SEO Meta
        SEOMeta(setting('app_name'), setting('home_description'));

        $popular_cities = City::query()
            ->with('country')
            ->withCount(['places' => function ($query) {
                $query->where('status', Place::STATUS_ACTIVE);
            }])
            ->where('status', Country::STATUS_ACTIVE)
            ->limit(12)
            ->get();

        $blog_posts = Post::query()
            ->with(['categories' => function ($query) {
                $query->where('status', Category::STATUS_ACTIVE)
                    ->select('id', 'name', 'slug');
            }])
            ->where('type', Post::TYPE_BLOG)
            ->where('status', Post::STATUS_ACTIVE)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'category', 'slug', 'thumb']);


        $categories = Category::query()
            ->where('categories.status', Category::STATUS_ACTIVE)
            ->where('categories.type', Category::TYPE_PLACE)
            ->join('places', 'places.category', 'like', DB::raw("CONCAT('%', categories.id, '%')"))
            ->select('categories.id as id', 'categories.name as name', 'categories.priority as priority', 'categories.slug as slug', 'categories.color_code as color_code', 'categories.icon_map_marker as icon_map_marker', DB::raw("count(places.category) as place_count"))
            ->groupBy('categories.id')
            ->orderBy('categories.priority')
            ->limit(10)
            ->get();;


        $trending_places = Place::query()
            ->with('categories')
            ->with('city')
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->where('status', Place::STATUS_ACTIVE)
            ->limit(10)
            ->get();

        $testimonials = Testimonial::query()
            ->where('status', Testimonial::STATUS_ACTIVE)
            ->get();

//        return $trending_places;

        $template = setting('template', '01');

        return view("frontend.home.home_{$template}", [
            'popular_cities' => $popular_cities,
            'blog_posts' => $blog_posts,
            'categories' => $categories,
            'trending_places' => $trending_places,
            'testimonials' => $testimonials
        ]);
    }

    public function pageFaqs()
    {
        return view('frontend.page.faqs');
    }

    public function pageContact()
    {
        return view('frontend.page.contact');
    }

    public function pageLanding($page_number)
    {
        return view("frontend.page.landing_{$page_number}");
    }

    public function sendContact(Request $request)
    {
        Mail::send('frontend.mail.contact_form', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'note' => $request->note
        ], function ($message) use ($request) {
            $message->to(setting('email_system'), "{$request->first_name}")->subject('Contact from ' . $request->first_name);
        });

        return back()->with('success', 'Contact has been send!');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orWhere('address', 'like', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->get(['id', 'city_id', 'name', 'slug', 'address']);

        $html = '<ul class="custom-scrollbar">';
        foreach ($places as $place):
            if (isset($place['city'])):
                $place_url = route('place_detail', $place->slug);
                $city_url = route('city_detail', $place['city']['slug']);
                $html .= "
                <li>
                    <a href=\"{$place_url}\">{$place->name}</a>
                    <a href=\"{$city_url}\"><i class=\"la la-city\"></i>{$place['city']['name']}</a>
                </li>
                ";
            endif;
        endforeach;
        $html .= '</ul>';

        $html_notfound = "<div class=\"golo-ajax-result\">No place found</div>";

        count($places) ?: $html = $html_notfound;

        return response($html, 200);
    }

    public function searchListing(Request $request)
    {
        $keyword = $request->keyword;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->whereTranslationLike('name', "%{$keyword}%")
            ->orWhere('address', 'like', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        $places = $places->get(['id', 'city_id', 'name', 'slug', 'address']);

        $html = '<ul class="listing_items">';
        foreach ($places as $place):
            if (isset($place['city'])):
                $place_url = route('place_detail', $place->slug);
                $html .= "
                <li>
                    <a href=\"{$place_url}\">{$place->name}</a>
                </li>
                ";
            endif;
        endforeach;
        $html .= '</ul>';

        $html_notfound = "<ul><li><a href='#'><span>No listing found!</span></a></li></ul>";

        count($places) ?: $html = $html_notfound;

        return response($html, 200);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $category_id = $request->category_id;
        $city_id = $request->city_id;

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->orWhere('address', 'like', "%{$keyword}%")
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($category_id) {
            $places->where('category', 'like', "%{$category_id}%");
        }

        if ($city_id) {
            $places->where('city_id', $city_id);
        }

        $places = $places->paginate(20);

//        return $places;

        return view('frontend.search.search', [
            'places' => $places,
            'keyword' => $keyword
        ]);
    }

    public function changeLanguage($locale)
    {
        Session::put('language_code', $locale);
        $language = Session::get('language_code');

        return redirect()->back();
    }

    public function pageSearchListing(Request $request)
    {
        $keyword = $request->keyword;
        $filter_category = $request->category;
        $filter_amenities = $request->amenities;
        $filter_place_type = $request->place_type;
        $filter_city = $request->city;

        $categories = Category::query()
            ->where('type', Category::TYPE_PLACE)
            ->get();

        $place_types = PlaceType::query()
            ->get();

        $amenities = Amenities::query()
            ->get();

        $cities = City::query()
            ->get();

        $places = Place::query()
            ->with(['city' => function ($query) {
                return $query->select('id', 'name', 'slug');
            }])
            ->with('categories')
            ->with('place_types')
            ->withCount('reviews')
            ->with('avgReview')
            ->withCount('wishList')
            ->orWhere('address', 'like', "%{$keyword}%")
            ->whereTranslationLike('name', "%{$keyword}%")
            ->where('status', Place::STATUS_ACTIVE);

        if ($filter_category) {
            foreach ($filter_category as $key => $item) {
                if ($key === 0) {
                    $places->where('category', 'like', "%$item%");
                } else {
                    $places->orWhere('category', 'like', "%$item%");
                }
            }
        }

        if ($filter_amenities) {
            foreach ($filter_amenities as $key => $item) {
                if ($key === 0) {
                    $places->where('amenities', 'like', "%$item%");
                } else {
                    $places->orWhere('amenities', 'like', "%$item%");
                }
            }
        }

        if ($filter_place_type) {
            foreach ($filter_place_type as $key => $item) {
                if ($key === 0) {
                    $places->where('place_type', 'like', "%$item%");
                } else {
                    $places->orWhere('place_type', 'like', "%$item%");
                }
            }
        }

        if ($filter_city) {
            $places->whereIn('city_id', $filter_city);
        }

        if ($request->ajax == '1') {
            $places = $places->get();

            $city = null;
            if (isset($filter_city)) {
                $city = City::query()
                    ->whereIn('id', $filter_city)
                    ->first();
            }

            $data = [
                'city' => $city,
                'places' => $places
            ];

            return $this->response->formatResponse(200, $data, 'success');
        }

        $places = $places->paginate();

//        return $places;

        $template = setting('template', '01');

        return view("frontend.search.search_{$template}", [
            'keyword' => $keyword,
            'places' => $places,
            'categories' => $categories,
            'place_types' => $place_types,
            'amenities' => $amenities,
            'cities' => $cities,
            'filter_category' => $filter_category,
            'filter_amenities' => $filter_amenities,
            'filter_place_type' => $filter_place_type,
            'filter_city' => $request->city,
        ]);
    }

}
