@extends('layouts.admin')

@section('page-title', 'Add Protection Type')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.protection-types.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Protection Type</h2>

        <p class="admin-page-subtitle">
            Add Straight Pads / Ultra Thin Napkins card content
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.protection-types.store') }}"
      enctype="multipart/form-data">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Protection Type Details</p>
                    <p class="form-card-subtitle">Title, slug, badge and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Badge Text</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-certificate icon"></i>
                        <input type="text"
                               name="badge_text"
                               value="{{ old('badge_text') }}"
                               placeholder="Everyday Protection"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Title <span class="req">*</span></label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               placeholder="Straight Pads"
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
                               placeholder="straight-pads"
                               class="field-input">
                    </div>
                    <p class="field-hint">Blank chhodne par slug title se auto banega.</p>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('description') }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Protection Type Image</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>
                        <input type="file"
                               name="image"
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
                    <p class="form-card-title">Points & Display</p>
                    <p class="form-card-subtitle">Card bullet points, style and status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">Point One</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="point_one"
                               value="{{ old('point_one') }}"
                               placeholder="Comfortable daily use"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Point Two</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="point_two"
                               value="{{ old('point_two') }}"
                               placeholder="Soft surface feel"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Point Three</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>
                        <input type="text"
                               name="point_three"
                               value="{{ old('point_three') }}"
                               placeholder="Reliable protection"
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
                    <label class="role-checkbox-item {{ old('is_alt') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_alt"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_alt') ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Alternative Card Style</span>
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
                        Frontend icon static rahega. Straight Pads me shield aur Ultra Thin me feather icon use hoga.
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

        <a href="{{ route('admin.protection-types.index') }}" class="btn-ghost">
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