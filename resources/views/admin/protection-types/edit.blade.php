@extends('layouts.admin')

@section('page-title', 'Edit Protection Type')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.protection-types.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Protection Type</h2>

        <p class="admin-page-subtitle">
            Update protection type content and image
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.protection-types.update', $protectionType->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                               value="{{ old('badge_text', $protectionType->badge_text) }}"
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
                               value="{{ old('title', $protectionType->title) }}"
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
                               value="{{ old('slug', $protectionType->slug) }}"
                               placeholder="straight-pads"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Description</label>
                    <textarea name="description"
                              rows="5"
                              class="field-input"
                              style="height:auto;resize:vertical;">{{ old('description', $protectionType->description) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label">Current Image</label>

                    @if($protectionType->getFirstMediaUrl('protection_type_image'))
                        <div style="border:1px solid #E2E8F0;border-radius:16px;background:#F8FAFC;padding:14px;text-align:center;margin-bottom:10px;">
                            <img src="{{ $protectionType->getFirstMediaUrl('protection_type_image') }}"
                                 alt="{{ $protectionType->title }}"
                                 style="max-width:100%;height:120px;object-fit:contain;">
                        </div>
                    @else
                        <p class="field-hint">No image uploaded.</p>
                    @endif

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
                               value="{{ old('point_one', $protectionType->point_one) }}"
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
                               value="{{ old('point_two', $protectionType->point_two) }}"
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
                               value="{{ old('point_three', $protectionType->point_three) }}"
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
                               value="{{ old('sort_order', $protectionType->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_alt', $protectionType->is_alt) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_alt"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_alt', $protectionType->is_alt) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Alternative Card Style</span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $protectionType->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $protectionType->status) ? 'checked' : '' }}>
                        <div class="check-icon"></div>
                        <span class="checkbox-text">Active</span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        New image upload karne par old image replace ho jayegi.
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