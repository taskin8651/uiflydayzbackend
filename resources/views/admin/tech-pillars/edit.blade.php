@extends('layouts.admin')

@section('page-title', 'Edit Technology Pillar')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.tech-pillars.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Edit Technology Pillar
        </h2>

        <p class="admin-page-subtitle">
            Update technology feature card content, icon and display settings
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.tech-pillars.update', $techPillar->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">Pillar Information</p>
                    <p class="form-card-subtitle">Basic content and display details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="number">
                        Number
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-hashtag icon"></i>

                        <input type="text"
                               name="number"
                               id="number"
                               value="{{ old('number', $techPillar->number) }}"
                               placeholder="01"
                               class="field-input {{ $errors->has('number') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('number'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('number') }}
                        </p>
                    @else
                        <p class="field-hint">Example: 01, 02, 03</p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $techPillar->title) }}"
                               required
                               placeholder="Fragrance Free"
                               class="field-input {{ $errors->has('title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Designed without added fragrance for a clean and gentle experience."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('description', $techPillar->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        {{-- RIGHT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-image"></i>
                </div>

                <div>
                    <p class="form-card-title">Icon & Settings</p>
                    <p class="form-card-subtitle">Update media icon and manage status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="icon">
                        Icon Image
                    </label>

                    @if($techPillar->getFirstMediaUrl('tech_pillar_icon'))
                        <div style="margin-bottom:14px;">
                            <img src="{{ $techPillar->getFirstMediaUrl('tech_pillar_icon') }}"
                                 alt="{{ $techPillar->icon_alt ?: $techPillar->title }}"
                                 style="width:90px;height:90px;object-fit:contain;border-radius:18px;background:#F8FAFC;padding:12px;border:1px solid #E2E8F0;">
                        </div>
                    @endif

                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>

                        <input type="file"
                               name="icon"
                               id="icon"
                               accept="image/*"
                               class="field-input {{ $errors->has('icon') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload new icon only if you want to replace current image.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_alt">
                        Icon Alt Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="icon_alt"
                               id="icon_alt"
                               value="{{ old('icon_alt', $techPillar->icon_alt) }}"
                               placeholder="Fragrance Free"
                               class="field-input {{ $errors->has('icon_alt') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_alt'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_alt') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Sort Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $techPillar->sort_order) }}"
                               placeholder="1"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('sort_order'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('sort_order') }}
                        </p>
                    @endif
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_featured', $techPillar->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $techPillar->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Featured Card
                        </span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $techPillar->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $techPillar->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Current icon will remain unchanged unless you upload a new one.
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

        <a href="{{ route('admin.tech-pillars.index') }}" class="btn-ghost">
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