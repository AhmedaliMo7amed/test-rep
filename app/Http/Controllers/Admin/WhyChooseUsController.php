<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Http\Controllers\Controller;

class WhyChooseUsController extends Controller
{
    public function index() {
        $whyChooseUs = WhyChooseUs::get();
        return view('admin.why_choose_us.index', compact('whyChooseUs'));
    }

    public function create() {
        return view('admin.why_choose_us.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/why_choose_us_images', $fileName);
        }

        $row = WhyChooseUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.why_choose_us.index')->with('success', 'Why Choose Us created successfully');            
        }
    }

    public function edit($id) {
        $whyChooseUs = WhyChooseUs::findorFail($id);
        return view('admin.why_choose_us.edit', compact('whyChooseUs'));
    }

    public function update(Request $request, $id) {
        $whyChooseUs = WhyChooseUs::findorFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/why_choose_us_images', $fileName);

            if($whyChooseUs->image !== NULL) {
                if(file_exists('uploads/why_choose_us_images/'. $whyChooseUs->image)) {
                    unlink('uploads/why_choose_us_images/'. $whyChooseUs->image);
                }
            }
        }

        $row = $whyChooseUs->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($fileName) ? $fileName : $whyChooseUs->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.why_choose_us.index')->with('info', 'Why Choose Us updated successfully');            
        }
    }

    public function destroy($id) {
        $whyChooseUs = WhyChooseUs::findorFail($id);

        if($whyChooseUs->image !== NULL) {
            if(file_exists('uploads/why_choose_us_images/'. $whyChooseUs->image)) {
                unlink('uploads/why_choose_us_images/'. $whyChooseUs->image);
            }
        }

        $row = $whyChooseUs->delete();

        if($row) {
            return redirect()->route('admin_panel.why_choose_us.index')->with('error', 'Why Choose Us deleted successfully');            
        }
    }
}
