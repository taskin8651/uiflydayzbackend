<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TechPillar;

class TechPillarController extends Controller
{
    public function index()
    {
        $techPillars = TechPillar::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.technology', compact('techPillars'));
    }
}