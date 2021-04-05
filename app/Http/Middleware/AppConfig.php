<?php

namespace App\Http\Middleware;

use Closure;

class AppConfig
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

        /**
         * Config Social Auth
         */
        $config_facebook = [
            'client_id' => setting('facebook_app_id'),
            'client_secret' => setting('facebook_app_secret'),
            'redirect' => route('login_social_callback', 'facebook'),
        ];
        $config_google = [
            'client_id' => setting('google_app_id'),
            'client_secret' => setting('google_app_secret'),
            'redirect' => route('login_social_callback', 'google'),
        ];
        config(['services.facebook' => $config_facebook]);
        config(['services.google' => $config_google]);

        /**
         * Config SMTP
         */
        config(['mail.driver' => setting('mail_driver', 'smtp')]);
        config(['mail.host' => setting('mail_host', 'smtp.googlemail.com')]);
        config(['mail.port' => setting('mail_port', '465')]);
        config(['mail.username' => setting('mail_username')]);
        config(['mail.password' => setting('mail_password')]);
        config(['mail.encryption' => setting('mail_encryption', 'ssl')]);
        config(['mail.from.address' => setting('mail_from_address', 'hello@uxper.co')]);
        config(['mail.from.name' => setting('mail_from_name', 'uxper')]);


        return $next($request);
    }
}
