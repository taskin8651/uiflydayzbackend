<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:about_section_access', ['only' => ['index']]);
        $this->middleware('can:about_section_edit', ['only' => ['update']]);
    }

    public function index()
    {
        $aboutSection = AboutSection::query()->first();

        if (!$aboutSection) {
            $aboutSection = AboutSection::create([
                'title' => 'Comfort Made Personal. Protection Made Powerful.',
                'short_description' => 'FlyDayz is a modern feminine hygiene brand focused on creating sanitary pads that combine softness, reliable absorption and secure leak protection.',
                'description' => 'From active mornings to peaceful nights, our goal is to deliver hygienic protection that feels gentle on the skin while providing dependable performance when it matters most.',
            ]);
        }

        return view('admin.about-section.index', compact('aboutSection'));
    }

    public function update(Request $request)
    {
        $aboutSection = AboutSection::query()->first();

        if (!$aboutSection) {
            $aboutSection = new AboutSection();
        }

        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
        ]);

        $aboutSection->fill([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        $aboutSection->save();

        if ($request->hasFile('image')) {
            $aboutSection
                ->addMediaFromRequest('image')
                ->toMediaCollection('about_section_image');
        }

        return redirect()
            ->route('admin.about-section.index')
            ->with('success', 'About section updated successfully.');
    }
}