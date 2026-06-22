<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerJob;
use Illuminate\Http\Request;

class CareerJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:career_job_access', ['only' => ['index', 'show']]);
        $this->middleware('can:career_job_create', ['only' => ['create', 'store']]);
        $this->middleware('can:career_job_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:career_job_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $careerJobs = CareerJob::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.career-jobs.index', compact('careerJobs'));
    }

    public function create()
    {
        return view('admin.career-jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'category_label' => ['nullable', 'string', 'max:100'],
            'status_label' => ['nullable', 'string', 'max:100'],
            'status_type' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:150'],
            'experience' => ['nullable', 'string', 'max:100'],
            'job_type' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'requirement_one' => ['nullable', 'string', 'max:255'],
            'requirement_two' => ['nullable', 'string', 'max:255'],
            'requirement_three' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        CareerJob::create([
            'category' => $request->category,
            'category_label' => $request->category_label,
            'status_label' => $request->status_label ?: 'Open',
            'status_type' => $request->status_type ?: 'open',
            'title' => $request->title,
            'location' => $request->location,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirement_one' => $request->requirement_one,
            'requirement_two' => $request->requirement_two,
            'requirement_three' => $request->requirement_three,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.career-jobs.index')
            ->with('success', 'Career job created successfully.');
    }

    public function edit(CareerJob $careerJob)
    {
        return view('admin.career-jobs.edit', compact('careerJob'));
    }

    public function update(Request $request, CareerJob $careerJob)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'category_label' => ['nullable', 'string', 'max:100'],
            'status_label' => ['nullable', 'string', 'max:100'],
            'status_type' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:150'],
            'experience' => ['nullable', 'string', 'max:100'],
            'job_type' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'requirement_one' => ['nullable', 'string', 'max:255'],
            'requirement_two' => ['nullable', 'string', 'max:255'],
            'requirement_three' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $careerJob->update([
            'category' => $request->category,
            'category_label' => $request->category_label,
            'status_label' => $request->status_label ?: 'Open',
            'status_type' => $request->status_type ?: 'open',
            'title' => $request->title,
            'location' => $request->location,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirement_one' => $request->requirement_one,
            'requirement_two' => $request->requirement_two,
            'requirement_three' => $request->requirement_three,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.career-jobs.index')
            ->with('success', 'Career job updated successfully.');
    }

    public function destroy(CareerJob $careerJob)
    {
        $careerJob->delete();

        return redirect()
            ->route('admin.career-jobs.index')
            ->with('success', 'Career job deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        CareerJob::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}