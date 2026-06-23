<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class ContactEnquiryController extends Controller
{
      public function index()
    {
        $websiteSettings = WebsiteSetting::current();

        return view('frontend.contact', compact('websiteSettings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'enquiry_type' => ['required', 'string', 'max:150'],
            'city' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string'],
        ]);

        ContactEnquiry::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'enquiry_type' => $request->enquiry_type,
            'city' => $request->city,
            'message' => $request->message,
            'status' => 'new',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your enquiry has been submitted successfully.');
    }
}