<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $language = Language::where('code', $request->lang)->first();
        $categories = Category::where('language_id', $language->id)->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $language = Language::where('code', $request->lang)->first();
        return view('admin.categories.create', compact('language'));
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
            'header_title' => 'required',
            'header_subtitle' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
            'real_title' => 'required',
            'banner_header' => 'required' ,
            'banner_title' => 'required' ,
            'banner_color'=> 'required',
            'banner_description'=> 'required',
            'banner_image'=> 'required|mimes:jpg,png,jpeg,svg',
            'language_id' => 'required|integer|exists:languages,id'
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category_images/', $fileName);
        }

        if($request->hasFile('banner_image')) {
            $banner_file = $request->file('banner_image');
            $banner_fileName = time().'.'.$banner_file->getClientOriginalExtension();
            $file->move('uploads/category_images/banners/', $banner_fileName);
        }

        $row = Category::create([
            'header_title' => $request->header_title,
            'header_subtitle' => $request->header_subtitle,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'real_title' => $request->real_title,
            'banner_header' => $request-> banner_header,
            'banner_title' => $request-> banner_title,
            'banner_color' => $request-> banner_color,
            'banner_description' => $request-> banner_description,
            'banner_image' =>$banner_fileName ,
            'language_id' => $request->language_id,
        ]);

        $language = Language::findorFail($request->language_id);

        if($row) {
            return redirect()->route('admin_panel.categories.index', ['lang' => $language->code])->with('success', 'Category created successfully');
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
    public function edit($id, Request $request)
    {
        $language = Language::where('code', $request->lang)->first();
        $category = Category::findorFail($id);
        return view('admin.categories.edit', compact('language', 'category'));
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
        $category = Category::findorFail($id);

        $this->validate($request, [
            'header_title' => 'required',
            'header_subtitle' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
            'real_title' => 'required',
            'banner_header' => 'required' ,
            'banner_title' => 'required' ,
            'banner_color'=> 'required',
            'banner_description'=> 'required',
            'banner_image'=> 'nullable|mimes:jpg,png,jpeg,svg',
            'language_id' => 'required|integer|exists:languages,id'
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category_images', $fileName);

            if($category->image !== NULL) {
                if(file_exists('uploads/category_images/'. $category->image)) {
                    unlink('uploads/category_images/'. $category->image);
                }
            }
        }

        if($request->hasFile('banner_image')) {
            $banner_file = $request->file('banner_image');
            $banner_fileName = time().'.'.$banner_file->getClientOriginalExtension();
            $banner_file->move('uploads/category_images/banners/', $banner_fileName);

            if($category->banner_image !== NULL) {
                if(file_exists('uploads/category_images/banners/'. $category->banner_image)) {
                    unlink('uploads/category_images/banners/'. $category->banner_image);
                }
            }
        }

        $row = $category->update([
            'header_title' => $request->header_title,
            'header_subtitle' => $request->header_subtitle,
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($fileName) ? $fileName : $category->image,
            'banner_header' => $request-> banner_header,
            'banner_title' => $request-> banner_title,
            'banner_color' => $request-> banner_color,
            'banner_description' => $request-> banner_description,
            'banner_image' =>isset($banner_fileName) ? $banner_fileName : $category->banner_image,
            'real_title' => $request->real_title,
        ]);

        $language = Language::findorFail($request->language_id);

        if($row) {
            return redirect()->route('admin_panel.categories.index', ['lang' => $language->code])->with('info', 'Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = Category::findorFail($id);

        if($category->image !== NULL) {
            if(file_exists('uploads/category_images/'. $category->image)) {
                unlink('uploads/category_images/'. $category->image);
            }
        }

        if($category->banner_image !== NULL) {
            if(file_exists('uploads/category_images/banners'. $category->banner_image)) {
                unlink('uploads/category_images/banners'. $category->banner_image);
            }
        }

        $row = $category->delete();

        if($row) {
            return redirect()->route('admin_panel.categories.index', ['lang' => $request->language_id])->with('error', 'Category deleted successfully');
        }
    }
}
