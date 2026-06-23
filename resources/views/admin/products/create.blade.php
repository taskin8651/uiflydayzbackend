@extends('layouts.admin')

@section('page-title', 'Add Product')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Product</h2>

        <p class="admin-page-subtitle">
            Add product detail, category, main image and many gallery images
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.products.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-box"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Basic Details</p>
                    <p class="form-card-subtitle">Name, slug, category and protection type</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Product Name <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="FlyDayz XL Gold"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Slug</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="slug"
                               value="{{ old('slug') }}"
                               placeholder="flydayz-xl-gold"
                               class="field-input">
                    </div>
                    <p class="field-hint">Blank chhodne par product name se auto banega.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Size Category</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-ruler icon"></i>
                        <select name="product_size_category_id" class="field-input">
                            <option value="">Select Size Category</option>
                            @foreach($sizeCategories as $id => $name)
                                <option value="{{ $id }}" {{ old('product_size_category_id') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Protection Type</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-shield-alt icon"></i>
                        <select name="protection_type_id" class="field-input">
                            <option value="">Select Protection Type</option>
                            @foreach($protectionTypes as $id => $title)
                                <option value="{{ $id }}" {{ old('protection_type_id') == $id ? 'selected' : '' }}>
                                    {{ $title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-certificate icon"></i>
                        <input type="text"
                               name="badge_text"
                               value="{{ old('badge_text') }}"
                               placeholder="Premium XL Gold"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Subtitle</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-quote-left icon"></i>
                        <input type="text"
                               name="subtitle"
                               value="{{ old('subtitle') }}"
                               placeholder="Premium Protection for Heavy Flow"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Short Description</label>
                    <textarea name="short_description"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('short_description') }}</textarea>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Images</p>
                    <p class="form-card-subtitle">Single main image and many gallery images</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Main Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>
                        <input type="file"
                               name="main_image"
                               class="field-input">
                    </div>
                    <p class="field-hint">Ye product ka main image hoga.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Gallery Images</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-images icon"></i>
                        <input type="file"
                               name="gallery_images[]"
                               class="field-input"
                               multiple>
                    </div>
                    <p class="field-hint">Multiple images select kar sakte ho.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Rating</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>
                        <select name="rating" class="field-input">
                            @foreach(['5.0','4.9','4.8','4.7','4.6','4.5','4.0','3.5','3.0'] as $rate)
                                <option value="{{ $rate }}" {{ old('rating', '5.0') == $rate ? 'selected' : '' }}>
                                    {{ $rate }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Rating Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-comment icon"></i>
                        <input type="text"
                               name="rating_text"
                               value="{{ old('rating_text') }}"
                               placeholder="4.8/5 customer rating"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Absorption Type</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>
                        <select name="absorption_type" class="field-input">
                            <option value="normal" {{ old('absorption_type') == 'normal' ? 'selected' : '' }}>normal</option>
                            <option value="heavy" {{ old('absorption_type') == 'heavy' ? 'selected' : '' }}>heavy</option>
                            <option value="very-heavy" {{ old('absorption_type') == 'very-heavy' ? 'selected' : '' }}>very-heavy</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Info Boxes</p>
                    <p class="form-card-subtitle">Size, flow and pack details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Size Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-ruler-horizontal icon"></i>
                        <input type="text"
                               name="size_text"
                               value="{{ old('size_text') }}"
                               placeholder="XL · 280 mm"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Flow Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-tint icon"></i>
                        <input type="text"
                               name="flow_text"
                               value="{{ old('flow_text') }}"
                               placeholder="Heavy Flow"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Pack Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-box-open icon"></i>
                        <input type="text"
                               name="pack_text"
                               value="{{ old('pack_text') }}"
                               placeholder="6 Pads"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Card One Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-water icon"></i>
                        <input type="text"
                               name="float_one_text"
                               value="{{ old('float_one_text') }}"
                               placeholder="3X Absorption"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Floating Card Two Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-shield-alt icon"></i>
                        <input type="text"
                               name="float_two_text"
                               value="{{ old('float_two_text') }}"
                               placeholder="Leak Guard"
                               class="field-input">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-list-check"></i>
                </div>

                <div>
                    <p class="form-card-title">Product Features</p>
                    <p class="form-card-subtitle">Feature points and display settings</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Feature One</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="feature_one"
                               value="{{ old('feature_one') }}"
                               placeholder="Cotton-soft top sheet for gentle comfort"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature Two</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="feature_two"
                               value="{{ old('feature_two') }}"
                               placeholder="Quick absorption support with gel-lock core"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature Three</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="feature_three"
                               value="{{ old('feature_three') }}"
                               placeholder="Secure wings for better fit and coverage"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Feature Four</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="feature_four"
                               value="{{ old('feature_four') }}"
                               placeholder="Designed for heavy-flow protection"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Sort Order</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Featured Product</span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', '1') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', '1') ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Main image single hai. Gallery images many/multiple upload hongi.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.products.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection

@section('scripts')
@parent
<script>
document.querySelectorAll('.role-checkbox-item input[type="checkbox"]').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        this.closest('.role-checkbox-item').classList.toggle('checked', this.checked);
    });
});
</script>
@endsection