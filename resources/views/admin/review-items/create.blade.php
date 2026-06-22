@extends('layouts.admin')

@section('page-title', 'Add Review')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.review-items.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Add Review</h2>

        <p class="admin-page-subtitle">
            Add customer review, rating and product experience
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.review-items.store') }}">
    @csrf

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>
                    <p class="form-card-title">Review Information</p>
                    <p class="form-card-subtitle">Customer name, rating and message</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="name">
                        Customer Name <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-user icon"></i>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Anjali Sharma"
                               class="field-input {{ $errors->has('name') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('name'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="buyer_label">
                        Buyer Label
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-check-circle icon"></i>

                        <input type="text"
                               name="buyer_label"
                               id="buyer_label"
                               value="{{ old('buyer_label', 'Verified Buyer') }}"
                               placeholder="Verified Buyer"
                               class="field-input {{ $errors->has('buyer_label') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="rating">
                        Rating <span class="req">*</span>
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-star icon"></i>

                        <select name="rating"
                                id="rating"
                                required
                                class="field-input {{ $errors->has('rating') ? 'error' : '' }}">
                            <option value="5.0" {{ old('rating') == '5.0' ? 'selected' : '' }}>5.0 Stars</option>
                            <option value="4.5" {{ old('rating') == '4.5' ? 'selected' : '' }}>4.5 Stars</option>
                            <option value="4.0" {{ old('rating') == '4.0' ? 'selected' : '' }}>4.0 Stars</option>
                            <option value="3.5" {{ old('rating') == '3.5' ? 'selected' : '' }}>3.5 Stars</option>
                            <option value="3.0" {{ old('rating') == '3.0' ? 'selected' : '' }}>3.0 Stars</option>
                            <option value="2.5" {{ old('rating') == '2.5' ? 'selected' : '' }}>2.5 Stars</option>
                            <option value="2.0" {{ old('rating') == '2.0' ? 'selected' : '' }}>2.0 Stars</option>
                            <option value="1.5" {{ old('rating') == '1.5' ? 'selected' : '' }}>1.5 Stars</option>
                            <option value="1.0" {{ old('rating') == '1.0' ? 'selected' : '' }}>1.0 Star</option>
                        </select>
                    </div>

                    @if($errors->has('rating'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('rating') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="message">
                        Review Message <span class="req">*</span>
                    </label>

                    <textarea name="message"
                              id="message"
                              rows="6"
                              required
                              placeholder="Super soft and comfortable..."
                              class="field-input {{ $errors->has('message') ? 'error' : '' }}"
                              style="height:auto;resize:vertical;">{{ old('message') }}</textarea>

                    @if($errors->has('message'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('message') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">Display Settings</p>
                    <p class="form-card-subtitle">Product tag, time and status</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="product_tag">
                        Product Tag
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-tag icon"></i>

                        <input type="text"
                               name="product_tag"
                               id="product_tag"
                               value="{{ old('product_tag') }}"
                               placeholder="Regular / Cotton Soft / XL"
                               class="field-input {{ $errors->has('product_tag') ? 'error' : '' }}">
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="review_time">
                        Review Time
                    </label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-clock icon"></i>

                        <input type="text"
                               name="review_time"
                               id="review_time"
                               value="{{ old('review_time') }}"
                               placeholder="2 weeks ago"
                               class="field-input {{ $errors->has('review_time') ? 'error' : '' }}">
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
                        Avatar frontend par customer name ke first letter se auto generate hoga.
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

        <a href="{{ route('admin.review-items.index') }}" class="btn-ghost">
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