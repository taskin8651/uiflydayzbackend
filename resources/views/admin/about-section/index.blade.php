@extends('layouts.admin')

@section('page-title', 'About Section')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">
            About Section
        </h2>

        <p class="admin-page-subtitle">
            Update about section image, title and descriptions
        </p>
    </div>
</div>

@if(session('success'))
    <div class="form-info-box" style="margin-bottom:18px;">
        <p>
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </p>
    </div>
@endif

<form method="POST"
      action="{{ route('admin.about-section.update') }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        {{-- LEFT CARD --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <div>
                    <p class="form-card-title">About Content</p>
                    <p class="form-card-subtitle">Main title and description text</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="title">
                        Title
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $aboutSection->title) }}"
                               placeholder="Comfort Made Personal. Protection Made Powerful."
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
                    <label class="field-label" for="short_description">
                        Short Description
                    </label>

                    <textarea name="short_description"
                              id="short_description"
                              rows="5"
                              placeholder="Short about content..."
                              class="field-input {{ $errors->has('short_description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('short_description', $aboutSection->short_description) }}</textarea>

                    @if($errors->has('short_description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('short_description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="6"
                              placeholder="Detailed about description..."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('description', $aboutSection->description) }}</textarea>

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
                    <p class="form-card-title">About Image</p>
                    <p class="form-card-subtitle">Upload product or section image</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label">
                        Current Image
                    </label>

                    @if($aboutSection->getFirstMediaUrl('about_section_image'))
                        <div style="border:1px solid #E2E8F0;border-radius:22px;background:#F8FAFC;padding:20px;text-align:center;margin-bottom:16px;">
                            <img src="{{ $aboutSection->getFirstMediaUrl('about_section_image') }}"
                                 alt="{{ $aboutSection->title }}"
                                 style="max-width:100%;height:260px;object-fit:contain;">
                        </div>
                    @else
                        <div class="assign-empty" style="margin-bottom:16px;">
                            <div class="assign-empty-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <p class="assign-empty-title">No image uploaded</p>
                            <p class="assign-empty-text">Upload an image for the about section.</p>
                        </div>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="image">
                        Upload New Image
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-upload icon"></i>

                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="field-input {{ $errors->has('image') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('image'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('image') }}
                        </p>
                    @else
                        <p class="field-hint">
                            <i class="fas fa-info-circle"></i>
                            Upload JPG, PNG, WEBP or SVG. Old image will be replaced.
                        </p>
                    @endif
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        This is a single-record section. You can update the same about content anytime from here.
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        @can('about_section_edit')
            <button type="submit" class="btn-primary">
                <i class="fas fa-check"></i>
                {{ trans('global.save') }}
            </button>
        @endcan

        <a href="{{ route('admin.home') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection