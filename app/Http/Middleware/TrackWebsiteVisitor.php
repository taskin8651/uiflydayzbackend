<?php

namespace App\Http\Middleware;

use App\Models\WebsiteSetting;
use Closure;
use Illuminate\Http\Request;

class TrackWebsiteVisitor
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('get')
            && ! $request->is('admin*', 'login', 'register', 'password*', 'email*', 'home')
            && ! $request->session()->has('website_visitor_counted')) {
            $setting = WebsiteSetting::current();
            $setting->increment('visitor_count');
            $request->session()->put('website_visitor_counted', true);
        }

        return $next($request);
    }
}
