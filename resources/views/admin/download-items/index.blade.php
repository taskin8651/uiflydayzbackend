@extends('layouts.admin')

@section('page-title', 'Download Items')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Download Items</h2>
        <p class="admin-page-subtitle">
            Manage downloadable catalogues, product guides, business files and certificates
        </p>
    </div>

    @can('download_item_create')
        <a href="{{ route('admin.download-items.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Download Item
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Items</p>
        <p class="stat-value">{{ $downloadItems->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $downloadItems->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $downloadItems->where('is_featured', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Files Uploaded</p>
        <p class="stat-value">
            {{ $downloadItems->filter(fn($item) => $item->getFirstMediaUrl('download_file'))->count() }}
        </p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Download Items</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-DownloadItem">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>File</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($downloadItems as $item)
                    @php
                        $fileUrl = $item->getFirstMediaUrl('download_file');
                    @endphp

                    <tr data-entry-id="{{ $item->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $item->id }}</span>
                        </td>

                        <td>
                            <div class="avatar-circle" style="background:#4F46E5;">
                                <i class="{{ $item->icon_class ?: 'bi bi-journal-richtext' }}"></i>
                            </div>
                        </td>

                        <td>
                            <div>
                                <p class="table-main-text">{{ $item->title }}</p>
                                <p class="table-sub-text">
                                    {{ \Illuminate\Support\Str::limit($item->description, 55) }}
                                </p>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ ucfirst($item->category) }}
                            </span>
                        </td>

                        <td style="color:#475569;">
                            {{ $item->type ?: '-' }}
                        </td>

                        <td>
                            @if($fileUrl)
                                <a href="{{ $fileUrl }}" target="_blank" class="btn-outline">
                                    <i class="fas fa-file-download"></i>
                                    File
                                </a>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">No file</span>
                            @endif
                        </td>

                        <td>
                            @if($item->is_featured)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px; color:#166534;">Featured</span>
                                </div>
                            @else
                                <span style="font-size:12px; color:#94A3B8;">Normal</span>
                            @endif
                        </td>

                        <td>
                            @if($item->status)
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
                            <span class="role-tag">{{ $item->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('download_item_edit')
                                    <a href="{{ route('admin.download-items.edit', $item->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('download_item_delete')
                                    <form action="{{ route('admin.download-items.destroy', $item->id) }}"
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
    initAdminDataTable('.datatable-DownloadItem', {
        canDelete: @can('download_item_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.download-items.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search download items...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ download items'
    });
});
</script>
@endsection