<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Language;
use App\Models\Place;
use App\Models\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Schema::defaultStringLength(191);
        URL::forceScheme('https');
        if(env('APP_ENV') == 'production'){
        }
        $destinations = Cache::remember('destinations', 60 * 60, function () {
            return City::query()
                ->limit(10)
                ->get();
        });
        $countries = Cache::remember('countries', 60 * 60, function () {
            return Country::query()
                ->orderBy('name', 'asc')
                ->get();
        });

        $popular_search_cities = Cache::remember('popular_search_cities', 60 * 60, function () {
            return City::query()
                ->inRandomOrder()
                ->limit(3)
                ->get();
        });

        if (Schema::hasTable('languages')) {
            $languages = Language::query()
                ->where('is_active', Language::STATUS_ACTIVE)
                ->orderBy('is_default', 'desc')
                ->get();

            $language_default = Language::query()
                ->where('is_default', Language::IS_DEFAULT)
                ->first();
        } else {
            $languages = [];
        }

        $city_count = City::query()
            ->where('status', City::STATUS_ACTIVE)
            ->count();

        $category_count = Category::query()
            ->where('status', Category::STATUS_ACTIVE)
            ->where('type', Category::TYPE_PLACE)
            ->count();

        $place_count = Place::query()
            ->where('status', Place::STATUS_ACTIVE)
            ->count();


        View::share([
            'destinations' => $destinations,
            'countries'     => $countries,
            'popular_search_cities' => $popular_search_cities,
            'languages' => $languages,
            'language_default' => $language_default,
            'city_count' => $city_count,
            'category_count' => $category_count,
            'place_count' => $place_count,
        ]);
    }
}
