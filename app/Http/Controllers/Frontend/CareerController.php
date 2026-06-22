<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerJob;

class CareerController extends Controller
{
    public function index()
    {
        $careerJobs = CareerJob::query()
            ->where('status', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('frontend.career', compact('careerJobs'));
    }
}