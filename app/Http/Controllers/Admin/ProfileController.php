<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index() {
        $profiles = Profile::get();
        return view('admin.profiles.index', compact('profiles'));
    }
    
    public function create() {
        $sub_activities = SubActivity::get();
        return view('admin.profiles.create', compact('sub_activities'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'type' => 'required',
            'sub_activities' => 'required|array'
        ]);

        $row = Profile::create([
            'name' => $request->name,
            'age' => $request->age,
            'type' => $request->type,
        ]);

        
        if($row) {
            $row->sub_activities()->sync($request->sub_activities);
            return redirect()->route('admin_panel.profiles.index')->with('success', 'Profile created successfully');            
        }
    }

    public function edit($id) {
        $sub_activities = SubActivity::get();
        $profile = Profile::findorFail($id);
        $profile_sub_activities = $profile->sub_activities()->pluck('activity_profiles.id')->toArray();
        return view('admin.profiles.edit', compact('profile', 'sub_activities', 'profile_sub_activities'));
    }

    public function update(Request $request, $id) {
        $profile = Profile::findorFail($id);

        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'type' => 'required',
            'sub_activities' => 'required|array'
        ]);

        $row = $profile->update([
            'name' => $request->name,
            'age' => $request->age,
            'type' => $request->type,
        ]);

        
        if($row) {
            $profile->sub_activities()->sync($request->sub_activities);
            return redirect()->route('admin_panel.profiles.index')->with('info', 'Profile updated successfully');            
        }
    }

    public function destroy($id) {
        $profile = Profile::findorFail($id);

        $row = $profile->delete();

        if($row) {
            return redirect()->route('admin_panel.profiles.index')->with('error', 'Profile deleted successfully');            
        }
    }
}
