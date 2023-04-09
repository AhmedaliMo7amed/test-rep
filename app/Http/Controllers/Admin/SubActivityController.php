<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubActivityController extends Controller
{
    public function index() {
        $sub_activities = SubActivity::with('activity')->get();
        return view('admin.sub_activities.index', compact('sub_activities'));
    }
    
    public function create() {
        $activities = Activity::get();
        return view('admin.sub_activities.create', compact('activities'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'user_paid' => 'required',
            'price' => 'required_if:user_paid,1',
            'activity_id' => 'required',
        ]);

        $row = SubActivity::create([
            'name' => $request->name,
            'user_paid' => $request->user_paid,
            'price' => $request->price,
            'activity_id' => $request->activity_id,
        ]);

        if($row) {
            return redirect()->route('admin_panel.sub_activities.index')->with('success', 'Sub Activity created successfully');            
        }
    }

    public function edit($id) {
        $activities = Activity::get();
        $sub_activity = SubActivity::findorFail($id);
        return view('admin.sub_activities.edit', compact('activities', 'sub_activity'));
    }

    public function update(Request $request, $id) {
        $sub_activity = SubActivity::findorFail($id);

        $this->validate($request, [
            'name' => 'required',
            'user_paid' => 'required',
            'price' => 'required_if:user_paid,1',
            'activity_id' => 'required',
        ]);

        $row = $sub_activity->update([
            'name' => $request->name,
            'user_paid' => $request->user_paid,
            'price' => $request->price,
            'activity_id' => $request->activity_id,
        ]);

        if($row) {
            return redirect()->route('admin_panel.sub_activities.index')->with('info', 'Sub Activity updated successfully');            
        }
    }

    public function destroy($id) {
        $sub_activity = SubActivity::findorFail($id);

        $row = $sub_activity->delete();

        if($row) {
            return redirect()->route('admin_panel.sub_activities.index')->with('error', 'Sub Activity deleted successfully');            
        }
    }
}
