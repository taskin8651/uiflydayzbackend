<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicySection;
class PrivacyPolicyController extends Controller { public function index() { $privacySections = PrivacyPolicySection::where('status', true)->orderBy('sort_order')->get(); return view('frontend.privacy-policy', compact('privacySections')); } }
