<?php

namespace App\Http\Controllers\Admin;

use App\Models\WhatWeOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhatWeOfferController extends Controller
{
    public function index() {
        $whatWeOffer = WhatWeOffer::get();
        return view('admin.what_we_offer.index', compact('whatWeOffer'));
    }

    public function create() {
        return view('admin.what_we_offer.create');
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
            $file->move('uploads/what_we_offer_images', $fileName);
        }

        $row = WhatWeOffer::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.what_we_offer.index')->with('success', 'What We Offer created successfully');            
        }
    }

    public function edit($id) {
        $whatWeOffer = WhatWeOffer::findorFail($id);
        return view('admin.what_we_offer.edit', compact('whatWeOffer'));
    }

    public function update(Request $request, $id) {
        $whatWeOffer = WhatWeOffer::findorFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/what_we_offer_images', $fileName);

            if($whatWeOffer->image !== NULL) {
                if(file_exists('uploads/what_we_offer_images/'. $whatWeOffer->image)) {
                    unlink('uploads/what_we_offer_images/'. $whatWeOffer->image);
                }
            }
        }

        $row = $whatWeOffer->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($fileName) ? $fileName : $whatWeOffer->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.what_we_offer.index')->with('info', 'What We Offer updated successfully');            
        }
    }

    public function destroy($id) {
        $whatWeOffer = WhatWeOffer::findorFail($id);

        if($whatWeOffer->image !== NULL) {
            if(file_exists('uploads/what_we_offer_images/'. $whatWeOffer->image)) {
                unlink('uploads/what_we_offer_images/'. $whatWeOffer->image);
            }
        }

        $row = $whatWeOffer->delete();

        if($row) {
            return redirect()->route('admin_panel.what_we_offer.index')->with('error', 'What We Offer deleted successfully');            
        }
    }
}
