<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create() {
        return view('admin.news.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:news',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/news_images', $fileName);
        }

        $row = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.blogs.index')->with('success', 'Blog created successfully');            
        }
    }

    public function edit($id) {
        $news = News::findorFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id) {
        $news = News::findorFail($id);

        $this->validate($request, [
            'title' => 'required|unique:news,title,'.$id,
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/news_images', $fileName);

            if($news->image !== NULL) {
                if(file_exists('uploads/news_images/'. $news->image)) {
                    unlink('uploads/news_images/'. $news->image);
                }
            }
        }

        $row = $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => isset($fileName) ? $fileName : $news->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.blogs.index')->with('info', 'Blog updated successfully');            
        }
    }

    public function delete($id) {
        $news = News::findorFail($id);

        if($news->image !== NULL) {
            if(file_exists('uploads/news_images/'. $news->image)) {
                unlink('uploads/news_images/'. $news->image);
            }
        }

        $row = $news->delete();

        if($row) {
            return redirect()->route('admin_panel.blogs.index')->with('error', 'Blog deleted successfully');            
        }
    }
}
