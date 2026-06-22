@extends('layouts.admin')

@section('page-title', 'Edit Career Job')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.career-jobs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit Career Job</h2>

        <p class="admin-page-subtitle">
            Update job role, requirements and opening status
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.career-jobs.update', $careerJob->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-briefcase"></i>
                </div>

                <div>
                    <p class="form-card-title">Job Information</p>
                    <p class="form-card-subtitle">Role category, title and basic details</p>
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
                            <option value="sales" {{ old('category', $careerJob->category) == 'sales' ? 'selected' : '' }}>Sales</option>
                            <option value="marketing" {{ old('category', $careerJob->category) == 'marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="operations" {{ old('category', $careerJob->category) == 'operations' ? 'selected' : '' }}>Operations</option>
                            <option value="quality" {{ old('category', $careerJob->category) == 'quality' ? 'selected' : '' }}>Quality</option>
                            <option value="support" {{ old('category', $careerJob->category) == 'support' ? 'selected' : '' }}>Support</option>
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
                    <label class="field-label" for="category_label">
                        Category Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="category_label"
                               id="category_label"
                               value="{{ old('category_label', $careerJob->category_label) }}"
                               placeholder="Sales"
                               class="field-input {{ $errors->has('category_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">
                        Job Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="title"
                               id="title"
                               value="{{ old('title', $careerJob->title) }}"
                               required
                               placeholder="Area Sales Manager"
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
                    <label class="field-label" for="location">
                        Location
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-map-marker-alt icon"></i>

                        <input type="text"
                               name="location"
                               id="location"
                               value="{{ old('location', $careerJob->location) }}"
                               placeholder="Bihar / Jharkhand"
                               class="field-input {{ $errors->has('location') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="experience">
                        Experience
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user-tie icon"></i>

                        <input type="text"
                               name="experience"
                               id="experience"
                               value="{{ old('experience', $careerJob->experience) }}"
                               placeholder="3–6 Years"
                               class="field-input {{ $errors->has('experience') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="job_type">
                        Job Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>

                        <input type="text"
                               name="job_type"
                               id="job_type"
                               value="{{ old('job_type', $careerJob->job_type) }}"
                               placeholder="Full Time"
                               class="field-input {{ $errors->has('job_type') ? 'error' : '' }}">
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
                    <p class="form-card-title">Description & Requirements</p>
                    <p class="form-card-subtitle">Job summary and key requirements</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="description">
                        Description
                    </label>

                    <textarea name="description"
                              id="description"
                              rows="5"
                              placeholder="Lead distributor development, retail expansion and regional sales growth."
                              class="field-input {{ $errors->has('description') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('description', $careerJob->description) }}</textarea>

                    @if($errors->has('description'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="requirement_one">
                        Requirement One
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="requirement_one"
                               id="requirement_one"
                               value="{{ old('requirement_one', $careerJob->requirement_one) }}"
                               placeholder="Channel sales experience"
                               class="field-input {{ $errors->has('requirement_one') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="requirement_two">
                        Requirement Two
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="requirement_two"
                               id="requirement_two"
                               value="{{ old('requirement_two', $careerJob->requirement_two) }}"
                               placeholder="Distributor relationship management"
                               class="field-input {{ $errors->has('requirement_two') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="requirement_three">
                        Requirement Three
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check icon"></i>

                        <input type="text"
                               name="requirement_three"
                               id="requirement_three"
                               value="{{ old('requirement_three', $careerJob->requirement_three) }}"
                               placeholder="Field team coordination"
                               class="field-input {{ $errors->has('requirement_three') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_label">
                        Opening Status Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-bolt icon"></i>

                        <input type="text"
                               name="status_label"
                               id="status_label"
                               value="{{ old('status_label', $careerJob->status_label) }}"
                               placeholder="Open / Urgent / Internship"
                               class="field-input {{ $errors->has('status_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="status_type">
                        Opening Status Type
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-toggle-on icon"></i>

                        <select name="status_type"
                                id="status_type"
                                class="field-input {{ $errors->has('status_type') ? 'error' : '' }}">
                            <option value="open" {{ old('status_type', $careerJob->status_type) == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="urgent" {{ old('status_type', $careerJob->status_type) == 'urgent' ? 'selected' : '' }}>Urgent</option>
                            <option value="intern" {{ old('status_type', $careerJob->status_type) == 'intern' ? 'selected' : '' }}>Internship</option>
                        </select>
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
                               value="{{ old('sort_order', $careerJob->sort_order) }}"
                               placeholder="1"
                               class="field-input {{ $errors->has('sort_order') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_featured', $careerJob->is_featured) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_featured"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_featured', $careerJob->is_featured) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Featured Card
                        </span>
                    </label>

                    <label class="role-checkbox-item {{ old('status', $careerJob->status) ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               class="role-checkbox"
                               {{ old('status', $careerJob->status) ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Active
                        </span>
                    </label>
                </div>

                <div class="form-info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Frontend par icon aur Apply button static rahenge. Content admin se dynamic hoga.
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

        <a href="{{ route('admin.career-jobs.index') }}" class="btn-ghost">
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