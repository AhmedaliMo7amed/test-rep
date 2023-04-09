<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutUsDetail;

class AboutUsDetailsController extends Controller
{
    public function get() {
        $aboutUsDetail = AboutUsDetail::find(1);
        return view('admin.details', compact('aboutUsDetail'));
    }
    
    public function update(Request $request) {  
        
        $about_us_detail = AboutUsDetail::find(1);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'button' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/about_us_detail_image', $fileName);

            if($about_us_detail->image !== NULL) {
                if (file_exists('uploads/about_us_detail_image/'. $about_us_detail->image)) {
                    unlink('uploads/about_us_detail_image/'. $about_us_detail->image);
                }
            }
        }

        $row = $about_us_detail->update([
            'title' => $request->title,
            'description' => $request->description,
            'button' => $request->button,
            'button_link' => $request->button_link,
            'image' => isset($fileName) ? $fileName : $about_us_detail->image,
        ]);

        if($row) {
            return redirect()->back()->with('success', 'About Us Detail updated successfully');
        }
    }
}
