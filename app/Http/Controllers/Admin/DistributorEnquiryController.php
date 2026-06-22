<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DistributorEnquiry;
use Illuminate\Http\Request;

class DistributorEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:distributor_enquiry_access', ['only' => ['index', 'show']]);
        $this->middleware('can:distributor_enquiry_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $distributorEnquiries = DistributorEnquiry::query()
            ->latest()
            ->get();

        return view('admin.distributor-enquiries.index', compact('distributorEnquiries'));
    }

    public function show(DistributorEnquiry $distributorEnquiry)
    {
        if ($distributorEnquiry->status === 'new') {
            $distributorEnquiry->update([
                'status' => 'read',
            ]);
        }

        return view('admin.distributor-enquiries.show', compact('distributorEnquiry'));
    }

    public function destroy(DistributorEnquiry $distributorEnquiry)
    {
        $distributorEnquiry->delete();

        return redirect()
            ->route('admin.distributor-enquiries.index')
            ->with('success', 'Distributor enquiry deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        DistributorEnquiry::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}