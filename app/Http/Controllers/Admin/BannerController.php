<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function get() {
        $banner = Banner::find(1);
        return view('admin.banner', compact('banner'));
    }
    
    public function update(Request $request) {  
        
        $banner = Banner::find(1);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'button' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/banner_image', $fileName);

            if($banner->image !== NULL) {
                if (file_exists('uploads/banner_image/'. $banner->image)) {
                    unlink('uploads/banner_image/'. $banner->image);
                }
            }
        }

        $row = $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'button' => $request->button,
            'button_link' => $request->button_link,
            'image' => isset($fileName) ? $fileName : $banner->image,
        ]);

        if($row) {
            return redirect()->back()->with('success', 'Banner updated successfully');
        }
    }
}
