<?php

namespace App\Http\Middleware;

use App\Models\Option;
use Closure;
use Illuminate\Http\Request;

class CallSettings
{
    public function handle(Request $request, Closure $next)
    {
        $setting = Option::where('key', 'LIKE', 'set-%')->get();
        $setting = $setting->pluck('value', 'key');

        $request->attributes->add(["settings" => $setting]);

        return $next($request);
    }
}
