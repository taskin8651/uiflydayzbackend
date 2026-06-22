<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DownloadItem;

class DownloadController extends Controller
{
    public function index()
    {
        $downloadItems = DownloadItem::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.download', compact('downloadItems'));
    }
}