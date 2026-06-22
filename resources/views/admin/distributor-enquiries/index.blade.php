@extends('layouts.admin')

@section('page-title', 'Distributor Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Distributor Enquiries</h2>
        <p class="admin-page-subtitle">
            Manage partnership and distributorship applications
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $distributorEnquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">New</p>
        <p class="stat-value">{{ $distributorEnquiries->where('status', 'new')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $distributorEnquiries->where('status', 'read')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $distributorEnquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Distributor Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DistributorEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Business</th>
                    <th>City / State</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($distributorEnquiries as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $item->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    {{ strtoupper(substr($item->full_name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $item->full_name }}</p>
                                    <p class="table-sub-text">{{ $item->business_experience ?: 'No experience added' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $item->phone }}
                        </td>

                        <td style="color:#475569;">
                            {{ $item->business_name ?: '-' }}
                        </td>

                        <td style="color:#475569;">
                            {{ $item->city }}, {{ $item->state }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $item->partnership_category }}</span>
                        </td>

                        <td>
                            @if($item->status === 'new')
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px;color:#92400E;">New</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#166534;">Read</span>
                                </div>
                            @endif
                        </td>

                        <td style="color:#475569;">
                            {{ optional($item->created_at)->format('d M Y') }}
                        </td>

                        <td>
                            <div class="action-row">
                                @can('distributor_enquiry_access')
                                    <a href="{{ route('admin.distributor-enquiries.show', $item->id) }}"
                                       class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('distributor_enquiry_delete')
                                    <form action="{{ route('admin.distributor-enquiries.destroy', $item->id) }}"
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
    initAdminDataTable('.datatable-DistributorEnquiry', {
        canDelete: @can('distributor_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.distributor-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search distributor enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection