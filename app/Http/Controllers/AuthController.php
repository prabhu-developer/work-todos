<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    
    public function post_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => __('app.login_error'),
        ]);
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
