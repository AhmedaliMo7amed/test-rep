<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Models\ContactUsRequest;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $users_count = User::count();
        $orders_count = Order::where('payment_status', 'paid')->count();
        $blogs_count = News::count();
        $partners_count = Partner::count();
        $contact_requests_count = ContactUsRequest::count();
        $orders = Order::where('payment_status', 'paid')->get();
        $total_earnings = 0;
        foreach($orders as $order) {
            $total_earnings += $order->total;
        }
        
        $recent_orders = Order::orderBy('id', 'desc')->limit(10)->get();
        $recent_users = User::orderBy('id', 'desc')->limit(10)->get();
        $recent_contact_requests = ContactUsRequest::orderBy('id', 'desc')->limit(10)->get();

        return view('admin.dashboard', compact('users_count', 'orders_count', 'blogs_count', 'partners_count', 'contact_requests_count', 'total_earnings', 'recent_orders', 'recent_users', 'recent_contact_requests'));

    }
}
