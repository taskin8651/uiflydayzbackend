@extends('layouts.admin')

@section('page-title', 'Add FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faq-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add FAQ</h2>

        <p class="admin-page-subtitle">
            Add FAQ group, question, answer and display settings
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.faq-items.store') }}">
    @csrf

    <div class="admin-form-grid">

        {{-- FAQ GROUP --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Group</p>
                    <p class="form-card-subtitle">Group title, group key and icons</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="group_key">
                        Group Key <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-key icon"></i>

                        <select name="group_key"
                                id="group_key"
                                required
                                class="field-input {{ $errors->has('group_key') ? 'error' : '' }}">
                            <option value="size" {{ old('group_key') == 'size' ? 'selected' : '' }}>size</option>
                            <option value="comfort" {{ old('group_key') == 'comfort' ? 'selected' : '' }}>comfort</option>
                            <option value="usage" {{ old('group_key') == 'usage' ? 'selected' : '' }}>usage</option>
                            <option value="buy" {{ old('group_key') == 'buy' ? 'selected' : '' }}>buy</option>
                            <option value="general" {{ old('group_key') == 'general' ? 'selected' : '' }}>general</option>
                        </select>
                    </div>

                    @if($errors->has('group_key'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('group_key') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="group_title">
                        Group Title <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-heading icon"></i>

                        <input type="text"
                               name="group_title"
                               id="group_title"
                               value="{{ old('group_title') }}"
                               required
                               placeholder="Size Selection"
                               class="field-input {{ $errors->has('group_title') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('group_title'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('group_title') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="group_icon">
                        Group Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <select name="group_icon"
                                id="group_icon"
                                class="field-input {{ $errors->has('group_icon') ? 'error' : '' }}">
                            <option value="bi bi-rulers" {{ old('group_icon') == 'bi bi-rulers' ? 'selected' : '' }}>Size - Rulers</option>
                            <option value="bi bi-cloud-check" {{ old('group_icon') == 'bi bi-cloud-check' ? 'selected' : '' }}>Comfort - Cloud</option>
                            <option value="bi bi-droplet-half" {{ old('group_icon') == 'bi bi-droplet-half' ? 'selected' : '' }}>Usage - Droplet</option>
                            <option value="bi bi-shop" {{ old('group_icon') == 'bi bi-shop' ? 'selected' : '' }}>Buying - Shop</option>
                            <option value="bi bi-question-circle" {{ old('group_icon') == 'bi bi-question-circle' ? 'selected' : '' }}>General - Question</option>
                        </select>
                    </div>

                    <p class="field-hint">
                        <i class="fas fa-info-circle"></i>
                        Bootstrap icon class frontend par static icon ke liye use hoga.
                    </p>
                </div>

                <div class="field-group">
                    <label class="field-label" for="question_icon">
                        Question Icon Class
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-icons icon"></i>

                        <select name="question_icon"
                                id="question_icon"
                                class="field-input {{ $errors->has('question_icon') ? 'error' : '' }}">
                            <option value="bi bi-rulers" {{ old('question_icon') == 'bi bi-rulers' ? 'selected' : '' }}>Rulers</option>
                            <option value="bi bi-moon-stars" {{ old('question_icon') == 'bi bi-moon-stars' ? 'selected' : '' }}>Moon Stars</option>
                            <option value="bi bi-cloud-check" {{ old('question_icon') == 'bi bi-cloud-check' ? 'selected' : '' }}>Cloud Check</option>
                            <option value="bi bi-wind" {{ old('question_icon') == 'bi bi-wind' ? 'selected' : '' }}>Wind</option>
                            <option value="bi bi-clock" {{ old('question_icon') == 'bi bi-clock' ? 'selected' : '' }}>Clock</option>
                            <option value="bi bi-shield-plus" {{ old('question_icon') == 'bi bi-shield-plus' ? 'selected' : '' }}>Shield Plus</option>
                            <option value="bi bi-trash3" {{ old('question_icon') == 'bi bi-trash3' ? 'selected' : '' }}>Trash</option>
                            <option value="bi bi-box-seam" {{ old('question_icon') == 'bi bi-box-seam' ? 'selected' : '' }}>Box</option>
                            <option value="bi bi-shop" {{ old('question_icon') == 'bi bi-shop' ? 'selected' : '' }}>Shop</option>
                            <option value="bi bi-briefcase" {{ old('question_icon') == 'bi bi-briefcase' ? 'selected' : '' }}>Briefcase</option>
                            <option value="bi bi-question-circle" {{ old('question_icon') == 'bi bi-question-circle' ? 'selected' : '' }}>Question</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        {{-- QUESTION ANSWER --}}
        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-question-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">Question & Answer</p>
                    <p class="form-card-subtitle">FAQ question and answer content</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="question">
                        Question <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-question icon"></i>

                        <input type="text"
                               name="question"
                               id="question"
                               value="{{ old('question') }}"
                               required
                               placeholder="Which FlyDayz size should I choose?"
                               class="field-input {{ $errors->has('question') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('question'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="answer">
                        Answer <span class="req">*</span>
                    </label>

                    <textarea name="answer"
                              id="answer"
                              rows="8"
                              required
                              placeholder="Write FAQ answer here..."
                              class="field-input {{ $errors->has('answer') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('answer') }}</textarea>

                    @if($errors->has('answer'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('answer') }}
                        </p>
                    @else
                        <p class="field-hint">
                            HTML allowed. Button/link code bhi yahan add kar sakte ho.
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
                </div>

                <div class="checkbox-grid" style="grid-template-columns:1fr;">
                    <label class="role-checkbox-item {{ old('is_open') ? 'checked' : '' }}">
                        <input type="checkbox"
                               name="is_open"
                               value="1"
                               class="role-checkbox"
                               {{ old('is_open') ? 'checked' : '' }}>

                        <div class="check-icon"></div>

                        <span class="checkbox-text">
                            Open By Default
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
                        Same group key ke FAQs frontend par ek group title ke niche show honge.
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

        <a href="{{ route('admin.faq-items.index') }}" class="btn-ghost">
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