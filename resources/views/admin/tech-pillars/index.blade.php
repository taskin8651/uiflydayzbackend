@extends('layouts.admin')

@section('page-title', 'Technology Pillars')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Technology Pillars</h2>
        <p class="admin-page-subtitle">
            Manage technology feature cards, icons, ordering and featured status
        </p>
    </div>

    @can('tech_pillar_create')
        <a href="{{ route('admin.tech-pillars.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Technology Pillar
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Pillars</p>
        <p class="stat-value">{{ $techPillars->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $techPillars->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $techPillars->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $techPillars->where('is_featured', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Technology Pillars</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-TechPillar">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($techPillars as $pillar)
                    <tr data-entry-id="{{ $pillar->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $pillar->id }}</span>
                        </td>

                        <td>
                            @if($pillar->getFirstMediaUrl('tech_pillar_icon'))
                                <img src="{{ $pillar->getFirstMediaUrl('tech_pillar_icon') }}"
                                     alt="{{ $pillar->icon_alt ?: $pillar->title }}"
                                     style="width:52px;height:52px;object-fit:contain;border-radius:14px;background:#F8FAFC;padding:8px;border:1px solid #E2E8F0;">
                            @else
                                <div class="avatar-circle" style="background:#94A3B8;">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="id-text">{{ $pillar->number ?: '—' }}</span>
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $pillar->title }}</p>
                                <p class="table-sub-text">{{ $pillar->icon_alt ?: 'No alt text' }}</p>
                            </div>
                        </td>

                        <td style="color:#475569;">
                            {{ \Illuminate\Support\Str::limit($pillar->description, 70) }}
                        </td>

                        <td>
                            @if($pillar->is_featured)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Featured</span>
                                </div>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">Normal</span>
                            @endif
                        </td>

                        <td>
                            @if($pillar->status)
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
                            <span class="role-tag">{{ $pillar->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('tech_pillar_edit')
                                    <a href="{{ route('admin.tech-pillars.edit', $pillar->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('tech_pillar_delete')
                                    <form action="{{ route('admin.tech-pillars.destroy', $pillar->id) }}"
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
    initAdminDataTable('.datatable-TechPillar', {
        canDelete: @can('tech_pillar_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.tech-pillars.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search technology pillars...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ pillars'
    });
});
</script>
@endsection