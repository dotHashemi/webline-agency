<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // need to use jwt or token base auth
        if ($request->session()->has('auth') && session('auth')) {
            $user = User::find(session('id'));

            if ($user != null && $user->role == 'admin') {
                $request->attributes->add(["user" => $user]);
                return $next($request);
            }
        }

        return redirect('/');
    }
}
