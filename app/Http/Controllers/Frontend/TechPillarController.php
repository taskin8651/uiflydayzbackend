<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TechPillar;
use App\Models\Product;
use App\Models\ProductSizeCategory;

class TechPillarController extends Controller
{
    public function index()
    {
        $techPillars = TechPillar::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $sizeCategories = ProductSizeCategory::query()->where('status', true)->orderBy('sort_order')->get();
        $products = Product::query()->with(['sizeCategory', 'protectionType', 'media'])->where('status', true)->orderBy('sort_order')->get();

        return view('frontend.technology', compact('techPillars', 'sizeCategories', 'products'));
    }
}
