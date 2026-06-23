<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizeCategory;
use App\Models\ProtectionType;
use App\Models\TechPillar;
use App\Models\CertificateItem;
use App\Models\ReviewItem;
use App\Models\FaqItem;

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

        $techPillars = TechPillar::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $certificateItems = CertificateItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->take(4)
            ->get();

        $reviewItems = ReviewItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $faqItems = FaqItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.index', compact(
            'productSizeCategories',
            'protectionTypes',
            'featuredProducts',
            'techPillars',
            'certificateItems',
            'reviewItems',
            'faqItems'
        ));
    }
}