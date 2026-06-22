@extends('layouts.admin')

@section('page-title', 'Contact Enquiries')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Contact Enquiries</h2>
        <p class="admin-page-subtitle">
            Manage website contact form enquiries
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Enquiries</p>
        <p class="stat-value">{{ $contactEnquiries->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">New</p>
        <p class="stat-value">{{ $contactEnquiries->where('status', 'new')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Read</p>
        <p class="stat-value">{{ $contactEnquiries->where('status', 'read')->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Today</p>
        <p class="stat-value">{{ $contactEnquiries->where('created_at', '>=', now()->startOfDay())->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Contact Enquiries</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ContactEnquiry">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Enquiry Type</th>
                    <th>City</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($contactEnquiries as $item)
                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $item->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    {{ strtoupper(substr($item->full_name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $item->full_name }}</p>
                                    <p class="table-sub-text">{{ $item->city ?: 'No city added' }}</p>
                                </div>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ $item->phone }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $item->enquiry_type }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $item->city ?: '-' }}
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($item->message, 60) }}
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
                                @can('contact_enquiry_access')
                                    <a href="{{ route('admin.contact-enquiries.show', $item->id) }}"
                                       class="btn-outline">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </a>
                                @endcan

                                @can('contact_enquiry_delete')
                                    <form action="{{ route('admin.contact-enquiries.destroy', $item->id) }}"
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
    initAdminDataTable('.datatable-ContactEnquiry', {
        canDelete: @can('contact_enquiry_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.contact-enquiries.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search contact enquiries...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ enquiries'
    });
});
</script>
@endsection