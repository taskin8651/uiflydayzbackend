@extends('layouts.admin')

@section('page-title', 'Review Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Review Items</h2>
        <p class="admin-page-subtitle">
            Manage customer reviews, ratings and product tags
        </p>
    </div>

    @can('review_item_create')
        <a href="{{ route('admin.review-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Review
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Reviews</p>
        <p class="stat-value">{{ $reviewItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $reviewItems->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $reviewItems->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">5 Star Reviews</p>
        <p class="stat-value">{{ $reviewItems->where('rating', '5.0')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Reviews</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ReviewItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Product Tag</th>
                    <th>Review Time</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($reviewItems as $review)
                    <tr data-entry-id="{{ $review->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $review->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $colors = ['#4F46E5','#0EA5E9','#10B981','#F59E0B','#EF4444','#8B5CF6','#EC4899','#14B8A6'];
                                    $color  = $colors[$review->id % count($colors)];
                                @endphp

                                <div class="avatar-circle" style="background: {{ $color }};">
                                    {{ strtoupper(substr($review->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $review->name }}</p>
                                    <p class="table-sub-text">{{ $review->buyer_label ?: 'Verified Buyer' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div style="display:flex;align-items:center;gap:4px;color:#F59E0B;font-size:13px;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($review->rating >= $i)
                                        <i class="fas fa-star"></i>
                                    @elseif($review->rating >= ($i - 0.5))
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor

                                <span style="margin-left:6px;color:#475569;font-weight:600;">
                                    {{ number_format((float) $review->rating, 1) }}
                                </span>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($review->message, 70) }}
                        </td>

                        <td>
                            @if($review->product_tag)
                                <span class="role-tag">{{ $review->product_tag }}</span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            {{ $review->review_time ?: '-' }}
                        </td>

                        <td>
                            @if($review->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">{{ $review->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('review_item_edit')
                                    <a href="{{ route('admin.review-items.edit', $review->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('review_item_delete')
                                    <form action="{{ route('admin.review-items.destroy', $review->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn-outline btn-outline-danger">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@parent
<script>
$(function () {
    initAdminDataTable('.datatable-ReviewItem', {
        canDelete: @can('review_item_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.review-items.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search reviews...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ reviews'
    });
});
</script>
@endsection