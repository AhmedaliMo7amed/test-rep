<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if($guard == 'ar') {
            session()->put('locale','ar');
            app()->setLocale('ar');
        } elseif($guard == 'de') {
            session()->put('locale','de');
            app()->setLocale('de');
        } elseif($guard == 'ru') {
            session()->put('locale','ru');
            app()->setLocale('ru');
        } elseif($guard == 'fr') {
            session()->put('locale','fr');
            app()->setLocale('fr');
        } else {
            session()->put('locale','en');
            app()->setLocale('en');
        }
        return $next($request);
    }
}
