<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadItem;
use Illuminate\Http\Request;

class DownloadItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:download_item_access', ['only' => ['index', 'show']]);
        $this->middleware('can:download_item_create', ['only' => ['create', 'store']]);
        $this->middleware('can:download_item_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:download_item_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $downloadItems = DownloadItem::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.download-items.index', compact('downloadItems'));
    }

    public function create()
    {
        return view('admin.download-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:50'],
            'icon_class' => ['nullable', 'string', 'max:100'],
            'type' => ['nullable', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file_type' => ['nullable', 'string', 'max:20'],
            'file_size' => ['nullable', 'string', 'max:50'],
            'meta_icon' => ['nullable', 'string', 'max:100'],
            'meta_text' => ['nullable', 'string', 'max:100'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip', 'max:10240'],
        ]);

        $downloadItem = DownloadItem::create([
            'category' => $request->category,
            'icon_class' => $request->icon_class ?: 'bi bi-journal-richtext',
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'file_type' => $request->file_type ?: 'PDF',
            'file_size' => $request->file_size,
            'meta_icon' => $request->meta_icon,
            'meta_text' => $request->meta_text,
            'button_text' => $request->button_text ?: 'Download',
            'badge_text' => $request->badge_text,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('file')) {
            $downloadItem
                ->addMediaFromRequest('file')
                ->toMediaCollection('download_file');
        }

        return redirect()
            ->route('admin.download-items.index')
            ->with('success', 'Download item created successfully.');
    }

    public function edit(DownloadItem $downloadItem)
    {
        return view('admin.download-items.edit', compact('downloadItem'));
    }

    public function update(Request $request, DownloadItem $downloadItem)
    {
        $request->validate([
            'category' => ['required', 'string', 'max:50'],
            'icon_class' => ['nullable', 'string', 'max:100'],
            'type' => ['nullable', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file_type' => ['nullable', 'string', 'max:20'],
            'file_size' => ['nullable', 'string', 'max:50'],
            'meta_icon' => ['nullable', 'string', 'max:100'],
            'meta_text' => ['nullable', 'string', 'max:100'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip', 'max:10240'],
        ]);

        $downloadItem->update([
            'category' => $request->category,
            'icon_class' => $request->icon_class ?: 'bi bi-journal-richtext',
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'file_type' => $request->file_type ?: 'PDF',
            'file_size' => $request->file_size,
            'meta_icon' => $request->meta_icon,
            'meta_text' => $request->meta_text,
            'button_text' => $request->button_text ?: 'Download',
            'badge_text' => $request->badge_text,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('file')) {
            $downloadItem
                ->addMediaFromRequest('file')
                ->toMediaCollection('download_file');
        }

        return redirect()
            ->route('admin.download-items.index')
            ->with('success', 'Download item updated successfully.');
    }

    public function destroy(DownloadItem $downloadItem)
    {
        $downloadItem->delete();

        return redirect()
            ->route('admin.download-items.index')
            ->with('success', 'Download item deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        DownloadItem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}