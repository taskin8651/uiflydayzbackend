<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:contact_enquiry_access', ['only' => ['index', 'show']]);
        $this->middleware('can:contact_enquiry_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $contactEnquiries = ContactEnquiry::query()
            ->latest()
            ->get();

        return view('admin.contact-enquiries.index', compact('contactEnquiries'));
    }

    public function show(ContactEnquiry $contactEnquiry)
    {
        if ($contactEnquiry->status === 'new') {
            $contactEnquiry->update([
                'status' => 'read',
            ]);
        }

        return view('admin.contact-enquiries.show', compact('contactEnquiry'));
    }

    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();

        return redirect()
            ->route('admin.contact-enquiries.index')
            ->with('success', 'Contact enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        ContactEnquiry::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}