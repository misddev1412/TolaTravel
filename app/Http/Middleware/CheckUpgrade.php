<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class CheckUpgrade
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (
            isRoute('home') ||
            isRoute('city_detail') ||
            isRoute('city_category_detail') ||
            isRoute('place_detail')
        ) {
            if (
                !Schema::hasTable('category_translations') ||
                !Schema::hasTable('post_translations') ||
                !Schema::hasTable('place_type_translations') ||
                !Schema::hasTable('place_translations') ||
                !Schema::hasTable('amenities_translations') ||
                !Schema::hasTable('city_translations') ||
                !Schema::hasTable('category_translations') ||
                !Schema::hasTable('social_accounts') ||
                !Schema::hasTable('languages') ||
                !Schema::hasTable('ltm_translations')
            ) {
                return redirect(route('admin_upgrade_v110'));
            }
        }

        return $next($request);
    }
}
