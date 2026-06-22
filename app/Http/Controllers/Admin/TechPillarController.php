<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechPillar;
use Illuminate\Http\Request;

class TechPillarController extends Controller
{
    public function index()
    {
        $techPillars = TechPillar::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.tech-pillars.index', compact('techPillars'));
    }

    public function create()
    {
        return view('admin.tech-pillars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => ['nullable', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon_alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'icon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        $techPillar = TechPillar::create([
            'number' => $request->number,
            'title' => $request->title,
            'description' => $request->description,
            'icon_alt' => $request->icon_alt,
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
        ]);

        if ($request->hasFile('icon')) {
            $techPillar
                ->addMediaFromRequest('icon')
                ->toMediaCollection('tech_pillar_icon');
        }

        return redirect()
            ->route('admin.tech-pillars.index')
            ->with('success', 'Technology pillar created successfully.');
    }

    public function edit(TechPillar $techPillar)
    {
        return view('admin.tech-pillars.edit', compact('techPillar'));
    }

    public function update(Request $request, TechPillar $techPillar)
    {
        $request->validate([
            'number' => ['nullable', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon_alt' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'icon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        $techPillar->update([
            'number' => $request->number,
            'title' => $request->title,
            'description' => $request->description,
            'icon_alt' => $request->icon_alt,
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
        ]);

        if ($request->hasFile('icon')) {
            $techPillar
                ->addMediaFromRequest('icon')
                ->toMediaCollection('tech_pillar_icon');
        }

        return redirect()
            ->route('admin.tech-pillars.index')
            ->with('success', 'Technology pillar updated successfully.');
    }

    public function destroy(TechPillar $techPillar)
    {
        $techPillar->delete();

        return redirect()
            ->route('admin.tech-pillars.index')
            ->with('success', 'Technology pillar deleted successfully.');
    }
}