@extends('layouts.admin')

@section('page-title', 'Add Download Item')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.download-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Download Item</h2>

        <p class="admin-page-subtitle">
            Add downloadable catalogue, guide, certificate or business file
        </p>
    </div>
</div>

<form method="POST"
      action="{{ route('admin.download-items.store') }}"
      enctype="multipart/form-data">
    @csrf

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
                            <option value="catalogue" {{ old('category') == 'catalogue' ? 'selected' : '' }}>Catalogue</option>
                            <option value="product" {{ old('category') == 'product' ? 'selected' : '' }}>Product</option>
                            <option value="business" {{ old('category') == 'business' ? 'selected' : '' }}>Business</option>
                            <option value="certificate" {{ old('category') == 'certificate' ? 'selected' : '' }}>Certificate</option>
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
                            <option value="bi bi-journal-richtext" {{ old('icon_class') == 'bi bi-journal-richtext' ? 'selected' : '' }}>Catalogue Icon</option>
                            <option value="bi bi-book" {{ old('icon_class') == 'bi bi-book' ? 'selected' : '' }}>Book Icon</option>
                            <option value="bi bi-rulers" {{ old('icon_class') == 'bi bi-rulers' ? 'selected' : '' }}>Size Guide Icon</option>
                            <option value="bi bi-shield-check" {{ old('icon_class') == 'bi bi-shield-check' ? 'selected' : '' }}>Protection Icon</option>
                            <option value="bi bi-briefcase" {{ old('icon_class') == 'bi bi-briefcase' ? 'selected' : '' }}>Business Icon</option>
                            <option value="bi bi-shop-window" {{ old('icon_class') == 'bi bi-shop-window' ? 'selected' : '' }}>Retail Icon</option>
                            <option value="bi bi-patch-check-fill" {{ old('icon_class') == 'bi bi-patch-check-fill' ? 'selected' : '' }}>Certificate Icon</option>
                            <option value="bi bi-file-earmark-check" {{ old('icon_class') == 'bi bi-file-earmark-check' ? 'selected' : '' }}>Compliance Icon</option>
                        </select>
                    </div>

                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Icon upload nahi hoga, Bootstrap icon class se static icon show hoga.
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
                               value="{{ old('type') }}"
                               placeholder="Catalogue / Product Guide / Business"
                               class="field-input {{ $errors->has('type') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('type'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('type') }}
                        </p>
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
                              placeholder="Full FlyDayz range with sizes, protection categories and product highlights."
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

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-file-upload"></i>
                </div>

                <div>
                    <p class="form-card-title">File & Settings</p>
                    <p class="form-card-subtitle">Upload file and manage display meta</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="file">
                        Upload File
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
                            PDF, DOC, XLS, PPT or ZIP file allowed.
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
                               value="{{ old('file_type', 'PDF') }}"
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
                               value="{{ old('file_size') }}"
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
                               value="{{ old('meta_text') }}"
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
                               value="{{ old('meta_icon', 'bi bi-calendar3') }}"
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
                               value="{{ old('button_text', 'Download') }}"
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
                               value="{{ old('badge_text') }}"
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
                               value="{{ old('sort_order', 0) }}"
                               placeholder="1"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
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