<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
