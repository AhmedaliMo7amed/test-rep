<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index() {
        $activities = Activity::get();
        return view('admin.activities.index', compact('activities'));
    }
    
    public function create() {
        return view('admin.activities.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $row = Activity::create([
            'name' => $request->name,
        ]);

        if($row) {
            return redirect()->route('admin_panel.activities.index')->with('success', 'Activity created successfully');            
        }
    }

    public function edit($id) {
        $activity = Activity::findorFail($id);
        return view('admin.activities.edit', compact('activity'));
    }

    public function update(Request $request, $id) {
        $activity = Activity::findorFail($id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $row = $activity->update([
            'name' => $request->name,
        ]);

        if($row) {
            return redirect()->route('admin_panel.activities.index')->with('info', 'Activity updated successfully');            
        }
    }

    public function destroy($id) {
        $activity = Activity::findorFail($id);

        $row = $activity->delete();

        if($row) {
            return redirect()->route('admin_panel.activities.index')->with('error', 'Activity deleted successfully');            
        }
    }
}
