<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhychooseController extends Controller
{
    public function index()
    {
        $techPillars = TechPillar::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.', compact('techPillars'));
    }
}
