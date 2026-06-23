<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSizeCategory;
use App\Models\ProtectionType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:product_access', ['only' => ['index']]);
        $this->middleware('can:product_create', ['only' => ['create', 'store']]);
        $this->middleware('can:product_edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:product_delete', ['only' => ['destroy', 'massDestroy']]);
    }

    public function index()
    {
        $products = Product::with(['sizeCategory', 'protectionType'])
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $sizeCategories = ProductSizeCategory::where('status', true)
            ->orderBy('sort_order')
            ->pluck('name', 'id');

        $protectionTypes = ProtectionType::where('status', true)
            ->orderBy('sort_order')
            ->pluck('title', 'id');

        return view('admin.products.create', compact('sizeCategories', 'protectionTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_size_category_id' => ['nullable', 'exists:product_size_categories,id'],
            'protection_type_id' => ['nullable', 'exists:protection_types,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'badge_text' => ['nullable', 'string', 'max:150'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'rating' => ['nullable', 'numeric', 'min:1', 'max:5'],
            'rating_text' => ['nullable', 'string', 'max:150'],
            'size_text' => ['nullable', 'string', 'max:100'],
            'flow_text' => ['nullable', 'string', 'max:100'],
            'pack_text' => ['nullable', 'string', 'max:100'],
            'feature_one' => ['nullable', 'string', 'max:255'],
            'feature_two' => ['nullable', 'string', 'max:255'],
            'feature_three' => ['nullable', 'string', 'max:255'],
            'feature_four' => ['nullable', 'string', 'max:255'],
            'float_one_text' => ['nullable', 'string', 'max:100'],
            'float_two_text' => ['nullable', 'string', 'max:100'],
            'absorption_type' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],

            'main_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
        ]);

        $product = Product::create([
            'product_size_category_id' => $request->product_size_category_id,
            'protection_type_id' => $request->protection_type_id,
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'badge_text' => $request->badge_text,
            'subtitle' => $request->subtitle,
            'short_description' => $request->short_description,
            'rating' => $request->rating ?: 5.0,
            'rating_text' => $request->rating_text,
            'size_text' => $request->size_text,
            'flow_text' => $request->flow_text,
            'pack_text' => $request->pack_text,
            'feature_one' => $request->feature_one,
            'feature_two' => $request->feature_two,
            'feature_three' => $request->feature_three,
            'feature_four' => $request->feature_four,
            'float_one_text' => $request->float_one_text,
            'float_two_text' => $request->float_two_text,
            'absorption_type' => $request->absorption_type,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('main_image')) {
            $product->addMediaFromRequest('main_image')
                ->toMediaCollection('product_main_image');
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $product->addMedia($galleryImage)
                    ->toMediaCollection('product_gallery');
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::with(['sizeCategory', 'protectionType', 'media'])->findOrFail($id);

        $sizeCategories = ProductSizeCategory::where('status', true)
            ->orderBy('sort_order')
            ->pluck('name', 'id');

        $protectionTypes = ProtectionType::where('status', true)
            ->orderBy('sort_order')
            ->pluck('title', 'id');

        return view('admin.products.edit', compact('product', 'sizeCategories', 'protectionTypes'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_size_category_id' => ['nullable', 'exists:product_size_categories,id'],
            'protection_type_id' => ['nullable', 'exists:protection_types,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'badge_text' => ['nullable', 'string', 'max:150'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'rating' => ['nullable', 'numeric', 'min:1', 'max:5'],
            'rating_text' => ['nullable', 'string', 'max:150'],
            'size_text' => ['nullable', 'string', 'max:100'],
            'flow_text' => ['nullable', 'string', 'max:100'],
            'pack_text' => ['nullable', 'string', 'max:100'],
            'feature_one' => ['nullable', 'string', 'max:255'],
            'feature_two' => ['nullable', 'string', 'max:255'],
            'feature_three' => ['nullable', 'string', 'max:255'],
            'feature_four' => ['nullable', 'string', 'max:255'],
            'float_one_text' => ['nullable', 'string', 'max:100'],
            'float_two_text' => ['nullable', 'string', 'max:100'],
            'absorption_type' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],

            'main_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:4096'],
            'remove_gallery_images' => ['nullable', 'array'],
            'remove_gallery_images.*' => ['nullable', 'integer'],
        ]);

        $product->update([
            'product_size_category_id' => $request->product_size_category_id,
            'protection_type_id' => $request->protection_type_id,
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
            'badge_text' => $request->badge_text,
            'subtitle' => $request->subtitle,
            'short_description' => $request->short_description,
            'rating' => $request->rating ?: 5.0,
            'rating_text' => $request->rating_text,
            'size_text' => $request->size_text,
            'flow_text' => $request->flow_text,
            'pack_text' => $request->pack_text,
            'feature_one' => $request->feature_one,
            'feature_two' => $request->feature_two,
            'feature_three' => $request->feature_three,
            'feature_four' => $request->feature_four,
            'float_one_text' => $request->float_one_text,
            'float_two_text' => $request->float_two_text,
            'absorption_type' => $request->absorption_type,
            'is_featured' => $request->boolean('is_featured'),
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        if ($request->hasFile('main_image')) {
            $product->addMediaFromRequest('main_image')
                ->toMediaCollection('product_main_image');
        }

        if ($request->filled('remove_gallery_images')) {
            Media::whereIn('id', $request->remove_gallery_images)
                ->where('model_type', Product::class)
                ->where('model_id', $product->id)
                ->delete();
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $product->addMedia($galleryImage)
                    ->toMediaCollection('product_gallery');
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}