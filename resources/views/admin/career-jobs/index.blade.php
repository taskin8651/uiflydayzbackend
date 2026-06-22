@extends('layouts.admin')

@section('page-title', 'Career Jobs')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Career Jobs</h2>
        <p class="admin-page-subtitle">
            Manage career openings, role categories, requirements and status
        </p>
    </div>

    @can('career_job_create')
        <a href="{{ route('admin.career-jobs.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Career Job
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Jobs</p>
        <p class="stat-value">{{ $careerJobs->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $careerJobs->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $careerJobs->where('is_featured', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Urgent</p>
        <p class="stat-value">{{ $careerJobs->where('status_type', 'urgent')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Career Jobs</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-CareerJob">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Experience</th>
                    <th>Job Type</th>
                    <th>Opening Status</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($careerJobs as $job)
                    <tr data-entry-id="{{ $job->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $job->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                @php
                                    $categoryIcons = [
                                        'sales' => 'fas fa-chart-line',
                                        'marketing' => 'fas fa-bullhorn',
                                        'operations' => 'fas fa-cogs',
                                        'quality' => 'fas fa-check-circle',
                                        'support' => 'fas fa-headset',
                                    ];

                                    $icon = $categoryIcons[$job->category] ?? 'fas fa-briefcase';
                                @endphp

                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="{{ $icon }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $job->title }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($job->description, 55) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $job->category_label ?: ucfirst($job->category) }}
                            </span>
                        </td>

                        <td style="color:#475569;">
                            {{ $job->location ?: '-' }}
                        </td>

                        <td style="color:#475569;">
                            {{ $job->experience ?: '-' }}
                        </td>

                        <td>
                            @if($job->job_type)
                                <span class="role-tag">{{ $job->job_type }}</span>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">—</span>
                            @endif
                        </td>

                        <td>
                            @if($job->status_type === 'urgent')
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px; color:#92400E;">
                                        {{ $job->status_label ?: 'Urgent' }}
                                    </span>
                                </div>
                            @elseif($job->status_type === 'intern')
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">
                                        {{ $job->status_label ?: 'Internship' }}
                                    </span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">
                                        {{ $job->status_label ?: 'Open' }}
                                    </span>
                                </div>
                            @endif
                        </td>

                        <td>
                            @if($job->status)
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
                            <span class="role-tag">{{ $job->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('career_job_edit')
                                    <a href="{{ route('admin.career-jobs.edit', $job->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('career_job_delete')
                                    <form action="{{ route('admin.career-jobs.destroy', $job->id) }}"
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
    initAdminDataTable('.datatable-CareerJob', {
        canDelete: @can('career_job_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.career-jobs.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search career jobs...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ career jobs'
    });
});
</script>
@endsection