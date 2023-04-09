<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function get() {
        $setting = Setting::find(1);
        return view('admin.settings', compact('setting'));
    }

    public function update(Request $request) {
        $this->validate($request, [
            'website_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:11',
            'address' => 'required',
            'logo_image' => 'nullable|mimes:jpg,png,jpeg,svg',
            'banner_header' => 'required' ,
            'banner_title' => 'required' ,
            'banner_color'=> 'required',
            'banner_description'=> 'required',
            'banner_image'=> 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        $setting = Setting::find(1);

        if($request->hasFile('logo_image')) {
            $file = $request->file('logo_image');
            $fileName = 'logo'.'.'.$file->getClientOriginalExtension();
            $file->move('uploads', $fileName);

            if($setting->logo_image !== NULL) {
                if (file_exists('uploads/'. $setting->logo_image)) {
                    unlink('uploads/'. $setting->logo_image);
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $banner_file = $request->file('banner_image');
            $banner_fileName = time().'.'.$banner_file->getClientOriginalExtension();
            $banner_file->move('uploads/home-banners/', $banner_fileName);

            if($setting->banner_image !== NULL) {
                if(file_exists('uploads/home-banners/'. $setting->banner_image)) {
                    unlink('uploads/home-banners/'. $setting->banner_image);
                }
            }
        }

        $row = $setting->update([
            'website_name' => $request->website_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'logo_image' => isset($fileName) ? $fileName : $setting->logo_image,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link,
            'map_link' => $request->map_link,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'header_code' => $request->header_code,
            'footer_code' => $request->footer_code,
            'banner_header' => $request-> banner_header,
            'banner_title' => $request-> banner_title,
            'banner_color' => $request-> banner_color,
            'banner_description' => $request-> banner_description,
            'banner_image' =>isset($banner_fileName) ? $banner_fileName : $setting->banner_image,
            'real_title' => $request->real_title,
        ]);

        if($row) {
            return redirect()->back()->with('success', 'Settings updated successfully');
        }
    }
}
