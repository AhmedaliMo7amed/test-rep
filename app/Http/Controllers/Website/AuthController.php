<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function view_login()
    {
        return view('front.auth.login');
    }

    public function post_login()
    {
        # code...
    }

    public function view_register()
    {
        return view('front.auth.register');
    }

    public function post_register()
    {
        # code...
    }

    public function view_reset_password()
    {
        return view('front.auth.reset-password');
    }

    public function post_reset_password()
    {
        # code...
    }

    public function view_change_password()
    {
        return view('front.auth.change-password');
    }

    public function post_change_password()
    {
        # code...
    }
}
