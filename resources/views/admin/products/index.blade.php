@extends('layouts.admin')

@section('page-title', 'Products')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Products</h2>
        <p class="admin-page-subtitle">
            Manage product details, size category, protection type and gallery images
        </p>
    </div>

    @can('product_create')
        <a href="{{ route('admin.products.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Add Product
        </a>
    @endcan
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Products</p>
        <p class="stat-value">{{ $products->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Active</p>
        <p class="stat-value">{{ $products->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Featured</p>
        <p class="stat-value">{{ $products->where('is_featured', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Inactive</p>
        <p class="stat-value">{{ $products->where('status', false)->count() }}</p>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <p class="page-card-title">All Products</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            Select rows to use bulk actions
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-Product">
            <thead>
                <tr>
                    <th style="width:40px;"></th>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Size</th>
                    <th>Protection Type</th>
                    <th>Flow</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">{{ trans('global.actions') }}</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                    <tr data-entry-id="{{ $product->id }}">
                        <td></td>

                        <td>
                            <span class="id-text">#{{ $product->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#EC4899;">
                                    <i class="fas fa-box"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">{{ $product->name }}</p>
                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit($product->short_description, 60) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($product->getFirstMediaUrl('product_main_image'))
                                <img src="{{ $product->getFirstMediaUrl('product_main_image') }}"
                                     alt="{{ $product->name }}"
                                     style="width:65px;height:55px;object-fit:contain;border-radius:10px;background:#F8FAFC;border:1px solid #E2E8F0;">
                            @else
                                <span style="font-size:12px;color:#94A3B8;">No Image</span>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ optional($product->sizeCategory)->name ?: '-' }}
                            </span>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ optional($product->protectionType)->title ?: '-' }}
                            </span>
                        </td>

                        <td style="color:#475569;">
                            {{ $product->flow_text ?: optional($product->sizeCategory)->flow_label ?: '-' }}
                        </td>

                        <td>
                            <span class="role-tag">{{ number_format((float) $product->rating, 1) }}/5</span>
                        </td>

                        <td>
                            @if($product->status)
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
                            <span class="role-tag">{{ $product->sort_order }}</span>
                        </td>

                        <td>
                            <div class="action-row">
                                @can('product_edit')
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn-outline btn-outline-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                        Edit
                                    </a>
                                @endcan

                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
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
    initAdminDataTable('.datatable-Product', {
        canDelete: @can('product_delete') true @else false @endcan,
        massDeleteUrl: "{{ route('admin.products.massDestroy') }}",
        deleteText: "{{ trans('global.datatables.delete') }}",
        zeroSelectedText: "{{ trans('global.datatables.zero_selected') }}",
        confirmText: "{{ trans('global.areYouSure') }}",
        searchPlaceholder: 'Search products...',
        infoText: 'Showing _START_–_END_ of _TOTAL_ products'
    });
});
</script>
@endsection