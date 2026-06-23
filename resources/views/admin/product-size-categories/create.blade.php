@extends('layouts.admin')

@section('page-title', 'Add Product Size Category')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.product-size-categories.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Product Size Category</h2>

        <p class="admin-page-subtitle">
            Add L, XL, XXL category details
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.product-size-categories.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-ruler"></i>
                </div>

                <div>
                    <p class="form-card-title">Size Information</p>
                    <p class="form-card-subtitle">Category name, slug, size and flow</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="XL"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="slug">Slug</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-link icon"></i>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               placeholder="xl"
                               class="field-input {{ $errors->has('slug') ? 'error' : '' }}">
                    </div>

                    <p class="field-hint">Blank chhodne par slug name se auto banega.</p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="size_label">Size Label</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-arrows-alt-h icon"></i>
                        <input type="text"
                               name="size_label"
                               id="size_label"
                               value="{{ old('size_label') }}"
                               placeholder="XL-280mm"
                               class="field-input {{ $errors->has('size_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="flow_label">Flow Label</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tint icon"></i>
                        <input type="text"
                               name="flow_label"
                               id="flow_label"
                               value="{{ old('flow_label') }}"
                               placeholder="Heavy Flow"
                               class="field-input {{ $errors->has('flow_label') ? 'error' : '' }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">Absorption type, order and status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="absorption_type">
                        Absorption Type <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-layer-group icon"></i>

                        <select name="absorption_type"
                                id="absorption_type"
                                required
                                class="field-input {{ $errors->has('absorption_type') ? 'error' : '' }}">
                            <option value="normal" {{ old('absorption_type') == 'normal' ? 'selected' : '' }}>normal</option>
                            <option value="heavy" {{ old('absorption_type') == 'heavy' ? 'selected' : '' }}>heavy</option>
                            <option value="very-heavy" {{ old('absorption_type') == 'very-heavy' ? 'selected' : '' }}>very-heavy</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>
                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
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
                        Ye category frontend product size cards me show hogi.
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

        <a href="{{ route('admin.product-size-categories.index') }}" class="btn-ghost">
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