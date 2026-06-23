<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizeCategory;
use App\Models\ProtectionType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sizeCategories = ProductSizeCategory::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $protectionTypes = ProtectionType::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $products = Product::query()
            ->with(['sizeCategory', 'protectionType', 'media'])
            ->where('status', true)
            ->when($request->filled('size'), function ($query) use ($request) {
                $query->whereHas('sizeCategory', function ($q) use ($request) {
                    $q->where('slug', $request->size);
                });
            })
            ->when($request->filled('protection'), function ($query) use ($request) {
                $query->whereHas('protectionType', function ($q) use ($request) {
                    $q->where('slug', $request->protection);
                });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.products', compact('products', 'sizeCategories', 'protectionTypes'));
    }

    public function show($slug)
    {
        $product = Product::query()
            ->with(['sizeCategory', 'protectionType', 'media'])
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedProducts = Product::query()
            ->with(['sizeCategory', 'protectionType', 'media'])
            ->where('status', true)
            ->where('id', '!=', $product->id)
            ->where(function ($query) use ($product) {
                $query->where('product_size_category_id', $product->product_size_category_id)
                    ->orWhere('protection_type_id', $product->protection_type_id);
            })
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}