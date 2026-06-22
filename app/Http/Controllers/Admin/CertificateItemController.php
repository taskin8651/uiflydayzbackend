<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateItem;
use Illuminate\Http\Request;

class CertificateItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:certificate_item_access', ['only' => ['index', 'show']]);
        $this->middleware('can:certificate_item_create', ['only' => ['create', 'store']]);
        $this->middleware('can:certificate_item_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:certificate_item_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $certificateItems = CertificateItem::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.certificate-items.index', compact('certificateItems'));
    }

    public function create()
    {
        return view('admin.certificate-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'category_label' => ['nullable', 'string', 'max:150'],
            'status_label' => ['nullable', 'string', 'max:100'],
            'status_icon' => ['nullable', 'string', 'max:100'],
            'status_type' => ['nullable', 'string', 'max:50'],
            'logo_icon_class' => ['nullable', 'string', 'max:100'],
            'code' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'meta_icon' => ['nullable', 'string', 'max:100'],
            'meta_text' => ['nullable', 'string', 'max:100'],
            'file_type' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $certificateItem = CertificateItem::create([
            'category' => $request->category,
            'category_label' => $request->category_label,
            'status_label' => $request->status_label ?: 'Listed',
            'status_icon' => $request->status_icon ?: 'bi bi-check-circle-fill',
            'status_type' => $request->status_type ?: 'success',
            'logo_icon_class' => $request->logo_icon_class ?: 'bi bi-journal-check',
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'meta_icon' => $request->meta_icon,
            'meta_text' => $request->meta_text,
            'file_type' => $request->file_type ?: 'PDF Record',
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('file')) {
            $certificateItem
                ->addMediaFromRequest('file')
                ->toMediaCollection('certificate_file');
        }

        return redirect()
            ->route('admin.certificate-items.index')
            ->with('success', 'Certificate item created successfully.');
    }

    public function edit(CertificateItem $certificateItem)
    {
        return view('admin.certificate-items.edit', compact('certificateItem'));
    }

    public function update(Request $request, CertificateItem $certificateItem)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'category_label' => ['nullable', 'string', 'max:150'],
            'status_label' => ['nullable', 'string', 'max:100'],
            'status_icon' => ['nullable', 'string', 'max:100'],
            'status_type' => ['nullable', 'string', 'max:50'],
            'logo_icon_class' => ['nullable', 'string', 'max:100'],
            'code' => ['nullable', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'meta_icon' => ['nullable', 'string', 'max:100'],
            'meta_text' => ['nullable', 'string', 'max:100'],
            'file_type' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,jpg,jpeg,png,webp', 'max:10240'],
        ]);

        $certificateItem->update([
            'category' => $request->category,
            'category_label' => $request->category_label,
            'status_label' => $request->status_label ?: 'Listed',
            'status_icon' => $request->status_icon ?: 'bi bi-check-circle-fill',
            'status_type' => $request->status_type ?: 'success',
            'logo_icon_class' => $request->logo_icon_class ?: 'bi bi-journal-check',
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'meta_icon' => $request->meta_icon,
            'meta_text' => $request->meta_text,
            'file_type' => $request->file_type ?: 'PDF Record',
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('file')) {
            $certificateItem
                ->addMediaFromRequest('file')
                ->toMediaCollection('certificate_file');
        }

        return redirect()
            ->route('admin.certificate-items.index')
            ->with('success', 'Certificate item updated successfully.');
    }

    public function destroy(CertificateItem $certificateItem)
    {
        $certificateItem->delete();

        return redirect()
            ->route('admin.certificate-items.index')
            ->with('success', 'Certificate item deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        CertificateItem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}