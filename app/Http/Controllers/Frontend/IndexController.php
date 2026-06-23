<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizeCategory;
use App\Models\ProtectionType;

class IndexController extends Controller
{
    public function index()
    {
        $productSizeCategories = ProductSizeCategory::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $protectionTypes = ProtectionType::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $featuredProducts = Product::query()
            ->with(['sizeCategory', 'protectionType', 'media'])
            ->where('status', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.index', compact(
            'productSizeCategories',
            'protectionTypes',
            'featuredProducts'
        ));
    }
}