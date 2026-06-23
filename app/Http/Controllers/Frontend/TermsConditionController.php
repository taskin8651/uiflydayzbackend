<?php
namespace App\Http\Controllers\Frontend; use App\Http\Controllers\Controller; use App\Models\TermsConditionSection;
class TermsConditionController extends Controller { public function index(){ $termsSections=TermsConditionSection::where('status',true)->orderBy('sort_order')->get(); return view('frontend.term-condition',compact('termsSections')); } }
