@extends('layouts.admin')

@section('page-title', 'Add Technology Pillar')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.tech-pillars.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            Add Technology Pillar
        </h2>

        <p class="admin-page-subtitle">
            Fill in the details to create a new technology feature card
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.tech-pillars.store') }}"
      enctype="multipart/form-data">
    @csrf

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
                               value="{{ old('number') }}"
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
                               value="{{ old('title') }}"
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
                              style="height:auto;resize:vertical;">{{ old('description') }}</textarea>

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
                    <p class="form-card-subtitle">Upload media icon and manage status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="icon">
                        Icon Image
                    </label>

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
                            Upload PNG, JPG, WEBP or SVG icon
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
                               value="{{ old('icon_alt') }}"
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
                               value="{{ old('sort_order', 0) }}"
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
                    <label class="role-checkbox-item {{ old('is_featured') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured') ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Featured Card
                        </span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', '1') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', '1') ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Icon will be stored using media library and displayed dynamically on frontend.
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