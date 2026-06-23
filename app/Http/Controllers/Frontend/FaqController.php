<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $faqItems = FaqItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.faqs', compact('faqItems'));
    }
}