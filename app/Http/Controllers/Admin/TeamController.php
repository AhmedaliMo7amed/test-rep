<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index() {
        $team = Team::get();
        return view('admin.team.index', compact('team'));
    }

    public function create() {
        return view('admin.team.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'job' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/team_images', $fileName);
        }

        $row = Team::create([
            'title' => $request->title,
            'job' => $request->job,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.team.index')->with('success', 'Team created successfully');            
        }
    }

    public function edit($id) {
        $team = Team::findorFail($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id) {
        $team = Team::findorFail($id);

        $this->validate($request, [
            'title' => 'required',
            'job' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/team_images', $fileName);

            if($team->image !== NULL) {
                if(file_exists('uploads/team_images/'. $team->image)) {
                    unlink('uploads/team_images/'. $team->image);
                }
            }
        }

        $row = $team->update([
            'title' => $request->title,
            'job' => $request->job,
            'image' => isset($fileName) ? $fileName : $team->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.team.index')->with('info', 'Team updated successfully');            
        }
    }

    public function destroy($id) {
        $team = Team::findorFail($id);

        if($team->image !== NULL) {
            if(file_exists('uploads/team_images/'. $team->image)) {
                unlink('uploads/team_images/'. $team->image);
            }
        }

        $row = $team->delete();

        if($row) {
            return redirect()->route('admin_panel.team.index')->with('error', 'Team deleted successfully');            
        }
    }
}
