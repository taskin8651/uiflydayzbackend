<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProtectionType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProtectionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:protection_type_access', ['only' => ['index']]);
        $this->middleware('can:protection_type_create', ['only' => ['create', 'store']]);
        $this->middleware('can:protection_type_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:protection_type_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $protectionTypes = ProtectionType::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.protection-types.index', compact('protectionTypes'));
    }

    public function create()
    {
        return view('admin.protection-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'badge_text' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:protection_types,slug'],
            'description' => ['nullable', 'string'],
            'point_one' => ['nullable', 'string', 'max:255'],
            'point_two' => ['nullable', 'string', 'max:255'],
            'point_three' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
        ]);

        $protectionType = ProtectionType::create([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'description' => $request->description,
            'point_one' => $request->point_one,
            'point_two' => $request->point_two,
            'point_three' => $request->point_three,
            'is_alt' => $request->boolean('is_alt'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $protectionType->addMediaFromRequest('image')
                ->toMediaCollection('protection_type_image');
        }

        return redirect()->route('admin.protection-types.index')
            ->with('success', 'Protection type created successfully.');
    }

    public function edit($id)
    {
        $protectionType = ProtectionType::findOrFail($id);

        return view('admin.protection-types.edit', compact('protectionType'));
    }

    public function update(Request $request, $id)
    {
        $protectionType = ProtectionType::findOrFail($id);

        $request->validate([
            'badge_text' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:protection_types,slug,' . $protectionType->id],
            'description' => ['nullable', 'string'],
            'point_one' => ['nullable', 'string', 'max:255'],
            'point_two' => ['nullable', 'string', 'max:255'],
            'point_three' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
        ]);

        $protectionType->update([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'slug' => $request->slug ?: Str::slug($request->title),
            'description' => $request->description,
            'point_one' => $request->point_one,
            'point_two' => $request->point_two,
            'point_three' => $request->point_three,
            'is_alt' => $request->boolean('is_alt'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('image')) {
            $protectionType->addMediaFromRequest('image')
                ->toMediaCollection('protection_type_image');
        }

        return redirect()->route('admin.protection-types.index')
            ->with('success', 'Protection type updated successfully.');
    }

    public function destroy($id)
    {
        ProtectionType::findOrFail($id)->delete();

        return redirect()->route('admin.protection-types.index')
            ->with('success', 'Protection type deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        ProtectionType::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}