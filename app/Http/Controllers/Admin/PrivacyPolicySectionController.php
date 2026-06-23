<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicySection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PrivacyPolicySectionController extends Controller {
 public function index(){ $sections=PrivacyPolicySection::orderBy('sort_order')->get(); return view('admin.privacy-policy-sections.index',compact('sections')); }
 public function create(){ return view('admin.privacy-policy-sections.form',['section'=>new PrivacyPolicySection]); }
 public function store(Request $request){ PrivacyPolicySection::create($this->data($request)); return redirect()->route('admin.privacy-policy-sections.index')->with('success','Policy section added.'); }
 public function edit(PrivacyPolicySection $privacyPolicySection){ return view('admin.privacy-policy-sections.form',['section'=>$privacyPolicySection]); }
 public function update(Request $request,PrivacyPolicySection $privacyPolicySection){ $privacyPolicySection->update($this->data($request,$privacyPolicySection)); return redirect()->route('admin.privacy-policy-sections.index')->with('success','Policy section updated.'); }
 public function destroy(PrivacyPolicySection $privacyPolicySection){$privacyPolicySection->delete();return back()->with('success','Policy section deleted.');}
 private function data(Request $request, ?PrivacyPolicySection $section=null):array { $data=$request->validate(['title'=>'required|string|max:255','subtitle'=>'nullable|string|max:255','icon_class'=>'nullable|string|max:100','content'=>'required|string','sort_order'=>'nullable|integer']); $data['slug']=Str::slug($data['title']); if(PrivacyPolicySection::where('slug',$data['slug'])->when($section,fn($q)=>$q->where('id','!=',$section->id))->exists()) $data['slug'].='-'.uniqid(); $data['icon_class']=$data['icon_class']?:'bi bi-shield-check';$data['status']=$request->boolean('status');$data['sort_order']=$data['sort_order']??0;return $data; }
}
