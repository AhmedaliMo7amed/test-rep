<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index', compact('users'));
    }
}
