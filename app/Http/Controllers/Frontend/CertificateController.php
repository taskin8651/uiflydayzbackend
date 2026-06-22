<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CertificateItem;

class CertificateController extends Controller
{
    public function index()
    {
        $certificateItems = CertificateItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.certificates', compact('certificateItems'));
    }
}