<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TechPillar;
use App\Models\AboutSection;


class WhychooseController extends Controller
{
    public function index()
    {
        $techPillars = TechPillar::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
            $aboutSection = AboutSection::query()->first();

        return view('frontend.why-us', compact('techPillars','aboutSection'));
    }
}