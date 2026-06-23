@extends('layouts.admin')

@section('page-title', $section->exists ? 'Edit Privacy Section' : 'Add Privacy Section')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.privacy-policy-sections.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">
            {{ $section->exists ? 'Edit' : 'Add' }} Privacy Section
        </h2>

        <p class="admin-page-subtitle">
            Use the visual editor below; no HTML or client code is needed.
        </p>
    </div>
</div>

<form method="POST"
      action="{{ $section->exists ? route('admin.privacy-policy-sections.update', $section) : route('admin.privacy-policy-sections.store') }}">

    @csrf

    @if($section->exists)
        @method('PUT')
    @endif

    <div class="admin-form-grid">

        {{-- MAIN CONTENT --}}
        <div class="form-card">

            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>

                <div>
                    <p class="form-card-title">Privacy Section Content</p>
                    <p class="form-card-subtitle">
                        Add title, subtitle, icon and full content for privacy policy page
                    </p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $section->title) }}"
                               required
                               placeholder="Information We Collect"
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
                    <label class="field-label" for="subtitle">
                        Subtitle
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-align-left icon"></i>

                        <input type="text"
                               name="subtitle"
                               id="subtitle"
                               value="{{ old('subtitle', $section->subtitle) }}"
                               placeholder="How we collect and use your information"
                               class="field-input {{ $errors->has('subtitle') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('subtitle'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('subtitle') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="icon_class">
                        Bootstrap Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <input type="text"
                               name="icon_class"
                               id="icon_class"
                               value="{{ old('icon_class', $section->icon_class) }}"
                               placeholder="bi bi-shield-check"
                               class="field-input {{ $errors->has('icon_class') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('icon_class'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('icon_class') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Example: bi bi-shield-check, bi bi-lock-fill, bi bi-file-earmark-text
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="content">
                        Content <span class="req">*</span>
                    </label>

                    <textarea name="content"
                              id="content"
                              rows="12"
                              required
                              placeholder="Write privacy policy section content here..."
                              class="field-input {{ $errors->has('content') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('content', $section->content) }}</textarea>

                    @if($errors->has('content'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('content') }}
                        </p>
                    @else
                        <p class="field-hint">
                            Use headings, paragraphs, bold text and lists from the editor toolbar.
                        </p>
                    @endif
                </div>

            </div>
        </div>


        {{-- DISPLAY SETTINGS --}}
        <div class="form-card">

            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">
                        Manage order and publish status
                    </p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">
                        Display Order
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-down icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $section->sort_order ?? 0) }}"
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
                    <label class="role-checkbox-item {{ old('status', $section->status ?? true) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $section->status ?? true) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Published
                        </span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Published section public Privacy Policy page par show hoga. Unpublished section hide rahega.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            Save Section
        </button>

        <a href="{{ route('admin.privacy-policy-sections.index') }}" class="btn-ghost">
            Cancel
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
ClassicEditor.create(document.querySelector('#content')).catch(function (error) { console.error(error); });
</script>

@endsection
