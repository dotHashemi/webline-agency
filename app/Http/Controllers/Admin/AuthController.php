<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends AdminController
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function authenticate(Request $request)
    {
        $input = $request->only('email', 'password');

        $validation = Validator::make($input, [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string|max:191'
        ]);

        if ($validation->fails()) {
            return back();
        }

        $user = User::where('email', $input['email'])->first();

        if (!Hash::check($input['password'], $user->password)) {
            return back();
        }

        session()->put('auth', true);
        session()->put('id', $user->id);
        session()->put('name', $user->name);

        alert()->success($this->alerts['login']);
        return redirect()->route('admin.index');
    }


    public function logout(Request $request)
    {
        session()->put('auth', false);
        session()->forget('id');
        session()->forget('name');

        return redirect()->route('admin.auth.login');
    }
}
