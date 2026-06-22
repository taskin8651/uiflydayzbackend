<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReviewItem;
use Illuminate\Http\Request;

class ReviewItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:review_item_access', ['only' => ['index', 'show']]);
        $this->middleware('can:review_item_create', ['only' => ['create', 'store']]);
        $this->middleware('can:review_item_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:review_item_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $reviewItems = ReviewItem::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.review-items.index', compact('reviewItems'));
    }

    public function create()
    {
        return view('admin.review-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'buyer_label' => ['nullable', 'string', 'max:100'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'message' => ['required', 'string'],
            'product_tag' => ['nullable', 'string', 'max:100'],
            'review_time' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        ReviewItem::create([
            'name' => $request->name,
            'buyer_label' => $request->buyer_label ?: 'Verified Buyer',
            'rating' => $request->rating,
            'message' => $request->message,
            'product_tag' => $request->product_tag,
            'review_time' => $request->review_time,
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.review-items.index')
            ->with('success', 'Review created successfully.');
    }

    public function edit(ReviewItem $reviewItem)
    {
        return view('admin.review-items.edit', compact('reviewItem'));
    }

    public function update(Request $request, ReviewItem $reviewItem)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'buyer_label' => ['nullable', 'string', 'max:100'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            'message' => ['required', 'string'],
            'product_tag' => ['nullable', 'string', 'max:100'],
            'review_time' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $reviewItem->update([
            'name' => $request->name,
            'buyer_label' => $request->buyer_label ?: 'Verified Buyer',
            'rating' => $request->rating,
            'message' => $request->message,
            'product_tag' => $request->product_tag,
            'review_time' => $request->review_time,
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()
            ->route('admin.review-items.index')
            ->with('success', 'Review updated successfully.');
    }

    public function destroy(ReviewItem $reviewItem)
    {
        $reviewItem->delete();

        return redirect()
            ->route('admin.review-items.index')
            ->with('success', 'Review deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        ReviewItem::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}