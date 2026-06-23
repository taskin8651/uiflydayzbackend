<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:faq_item_access', ['only' => ['index', 'show']]);
        $this->middleware('can:faq_item_create', ['only' => ['create', 'store']]);
        $this->middleware('can:faq_item_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:faq_item_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $faqItems = FaqItem::query()
            ->orderBy('group_key')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.faq-items.index', compact('faqItems'));
    }

    public function create()
    {
        return view('admin.faq-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_key' => ['required', 'string', 'max:100'],
            'group_title' => ['required', 'string', 'max:150'],
            'group_icon' => ['nullable', 'string', 'max:100'],
            'question_icon' => ['nullable', 'string', 'max:100'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        FaqItem::create([
            'group_key' => $request->group_key,
            'group_title' => $request->group_title,
            'group_icon' => $request->group_icon ?: 'bi bi-question-circle',
            'question_icon' => $request->question_icon ?: 'bi bi-question-circle',
            'question' => $request->question,
            'answer' => $request->answer,
            'is_open' => $request->boolean('is_open'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function edit(FaqItem $faqItem)
    {
        return view('admin.faq-items.edit', compact('faqItem'));
    }

    public function update(Request $request, FaqItem $faqItem)
    {
        $request->validate([
            'group_key' => ['required', 'string', 'max:100'],
            'group_title' => ['required', 'string', 'max:150'],
            'group_icon' => ['nullable', 'string', 'max:100'],
            'question_icon' => ['nullable', 'string', 'max:100'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $faqItem->update([
            'group_key' => $request->group_key,
            'group_title' => $request->group_title,
            'group_icon' => $request->group_icon ?: 'bi bi-question-circle',
            'question_icon' => $request->question_icon ?: 'bi bi-question-circle',
            'question' => $request->question,
            'answer' => $request->answer,
            'is_open' => $request->boolean('is_open'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();

        return redirect()
            ->route('admin.faq-items.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        FaqItem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}