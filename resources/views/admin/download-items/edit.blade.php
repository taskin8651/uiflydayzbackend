@extends('layouts.admin')

@section('page-title', 'Edit Download Item')

@section('content')

@php
    $fileUrl = $downloadItem->getFirstMediaUrl('download_file');
    $fileMedia = $downloadItem->getFirstMedia('download_file');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.download-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Download Item</h2>

        <p class="admin-page-subtitle">
            Update downloadable file card content and settings
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.download-items.update', $downloadItem->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-download"></i>
                </div>

                <div>
                    <p class="form-card-title">Download Content</p>
                    <p class="form-card-subtitle">Card title, category and description</p>
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
                            <option value="catalogue" {{ old('category', $downloadItem->category) == 'catalogue' ? 'selected' : '' }}>Catalogue</option>
                            <option value="product" {{ old('category', $downloadItem->category) == 'product' ? 'selected' : '' }}>Product</option>
                            <option value="business" {{ old('category', $downloadItem->category) == 'business' ? 'selected' : '' }}>Business</option>
                            <option value="certificate" {{ old('category', $downloadItem->category) == 'certificate' ? 'selected' : '' }}>Certificate</option>
                        </select>
                    </div>

                    @if($errors->has('category'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">
                        Static Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <select name="icon_class"
                                id="icon_class"
                                class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                            <option value="bi bi-journal-richtext" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-journal-richtext' ? 'selected' : '' }}>Catalogue Icon</option>
                            <option value="bi bi-book" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-book' ? 'selected' : '' }}>Book Icon</option>
                            <option value="bi bi-rulers" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-rulers' ? 'selected' : '' }}>Size Guide Icon</option>
                            <option value="bi bi-shield-check" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-shield-check' ? 'selected' : '' }}>Protection Icon</option>
                            <option value="bi bi-briefcase" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-briefcase' ? 'selected' : '' }}>Business Icon</option>
                            <option value="bi bi-shop-window" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-shop-window' ? 'selected' : '' }}>Retail Icon</option>
                            <option value="bi bi-patch-check-fill" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-patch-check-fill' ? 'selected' : '' }}>Certificate Icon</option>
                            <option value="bi bi-file-earmark-check" {{ old('icon_class', $downloadItem->icon_class) == 'bi bi-file-earmark-check' ? 'selected' : '' }}>Compliance Icon</option>
                        </select>
                    </div>

                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Icon static Bootstrap class se show hoga.
                    </p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="type">
                        Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="type"
                               id="type"
                               value="{{ old('type', $downloadItem->type) }}"
                               placeholder="Catalogue / Product Guide / Business"
                               class="field-input {{ $errors->has('type') ? 'error' : '' }}">
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
                               value="{{ old('title', $downloadItem->title) }}"
                               required
                               placeholder="Complete Product Catalogue"
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
                              placeholder="Full FlyDayz range with sizes..."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('description', $downloadItem->description) }}</textarea>

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
                    <p class="form-card-title">File & Settings</p>
                    <p class="form-card-subtitle">Update file and display meta</p>
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
                            <p class="assign-empty-text">Upload a downloadable file.</p>
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
                    <label class="field-label" for="file_type">
                        File Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-file-pdf icon"></i>

                        <input type="text"
                               name="file_type"
                               id="file_type"
                               value="{{ old('file_type', $downloadItem->file_type) }}"
                               placeholder="PDF"
                               class="field-input {{ $errors->has('file_type') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="file_size">
                        File Size
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-hdd icon"></i>

                        <input type="text"
                               name="file_size"
                               id="file_size"
                               value="{{ old('file_size', $downloadItem->file_size) }}"
                               placeholder="8.4 MB"
                               class="field-input {{ $errors->has('file_size') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_text">
                        Third Meta Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-info-circle icon"></i>

                        <input type="text"
                               name="meta_text"
                               id="meta_text"
                               value="{{ old('meta_text', $downloadItem->meta_text) }}"
                               placeholder="2026 / B2B / Verified"
                               class="field-input {{ $errors->has('meta_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="meta_icon">
                        Third Meta Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="meta_icon"
                               id="meta_icon"
                               value="{{ old('meta_icon', $downloadItem->meta_icon) }}"
                               placeholder="bi bi-calendar3"
                               class="field-input {{ $errors->has('meta_icon') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="button_text">
                        Button Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-mouse-pointer icon"></i>

                        <input type="text"
                               name="button_text"
                               id="button_text"
                               value="{{ old('button_text', $downloadItem->button_text) }}"
                               placeholder="Download Catalogue"
                               class="field-input {{ $errors->has('button_text') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="badge_text">
                        Badge Text
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-certificate icon"></i>

                        <input type="text"
                               name="badge_text"
                               id="badge_text"
                               value="{{ old('badge_text', $downloadItem->badge_text) }}"
                               placeholder="Most Downloaded"
                               class="field-input {{ $errors->has('badge_text') ? 'error' : '' }}">
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
                               value="{{ old('sort_order', $downloadItem->sort_order) }}"
                               placeholder="1"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_featured', $downloadItem->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $downloadItem->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Featured Card
                        </span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $downloadItem->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $downloadItem->status) ? 'checked' : '' }}>

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

        <a href="{{ route('admin.download-items.index') }}" class="btn-ghost">
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