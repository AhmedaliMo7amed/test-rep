<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function getHomePage() {
        $sliders = Slider::all();
        $categories = Category::all();
        
        return response()->json(['sliders' => $sliders, 'categories' => $categories], 200);
    }

    public function getCategory($name) {
        $category = Category::with('sub_categories')->where('header_title', $name)->first();

        return response()->json(['category' => $category], 200);
    }
}
