<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login() {

        if(Auth::guard('admin')->check()){
            return redirect()->route('admin_dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function login_post(Request $request) {

        $remember = $request->has('remember') ? true : false;

        if ( Auth::guard('admin')->attempt([ 'email' => request('email') , 'password' => request('password')] , $remember) ) {
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->back()->with('error','Incorrect email or password');
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect()->route('view_admin_login');
    }
}
