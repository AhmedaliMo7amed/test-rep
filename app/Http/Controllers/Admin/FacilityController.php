<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = Facility::get();
        return view('admin.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/facility_images', $fileName);
        }

        $row = Facility::create([
            'title' => $request->title,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.facilities.index')->with('success', 'Facility created successfully');            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::findorFail($id);
        return view('admin.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facility = Facility::findorFail($id);

        $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/facility_images', $fileName);

            if($facility->image !== NULL) {
                if(file_exists('uploads/facility_images/'. $facility->image)) {
                    unlink('uploads/facility_images/'. $facility->image);
                }
            }
        }

        $row = $facility->update([
            'title' => $request->title,
            'image' => isset($fileName) ? $fileName : $facility->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.facilities.index')->with('info', 'Facility updated successfully');            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findorFail($id);

        if($facility->image !== NULL) {
            if(file_exists('uploads/facility_images/'. $facility->image)) {
                unlink('uploads/facility_images/'. $facility->image);
            }
        }

        $row = $facility->delete();

        if($row) {
            return redirect()->route('admin_panel.facilities.index')->with('error', 'Facility deleted successfully');            
        }
    }
}
