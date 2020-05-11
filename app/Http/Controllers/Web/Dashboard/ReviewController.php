<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pages.reviews');
    }

    public function updateIsActive(Request $request)
    {
        $request->validate([
            'review_id' => 'required|integer|exists:reviews,id',
            'is_active' => 'required|boolean',
        ]);
        Review::where('id', $request->review_id)->update(['is_active' => $request->is_active]);
        return ['success' => true, 'message' => 'Review updated successfully'];
    }
}
