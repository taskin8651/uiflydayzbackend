@extends('layouts.admin')

@section('page-title', 'Show Technology Pillar')

@section('content')

@php
    $iconUrl = $techPillar->getFirstMediaUrl('tech_pillar_icon');
@endphp

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.tech-pillars.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Technology Pillar Details</h2>

        <p class="admin-page-subtitle">
            Full details for this technology feature card
        </p>
    </div>

    <div class="show-actions">
        @can('tech_pillar_edit')
            <a href="{{ route('admin.tech-pillars.edit', $techPillar->id) }}" class="btn-primary">
                <i class="fas fa-pencil-alt"></i>
                Edit Pillar
            </a>
        @endcan

        @can('tech_pillar_delete')
            <form action="{{ route('admin.tech-pillars.destroy', $techPillar->id) }}"
                  method="POST"
                  onsubmit="return confirm('{{ trans('global.areYouSure') }}')">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn-danger">
                    <i class="fas fa-trash-alt"></i>
                    Delete
                </button>
            </form>
        @endcan
    </div>
</div>

<div class="show-grid">

    {{-- LEFT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">

                @if($iconUrl)
                    <div style="width:112px;height:112px;border-radius:28px;background:#F8FAFC;border:1px solid #E2E8F0;padding:18px;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                        <img src="{{ $iconUrl }}"
                             alt="{{ $techPillar->icon_alt ?: $techPillar->title }}"
                             style="width:100%;height:100%;object-fit:contain;">
                    </div>
                @else
                    <div class="profile-avatar-lg" style="background:#94A3B8;">
                        <i class="fas fa-image"></i>
                    </div>
                @endif

                <p class="profile-title">{{ $techPillar->title }}</p>
                <p class="profile-subtitle">
                    {{ $techPillar->icon_alt ?: 'No icon alt text' }}
                </p>

                @if($techPillar->status)
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Active
                    </span>
                @else
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        Inactive
                    </span>
                @endif

            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns: 1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Pillar ID</p>
                        <p class="stat-mini-value">#{{ $techPillar->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Number</p>
                        <p class="stat-mini-value">{{ $techPillar->number ?: '-' }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Sort Order</p>
                        <p class="stat-mini-value">{{ $techPillar->sort_order }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Featured</p>
                        <p class="stat-mini-value">
                            {{ $techPillar->is_featured ? 'Yes' : 'No' }}
                        </p>
                    </div>

                    <div class="stat-mini" style="grid-column: span 2;">
                        <p class="stat-mini-label">Created On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($techPillar->created_at)->format('d M Y') ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                @can('tech_pillar_edit')
                    <a href="{{ route('admin.tech-pillars.edit', $techPillar->id) }}" class="quick-link primary">
                        <i class="fas fa-pencil-alt"></i>
                        Edit Pillar
                    </a>
                @endcan

                <a href="{{ route('admin.tech-pillars.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Technology Pillars
                </a>

                @can('tech_pillar_create')
                    <a href="{{ route('admin.tech-pillars.create') }}" class="quick-link">
                        <i class="fas fa-plus"></i>
                        Add New Pillar
                    </a>
                @endcan
            </div>
        </div>
    </div>

    {{-- RIGHT SIDE --}}
    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

                <p class="detail-section-title">Pillar Information</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">ID</span>
                    <span class="detail-value code-pill">#{{ $techPillar->id }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Number</span>
                    <span class="detail-value">{{ $techPillar->number ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Title</span>
                    <span class="detail-value">{{ $techPillar->title }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Icon Alt Text</span>
                    <span class="detail-value">{{ $techPillar->icon_alt ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Sort Order</span>
                    <span class="detail-value code-pill">{{ $techPillar->sort_order }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Featured</span>

                    @if($techPillar->is_featured)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-star text-success"></i>
                            <span class="detail-value">Featured Card</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="far fa-star" style="color:#94A3B8;"></i>
                            <span class="detail-value">Normal Card</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Status</span>

                    @if($techPillar->status)
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-check-circle text-success"></i>
                            <span class="detail-value">Active</span>
                        </div>
                    @else
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-exclamation-circle text-warning"></i>
                            <span class="detail-value" style="color:#92400E;">Inactive</span>
                        </div>
                    @endif
                </div>

                <div class="detail-row">
                    <span class="detail-label">Created At</span>
                    <span class="detail-value">
                        {{ optional($techPillar->created_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Updated At</span>
                    <span class="detail-value">
                        {{ optional($techPillar->updated_at)->format('d M Y, H:i') ?? '-' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head between">
                <div class="d-flex align-items-center gap-2">
                    <div class="detail-section-icon">
                        <i class="fas fa-align-left"></i>
                    </div>

                    <p class="detail-section-title">Description</p>
                </div>

                @if($techPillar->is_featured)
                    <span class="status-pill success">
                        Featured
                    </span>
                @else
                    <span class="status-pill warning">
                        Normal
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                @if($techPillar->description)
                    <div class="permission-summary">
                        <p class="permission-summary-title">Frontend Card Text</p>

                        <p style="font-size:14px;line-height:1.75;color:#475569;margin:0;">
                            {{ $techPillar->description }}
                        </p>
                    </div>
                @else
                    <div class="assign-empty">
                        <div class="assign-empty-icon">
                            <i class="fas fa-align-left"></i>
                        </div>

                        <p class="assign-empty-title">No description added</p>
                        <p class="assign-empty-text">This technology pillar has no description yet.</p>

                        @can('tech_pillar_edit')
                            <a href="{{ route('admin.tech-pillars.edit', $techPillar->id) }}" class="btn-primary mt-3">
                                <i class="fas fa-plus"></i>
                                Add Description
                            </a>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection