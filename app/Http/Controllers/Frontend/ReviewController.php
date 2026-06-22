<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ReviewItem;

class ReviewController extends Controller
{
    public function index()
    {
        $reviewItems = ReviewItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.reviews', compact('reviewItems'));
    }
}