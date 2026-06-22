<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DistributorEnquiry;
use Illuminate\Http\Request;

class DistributorEnquiryController extends Controller
{

public function index(){


     return view('frontend.distributor');
}
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'business_name' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:150'],
            'state' => ['required', 'string', 'max:150'],
            'partnership_category' => ['required', 'string', 'max:150'],
            'business_experience' => ['nullable', 'string', 'max:150'],
            'current_network' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'consent' => ['accepted'],
        ]);

        DistributorEnquiry::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'business_name' => $request->business_name,
            'city' => $request->city,
            'state' => $request->state,
            'partnership_category' => $request->partnership_category,
            'business_experience' => $request->business_experience,
            'current_network' => $request->current_network,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your distributorship enquiry has been submitted successfully.');
    }
}