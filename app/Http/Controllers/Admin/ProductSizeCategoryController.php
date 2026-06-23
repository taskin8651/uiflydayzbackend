<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSizeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSizeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:product_size_category_access', ['only' => ['index']]);
        $this->middleware('can:product_size_category_create', ['only' => ['create', 'store']]);
        $this->middleware('can:product_size_category_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:product_size_category_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $productSizeCategories = ProductSizeCategory::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.product-size-categories.index', compact('productSizeCategories'));
    }

    public function create()
    {
        return view('admin.product-size-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', 'unique:product_size_categories,slug'],
            'size_label' => ['nullable', 'string', 'max:100'],
            'flow_label' => ['nullable', 'string', 'max:100'],
            'absorption_type' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        ProductSizeCategory::create([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'size_label' => $request->size_label,
            'flow_label' => $request->flow_label,
            'absorption_type' => $request->absorption_type,
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.product-size-categories.index')
            ->with('success', 'Product size category created successfully.');
    }

    public function edit($id)
    {
        $productSizeCategory = ProductSizeCategory::findOrFail($id);

        return view('admin.product-size-categories.edit', compact('productSizeCategory'));
    }

    public function update(Request $request, $id)
    {
        $productSizeCategory = ProductSizeCategory::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['nullable', 'string', 'max:120', 'unique:product_size_categories,slug,' . $productSizeCategory->id],
            'size_label' => ['nullable', 'string', 'max:100'],
            'flow_label' => ['nullable', 'string', 'max:100'],
            'absorption_type' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $productSizeCategory->update([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'size_label' => $request->size_label,
            'flow_label' => $request->flow_label,
            'absorption_type' => $request->absorption_type,
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.product-size-categories.index')
            ->with('success', 'Product size category updated successfully.');
    }

    public function destroy($id)
    {
        ProductSizeCategory::findOrFail($id)->delete();

        return redirect()->route('admin.product-size-categories.index')
            ->with('success', 'Product size category deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        ProductSizeCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}