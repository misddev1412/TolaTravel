<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;
use Session;
use Cache;
use App\Models\City;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        view()->composer('*', function($view)
        {
            
            $city = City::query()
                ->limit(10);

            if (Auth::check() && Auth::user()->country_id != null || Session::has('country_id')) {
                $country_id = Auth::user()->country_id ?? Session::has('country_id');
                $city = $city->where('country_id', $country_id);
            }
            
            $view->with('destinations', $city->get());

        });
    
        //
    }
}
