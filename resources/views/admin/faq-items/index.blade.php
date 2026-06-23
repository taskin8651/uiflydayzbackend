@extends('layouts.admin')

@section('page-title', 'FAQ Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">FAQ Items</h2>
        <p class="admin-page-subtitle">
            Manage FAQ groups, questions, answers and display order
        </p>
    </div>

    @can('faq_item_create')
        <a href="{{ route('admin.faq-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add FAQ
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total FAQs</p>
        <p class="stat-value">{{ $faqItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $faqItems->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $faqItems->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Groups</p>
        <p class="stat-value">{{ $faqItems->pluck('group_key')->unique()->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All FAQ Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-FaqItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Group</th>
                    <th>Icon</th>
                    <th>Open</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($faqItems as $faq)
                    <tr data-entry-id="{{ $faq->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $faq->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="fas fa-question"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $faq->question }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 70) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $faq->group_title }}
                            </span>

                            <p class="table-sub-text" style="margin-top:5px;">
                                {{ $faq->group_key }}
                            </p>
                        </td>

                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="avatar-circle" style="width:34px;height:34px;background:#F1F5F9;color:#4F46E5;">
                                    <i class="{{ $faq->question_icon ?: 'bi bi-question-circle' }}"></i>
                                </span>

                                <span style="font-size:12px;color:#64748B;">
                                    {{ $faq->question_icon }}
                                </span>
                            </div>
                        </td>

                        <td>
                            @if($faq->is_open)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#166534;">Open</span>
                                </div>
                            @else
                                <span style="font-size:12px;color:#94A3B8;">Closed</span>
                            @endif
                        </td>

                        <td>
                            @if($faq->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#166534;">Active</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px;color:#92400E;">Inactive</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">{{ $faq->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('faq_item_edit')
                                    <a href="{{ route('admin.faq-items.edit', $faq->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('faq_item_delete')
                                    <form action="{{ route('admin.faq-items.destroy', $faq->id) }}"
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
    initAdminDataTable('.datatable-FaqItem', {
        canDelete: @can('faq_item_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.faq-items.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search FAQs...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ FAQs'
    });
});
</script>
@endsection