<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\CareerJob;
use App\Models\CertificateItem;
use App\Models\ContactEnquiry;
use App\Models\DistributorEnquiry;
use App\Models\DownloadItem;
use App\Models\FaqItem;
use App\Models\Product;
use App\Models\ProductSizeCategory;
use App\Models\ProtectionType;
use App\Models\ReviewItem;

class HomeController
{
    public function index()
    {
        $stats = [
            ['label' => 'Products', 'value' => Product::count(), 'active' => Product::where('status', true)->count(), 'icon' => 'fa-box-open', 'route' => 'admin.products.index', 'color' => 'pink'],
            ['label' => 'Blog Articles', 'value' => BlogPost::count(), 'active' => BlogPost::where('status', true)->count(), 'icon' => 'fa-book-open', 'route' => 'admin.blog-posts.index', 'color' => 'purple'],
            ['label' => 'FAQs', 'value' => FaqItem::count(), 'active' => FaqItem::where('status', true)->count(), 'icon' => 'fa-circle-question', 'route' => 'admin.faq-items.index', 'color' => 'blue'],
            ['label' => 'Reviews', 'value' => ReviewItem::count(), 'active' => ReviewItem::where('status', true)->count(), 'icon' => 'fa-star', 'route' => 'admin.review-items.index', 'color' => 'gold'],
        ];

        $contentStats = [
            ['label' => 'Size Categories', 'value' => ProductSizeCategory::count(), 'route' => 'admin.product-size-categories.index'],
            ['label' => 'Protection Types', 'value' => ProtectionType::count(), 'route' => 'admin.protection-types.index'],
            ['label' => 'Downloads', 'value' => DownloadItem::count(), 'route' => 'admin.download-items.index'],
            ['label' => 'Certificates', 'value' => CertificateItem::count(), 'route' => 'admin.certificate-items.index'],
            ['label' => 'Career Jobs', 'value' => CareerJob::count(), 'route' => 'admin.career-jobs.index'],
        ];

        $enquiries = collect()
            ->merge(DistributorEnquiry::latest()->take(5)->get()->map(fn ($item) => (object) ['name' => $item->full_name, 'type' => 'Distributor', 'city' => $item->city, 'status' => $item->status, 'created_at' => $item->created_at, 'route' => 'admin.distributor-enquiries.index']))
            ->merge(ContactEnquiry::latest()->take(5)->get()->map(fn ($item) => (object) ['name' => $item->full_name, 'type' => $item->enquiry_type ?: 'Contact', 'city' => $item->city, 'status' => $item->status, 'created_at' => $item->created_at, 'route' => 'admin.contact-enquiries.index']))
            ->sortByDesc('created_at')
            ->take(6);

        $recentProducts = Product::latest()->take(4)->get();
        $pendingEnquiries = DistributorEnquiry::where('status', 'new')->count() + ContactEnquiry::where('status', 'new')->count();

        return view('home', compact('stats', 'contentStats', 'enquiries', 'recentProducts', 'pendingEnquiries'));
    }
}
