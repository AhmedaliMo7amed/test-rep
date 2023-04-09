<?php

namespace App\Http\Controllers\Website;

use App\Models\Category;
use App\Models\Language;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Mail\SendContactMail;
use App\Models\ContactUsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class PagesController extends Controller
{
    public function redirect()
    {
        return redirect('/en');
    }

    public function home()
    {
        $categories = $this->getCategoriesFromUrl();
        return view('front.home', compact('categories'));
    }

    public function discover()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.discover', compact('category'));
    }

    public function rest()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.rest', compact('category'));
    }

    public function restDetails(SubCategory $sub_category)
    {
        return view('front.rest_details', compact('sub_category'));
    }

    public function restore()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.restore', compact('category'));
    }

    public function play()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.play', compact('category'));
    }

    public function inspire()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.inspire', compact('category'));
    }

    public function connect()
    {
        $category = $this->getSubCategoriesFromUrl();
        return view('front.connect', compact('category'));
    }

    public function sustainability()
    {
        return view('front.sustainability');
    }

    public function cancellations()
    {
        return view('front.cancellations');
    }

    public function contactUs()
    {
        return view('front.contact_us');
    }

    public function comingSoon()
    {
        return view('front.coming_soon');
    }

    public function contactUsRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ]);
        }

        $row = ContactUsRequest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $emails = ['info@theserry.com', 'svitlana@sindbadclub.com'];
        foreach($emails as $email){
            Mail::to($email)->send(new SendContactMail($row));
        }

        if($row) {
            return response()->json(['success' => 'Message sent successfully']);
        }

    }

    private function getCategoriesFromUrl()
    {
        return Category::language($this->getCurrentLang()->id)->order()->get();
    }

    private function getSubCategoriesFromUrl()
    {
        return Category::with('sub_categories')->realTitle($this->getLastUrlSegementPart())->language($this->getCurrentLang()->id)->first();
    }

    private function getCurrentLang()
    {
        return Language::where('code', $this->getCurrentLangLocale())->first();
    }

    private function getCurrentLangLocale()
    {
        return app()->getLocale();
    }

    private function getLastUrlSegementPart()
    {
        return request()->segment(count(request()->segments()));
    }
}
