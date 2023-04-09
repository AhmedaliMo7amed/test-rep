<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::get();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedbacks.create');
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
            'name' => 'required',
            'description' => 'required',
            'job' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/feedback_images', $fileName);
        }

        $row = Feedback::create([
            'name' => $request->name,
            'description' => $request->description,
            'job' => $request->job,
            'image' => $fileName
        ]);

        if($row) {
            return redirect()->route('admin_panel.feedbacks.index')->with('success', 'Feedback created successfully');            
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
        $feedback = Feedback::findorFail($id);
        return view('admin.feedbacks.edit', compact('feedback'));
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
        $feedback = Feedback::findorFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'job' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,svg',
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/feedback_images', $fileName);

            if($feedback->image !== NULL) {
                if(file_exists('uploads/feedback_images/'. $feedback->image)) {
                    unlink('uploads/feedback_images/'. $feedback->image);
                }
            }
        }

        $row = $feedback->update([
            'name' => $request->name,
            'description' => $request->description,
            'job' => $request->job,
            'image' => isset($fileName) ? $fileName : $feedback->image,
        ]);

        if($row) {
            return redirect()->route('admin_panel.feedbacks.index')->with('info', 'Feedback updated successfully');            
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
        $feedback = Feedback::findorFail($id);

        if($feedback->image !== NULL) {
            if(file_exists('uploads/feedback_images/'. $feedback->image)) {
                unlink('uploads/feedback_images/'. $feedback->image);
            }
        }

        $row = $feedback->delete();

        if($row) {
            return redirect()->route('admin_panel.feedbacks.index')->with('error', 'Feedback deleted successfully');            
        }
    }
}
