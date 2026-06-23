@extends('layouts.admin')

@section('page-title', 'Protection Types')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Protection Types</h2>
        <p class="admin-page-subtitle">
            Manage Straight Pads, Ultra Thin Napkins and related product type cards
        </p>
    </div>

    @can('protection_type_create')
        <a href="{{ route('admin.protection-types.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Protection Type
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Types</p>
        <p class="stat-value">{{ $protectionTypes->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $protectionTypes->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $protectionTypes->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Alt Cards</p>
        <p class="stat-value">{{ $protectionTypes->where('is_alt', true)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Protection Types</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ProtectionType">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Badge</th>
                    <th>Slug</th>
                    <th>Card Style</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($protectionTypes as $type)
                    <tr data-entry-id="{{ $type->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $type->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#0EA5E9;">
                                    <i class="fas fa-shield-alt"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $type->title }}</p>
                                    <p class="table-sub-text">{{ \Illuminate\Support\Str::limit($type->description, 60) }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($type->getFirstMediaUrl('protection_type_image'))
                                <img src="{{ $type->getFirstMediaUrl('protection_type_image') }}"
                                     alt="{{ $type->title }}"
                                     style="width:60px;height:50px;object-fit:contain;border-radius:10px;background:#F8FAFC;border:1px solid #E2E8F0;">
                            @else
                                <span style="font-size:12px;color:#94A3B8;">No Image</span>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">{{ $type->badge_text ?: '-' }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $type->slug }}
                        </td>

                        <td>
                            @if($type->is_alt)
                                <span class="role-tag">Alt</span>
                            @else
                                <span class="role-tag">Default</span>
                            @endif
                        </td>

                        <td>
                            @if($type->status)
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
                            <span class="role-tag">{{ $type->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('protection_type_edit')
                                    <a href="{{ route('admin.protection-types.edit', $type->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('protection_type_delete')
                                    <form action="{{ route('admin.protection-types.destroy', $type->id) }}"
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
    initAdminDataTable('.datatable-ProtectionType', {
        canDelete: @can('protection_type_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.protection-types.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search protection types...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ protection types'
    });
});
</script>
@endsection