<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index() {
        $sliders = Slider::get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/slider_images', $fileName);
        }

        $row = Slider::create([
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.sliders.index')->with('success', 'Image created successfully');            
        }
    }

    public function destroy($id) {
        $slider = Slider::findorFail($id);

        if($slider->image !== NULL) {
            if(file_exists('uploads/slider_images/'. $slider->image)) {
                unlink('uploads/slider_images/'. $slider->image);
            }
        }

        $row = $slider->delete();

        if($row) {
            return redirect()->route('admin_panel.sliders.index')->with('error', 'Image deleted successfully');            
        }
    }
}
