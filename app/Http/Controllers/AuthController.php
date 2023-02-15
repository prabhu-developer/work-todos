<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('auth.login');
    }

    public function get_register()
    {
        return view('auth.register');
    }

    public function post_register(RegisterRequest $request)
    {
        User::create([
            "name"     => $request->name,
            "email"    => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect(route('login'))->withSuccess(__('app.register_success'));
    }
}
