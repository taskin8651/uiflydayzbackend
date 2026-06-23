@extends('layouts.admin')

@section('page-title', 'Product Size Categories')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Product Size Categories</h2>
        <p class="admin-page-subtitle">
            Manage L, XL, XXL size categories, flow type and absorption display
        </p>
    </div>

    @can('product_size_category_create')
        <a href="{{ route('admin.product-size-categories.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Size Category
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Categories</p>
        <p class="stat-value">{{ $productSizeCategories->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $productSizeCategories->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $productSizeCategories->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Heavy Flow</p>
        <p class="stat-value">{{ $productSizeCategories->where('absorption_type', 'heavy')->count() + $productSizeCategories->where('absorption_type', 'very-heavy')->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Size Categories</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-ProductSizeCategory">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Size Label</th>
                    <th>Flow</th>
                    <th>Absorption</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($productSizeCategories as $category)
                    <tr data-entry-id="{{ $category->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $category->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    {{ strtoupper(substr($category->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $category->name }}</p>
                                    <p class="table-sub-text">{{ $category->flow_label ?: 'No flow label' }}</p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">{{ $category->slug }}</span>
                        </td>

                        <td style="color:#475569;">
                            {{ $category->size_label ?: '-' }}
                        </td>

                        <td style="color:#475569;">
                            {{ $category->flow_label ?: '-' }}
                        </td>

                        <td>
                            <span class="role-tag">{{ $category->absorption_type }}</span>
                        </td>

                        <td>
                            @if($category->status)
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
                            <span class="role-tag">{{ $category->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('product_size_category_edit')
                                    <a href="{{ route('admin.product-size-categories.edit', $category->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('product_size_category_delete')
                                    <form action="{{ route('admin.product-size-categories.destroy', $category->id) }}"
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
    initAdminDataTable('.datatable-ProductSizeCategory', {
        canDelete: @can('product_size_category_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.product-size-categories.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search size categories...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ size categories'
    });
});
</script>
@endsection