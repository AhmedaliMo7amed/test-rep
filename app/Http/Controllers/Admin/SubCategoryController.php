<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Language;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $language = Language::where('code', $request->lang)->first();
        $sub_categories = SubCategory::with('category')->where('language_id', $language->id)->get();
        return view('admin.sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $language = Language::where('code', $request->lang)->first();
        $categories = Category::where('language_id', $language->id)->get();
        return view('admin.sub_categories.create', compact('language', 'categories'));
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
            'description' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'popup_content' => 'nullable',
            'btn_visibility' => 'nullable|boolean',
            'btn_text' => 'nullable|string',
            'has_carousel' => 'nullable|boolean',
            'carousel_img_1' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_2' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_3' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_4' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_5' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'category_id' => 'required|integer',
            'language_id' => 'required|integer|exists:languages,id'
        ]);
        
        if (!isset($request->has_carousel)) {
            $request['has_carousel'] = false;
        }
        
        if (!isset($request->btn_visibility)) {
            $request['btn_visibility'] = false;
        }


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $static_image = $fileName;
            $file->move('uploads/sub_category_images', $fileName);
        }

        $carousel_list = array();
        for ($i=1; $i < 6 ; $i++) {
            if ($request->hasFile('carousel_img_'.$i)) {

                $file = $request->file('carousel_img_'.$i);
                $fileName = time() .random_int(100000, 999999). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/carousel', $fileName);
                $carousel_list += [ "carousel_img_".$i => $fileName];
            }
        }

        if ($request->has('popup_content')) {

            $content = $request->popup_content;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData = base64_decode($data);
                $image_name = time() . $item . '.png';
                $path =  'uploads/popups/' . $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset('uploads/popups/' . $image_name));
            }

            $content = $dom->saveHTML();
        }

        $row = SubCategory::create([
            'title' => $request->title,
            'description' => $request->description,
            'long_desc' => $request->long_desc,
            'has_carousel' => $request->has_carousel,
            'btn_visibility' => $request->btn_visibility,
            'btn_text' => $request->btn_text,
            'carousel_img_1' => isset($carousel_list['carousel_img_1']) ? $carousel_list['carousel_img_1'] : null,
            'carousel_img_2' => isset($carousel_list['carousel_img_2']) ? $carousel_list['carousel_img_2'] : null,
            'carousel_img_3' => isset($carousel_list['carousel_img_3']) ? $carousel_list['carousel_img_3'] : null,
            'carousel_img_4' => isset($carousel_list['carousel_img_4']) ? $carousel_list['carousel_img_4'] : null,
            'carousel_img_5' => isset($carousel_list['carousel_img_5']) ? $carousel_list['carousel_img_5'] : null,
            'popup_content' => isset($content) ? $content : null,
            'category_id' => $request->category_id,
            'at_a_glance' => $request->at_a_glance,
            'amenities' => $request->amenities,
            'image' => isset($static_image) ? $static_image : null,
        ]);

        $language = Language::findorFail($request->language_id);

        if ($row) {
            return redirect()->route('admin_panel.sub_categories.index', ['lang' => $language->code])->with('success', 'Sub Category created successfully');
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
        $categories = Category::where('language_id', $language->id)->get();
        $sub_category = SubCategory::findorFail($id);
        return view('admin.sub_categories.edit', compact('language', 'categories', 'sub_category'));
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
        // dd($request->all());
        $sub_category = SubCategory::findorFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'long_desc' => 'nullable',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'btn_visibility' => 'nullable|boolean',
            'btn_text' => 'nullable|string',
            'popup_content' => 'nullable',
            'has_carousel' => 'nullable|boolean',
            'carousel_img_1' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_2' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_3' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_4' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'carousel_img_5' => 'nullable|mimes:jpg,png,jpeg,svg|max:10240',
            'category_id' => 'required|integer',
            'language_id' => 'required|integer|exists:languages,id'
        ]);
        
        
        if (!isset($request->has_carousel)) {
            $request['has_carousel'] = false;
        }
        
        if (!isset($request->btn_visibility)) {
            $request['btn_visibility'] = false;
        }


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $static_image = $fileName;
            $file->move('uploads/sub_category_images', $fileName);
            

            if ($sub_category->image !== NULL) {
                if (file_exists('uploads/sub_category_images/' . $sub_category->image)) {
                    unlink('uploads/sub_category_images/' . $sub_category->image);
                }
            }
        }

        $carousel_list = array();
        for ($i=1; $i < 6 ; $i++) {
            if ($request->hasFile('carousel_img_'.$i)) {

                $file = $request->file('carousel_img_'.$i);
                $fileName = time() .random_int(100000, 999999). '.' . $file->getClientOriginalExtension();
                $file->move('uploads/carousel', $fileName);

                $carousel_list += [ "carousel_img_".$i => $fileName];

                if ($sub_category['carousel_img_'.$i] !== NULL) {
                    if (file_exists('uploads/carousel/' . $sub_category['carousel_img_'.$i])) {
                        unlink('uploads/carousel/' . $sub_category['carousel_img_'.$i]);
                    }
                }
            }
        }

        if ($request->has('popup_content') && $request->popup_content != NULL) {

            $content = $request->popup_content;
            $dom = new \DomDocument();
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile = $dom->getElementsByTagName('img');

            foreach ($imageFile as $item => $image) {
                $data = $image->getAttribute('src');
                if ($sub_category->popup_content != NULL || $sub_category->popup_content != '') {


                    $old_data = $sub_category->popup_content;
                    $old_dom = new \DomDocument();

                    $old_dom->loadHtml($old_data, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    $old_imageFile = $old_dom->getElementsByTagName('img');


                    foreach ($old_imageFile as $old_item => $old_image) {
                        $final = $old_image->getAttribute('src');
                    }

                    if(count($old_imageFile)){

                        if ($data != $final) {

                        list($type, $data) = explode(';', $data);
                        list(, $data)      = explode(',', $data);
                        $imgeData = base64_decode($data);
                        $image_name = time() . $item . '.png';
                        $path =  'uploads/popups/' . $image_name;
                        file_put_contents($path, $imgeData);

                        $image->removeAttribute('src');
                        $image->setAttribute('src', asset('uploads/popups/' . $image_name));

                        }

                    }


                    $content = $dom->saveHTML();
                }
            }


        }
        
        
       

        $data = $sub_category->update([
            'title' => $request->title,
            'description' => $request->description,
            'long_desc' => $request->long_desc,
            'has_carousel' => $request->has_carousel,
            'btn_visibility' => $request->btn_visibility,
            'btn_text' => $request->btn_text,
            'carousel_img_1' => isset($carousel_list['carousel_img_1']) ? $carousel_list['carousel_img_1'] : $sub_category['carousel_img_1'],
            'carousel_img_2' => isset($carousel_list['carousel_img_2']) ? $carousel_list['carousel_img_2'] : $sub_category['carousel_img_2'],
            'carousel_img_3' => isset($carousel_list['carousel_img_3']) ? $carousel_list['carousel_img_3'] : $sub_category['carousel_img_3'],
            'carousel_img_4' => isset($carousel_list['carousel_img_4']) ? $carousel_list['carousel_img_4'] : $sub_category['carousel_img_4'],
            'carousel_img_5' => isset($carousel_list['carousel_img_5']) ? $carousel_list['carousel_img_5'] : $sub_category['carousel_img_5'],
            'popup_content' => isset($content) ? $content : $sub_category->popup_content,
            'category_id' => $request->category_id,
            'at_a_glance' => $request->at_a_glance,
            'amenities' => $request->amenities,
            'image' => isset($static_image) ? $static_image : $sub_category->image,

        ]);

        $language = Language::findorFail($request->language_id);

        if ($data) {
            return redirect()->route('admin_panel.sub_categories.index', ['lang' => $language->code])->with('info', 'Sub Category updated successfully');
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
        $sub_category = SubCategory::findorFail($id);

        if ($sub_category->image !== NULL) {
            if (file_exists('uploads/sub_category_images/' . $sub_category->image)) {
                unlink('uploads/sub_category_images/' . $sub_category->image);
            }
        }

        $row = $sub_category->delete();

        if ($row) {
            return redirect()->route('admin_panel.sub_categories.index', ['lang' => $request->language_id])->with('error', 'Sub Category deleted successfully');
        }
    }

    public function remove_slider($id , $slider_no)
    {
        $sub_category = SubCategory::findorFail($id);

        $sub_category->update([
            $slider_no => NULL,
        ]);

        return redirect()->back();
    }
}
