<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsRequest;

class ContactUsRequestsController extends Controller
{
    public function index() {
        $contact_us_requests = ContactUsRequest::get();
        return view('admin.contact_us_requests.index', compact('contact_us_requests'));
    }

    public function show($id) {
        $contactUsRequest = ContactUsRequest::findorFail($id);

        return view('admin.contact_us_requests.show', compact('contactUsRequest'));
    }

    public function destroy($id) {
        $contactUsRequest = ContactUsRequest::findorFail($id);

        $row = $contactUsRequest->delete();

        if($row) {
            return redirect()->route('admin_panel.contact_requests.index')->with('error', 'Contact Request deleted successfully');            
        }
    }
}
