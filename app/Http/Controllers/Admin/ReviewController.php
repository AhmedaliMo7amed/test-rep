<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index($courseId) {
        $course = Course::findorFail($courseId);
        $reviews = $course->reviews()->orderBy('id', 'desc')->get();
        return view('admin.reviews.index', compact('course', 'reviews'));
    }

    public function getReviewDetails($reviewId) {
        $review = Review::with(['user', 'course'])->findorFail($reviewId);

        $review_details = view('admin.reviews.include.review_details', compact('review'))->render();

        return response()->json([
            'review_details' => $review_details
        ]);
    }

    public function updateReviewStatus(Request $request) {
        $review = Review::findorFail($request->review_id);

        $review->update([
            'status' => $request->review_status
        ]);

        return redirect()->back()->with('success', 'Review status updated successfully');
    }
}
