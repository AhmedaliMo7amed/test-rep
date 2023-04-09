<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
    public function index() {
        $partners = Partner::get();
        return view('admin.partners.index', compact('partners'));
    }
    
    public function create() {
        return view('admin.partners.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/partner_images', $fileName);
        }

        $row = Partner::create([
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.partners.index')->with('success', 'Partner created successfully');            
        }
    }

    public function edit($id) {
        $partner = Partner::findorFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id) {
        $partner = Partner::findorFail($id);

        $this->validate($request, [
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/partner_images', $fileName);

            if($partner->image !== NULL) {
                if(file_exists('uploads/partner_images/'. $partner->image)) {
                    unlink('uploads/partner_images/'. $partner->image);
                }
            }
        }

        $row = $partner->update([
            'image' => isset($fileName) ? $fileName : $partner->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.partners.index')->with('info', 'Partner updated successfully');            
        }
    }

    public function destroy($id) {
        $partner = Partner::findorFail($id);

        if($partner->image !== NULL) {
            if(file_exists('uploads/partner_images/'. $partner->image)) {
                unlink('uploads/partner_images/'. $partner->image);
            }
        }

        $row = $partner->delete();

        if($row) {
            return redirect()->route('admin_panel.partners.index')->with('error', 'Partner deleted successfully');            
        }
    }
}
