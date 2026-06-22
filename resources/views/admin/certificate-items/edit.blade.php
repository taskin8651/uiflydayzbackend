@extends('layouts.admin')

@section('page-title', 'Edit Certificate Item')

@section('content')

@php
    $fileUrl = $certificateItem->getFirstMediaUrl('certificate_file');
    $fileMedia = $certificateItem->getFirstMedia('certificate_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.certificate-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Certificate Item</h2>

        <p class="admin-page-subtitle">
            Update certificate content, file and display settings
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.certificate-items.update', $certificateItem->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-certificate"></i>
                </div>

                <div>
                    <p class="form-card-title">Certificate Content</p>
                    <p class="form-card-subtitle">Category, title and description</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="category">
                        Category <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-folder icon"></i>

                        <select name="category"
                                id="category"
                                required
                                class="field-input {{ $errors->has('category') ? 'error' : '' }}">
                            <option value="quality" {{ old('category', $certificateItem->category) == 'quality' ? 'selected' : '' }}>Quality</option>
                            <option value="manufacturing" {{ old('category', $certificateItem->category) == 'manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                            <option value="laboratory" {{ old('category', $certificateItem->category) == 'laboratory' ? 'selected' : '' }}>Laboratory</option>
                            <option value="compliance" {{ old('category', $certificateItem->category) == 'compliance' ? 'selected' : '' }}>Compliance</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="category_label">
                        Category Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="category_label"
                               id="category_label"
                               value="{{ old('category_label', $certificateItem->category_label) }}"
                               placeholder="Quality Management"
                               class="field-input {{ $errors->has('category_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="code">
                        Code / Small Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-barcode icon"></i>

                        <input type="text"
                               name="code"
                               id="code"
                               value="{{ old('code', $certificateItem->code) }}"
                               placeholder="ISO Standard"
                               class="field-input {{ $errors->has('code') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('title', $certificateItem->title) }}"
                               required
                               placeholder="ISO 9001:2015"
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
                              placeholder="Quality management framework supporting consistent processes..."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('description', $certificateItem->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-upload"></i>
                </div>

                <div>
                    <p class="form-card-title">File & Display Settings</p>
                    <p class="form-card-subtitle">Update file and static icons</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">
                        Current File
                    </label>

                    @if($fileUrl)
                        <div class="form-info-box" style="margin-bottom:14px;">
                            <p>
                                <i class="fas fa-file"></i>
                                {{ $fileMedia ? $fileMedia->file_name : 'Uploaded file' }}
                            </p>

                            <a href="{{ $fileUrl }}" target="_blank" class="btn-outline" style="margin-top:10px;display:inline-flex;">
                                <i class="fas fa-external-link-alt"></i>
                                Open File
                            </a>
                        </div>
                    @else
                        <div class="assign-empty" style="margin-bottom:16px;">
                            <div class="assign-empty-icon">
                                <i class="fas fa-file"></i>
                            </div>
                            <p class="assign-empty-title">No file uploaded</p>
                            <p class="assign-empty-text">Upload a certificate file.</p>
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="file">
                        Replace File
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>

                        <input type="file"
                               name="file"
                               id="file"
                               class="field-input {{ $errors->has('file') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('file'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('file') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Upload new file only if you want to replace current file.
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="logo_icon_class">
                        Static Main Icon
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <select name="logo_icon_class"
                                id="logo_icon_class"
                                class="field-input {{ $errors->has('logo_icon_class') ? 'error' : '' }}">
                            <option value="bi bi-award" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-award' ? 'selected' : '' }}>Quality Award</option>
                            <option value="bi bi-building-check" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-building-check' ? 'selected' : '' }}>Manufacturing</option>
                            <option value="bi bi-beaker" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-beaker' ? 'selected' : '' }}>Laboratory</option>
                            <option value="bi bi-patch-check" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-patch-check' ? 'selected' : '' }}>Compliance</option>
                            <option value="bi bi-journal-check" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-journal-check' ? 'selected' : '' }}>Document</option>
                            <option value="bi bi-shield-plus" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-shield-plus' ? 'selected' : '' }}>Hygiene</option>
                            <option value="bi bi-clipboard2-pulse" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-clipboard2-pulse' ? 'selected' : '' }}>Testing</option>
                            <option value="bi bi-file-earmark-check" {{ old('logo_icon_class', $certificateItem->logo_icon_class) == 'bi bi-file-earmark-check' ? 'selected' : '' }}>File Check</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_label">
                        Status Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>

                        <input type="text"
                               name="status_label"
                               id="status_label"
                               value="{{ old('status_label', $certificateItem->status_label) }}"
                               placeholder="Listed / Document"
                               class="field-input {{ $errors->has('status_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_type">
                        Status Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>

                        <select name="status_type"
                                id="status_type"
                                class="field-input {{ $errors->has('status_type') ? 'error' : '' }}">
                            <option value="success" {{ old('status_type', $certificateItem->status_type) == 'success' ? 'selected' : '' }}>Success / Listed</option>
                            <option value="neutral" {{ old('status_type', $certificateItem->status_type) == 'neutral' ? 'selected' : '' }}>Neutral / Document</option>
                        </select>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_icon">
                        Status Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="status_icon"
                               id="status_icon"
                               value="{{ old('status_icon', $certificateItem->status_icon) }}"
                               placeholder="bi bi-check-circle-fill"
                               class="field-input {{ $errors->has('status_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_text">
                        Meta Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-info-circle icon"></i>

                        <input type="text"
                               name="meta_text"
                               id="meta_text"
                               value="{{ old('meta_text', $certificateItem->meta_text) }}"
                               placeholder="Quality / Manufacturing / Laboratory"
                               class="field-input {{ $errors->has('meta_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_icon">
                        Meta Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="meta_icon"
                               id="meta_icon"
                               value="{{ old('meta_icon', $certificateItem->meta_icon) }}"
                               placeholder="bi bi-award"
                               class="field-input {{ $errors->has('meta_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="file_type">
                        File Type Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-pdf icon"></i>

                        <input type="text"
                               name="file_type"
                               id="file_type"
                               value="{{ old('file_type', $certificateItem->file_type) }}"
                               placeholder="PDF Record"
                               class="field-input {{ $errors->has('file_type') ? 'error' : '' }}">
                    </div>
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
                               value="{{ old('sort_order', $certificateItem->sort_order) }}"
                               placeholder="1"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_featured', $certificateItem->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $certificateItem->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Featured Card
                        </span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $certificateItem->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $certificateItem->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.certificate-items.index') }}" class="btn-ghost">
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