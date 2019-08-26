<?php

namespace App\Http\Middleware;

use App;
use Config;
use Cookie;
use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $raw_locale = $request->cookie('lang');

        if (in_array($raw_locale, Config::get('app.locales'))) {
            $locale = $raw_locale;
        } else {
            $locale = Config::get('app.locale');
            Cookie::queue(
                Cookie::forever('lang', $locale));

        }
        App::setLocale($locale);
        return $next($request);
    }
}
