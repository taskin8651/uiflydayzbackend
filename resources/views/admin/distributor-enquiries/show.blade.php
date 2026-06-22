@extends('layouts.admin')

@section('page-title', 'Distributor Enquiry Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.distributor-enquiries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Distributor Enquiry Details</h2>

        <p class="admin-page-subtitle">
            Full partnership enquiry information
        </p>
    </div>

    <div class="show-actions">
        @can('distributor_enquiry_delete')
            <form action="{{ route('admin.distributor-enquiries.destroy', $distributorEnquiry->id) }}"
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

    <div>
        <div class="detail-card mb-3">
            <div class="profile-hero">
                <div class="profile-avatar-lg" style="background:#4F46E5;">
                    {{ strtoupper(substr($distributorEnquiry->full_name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $distributorEnquiry->full_name }}</p>
                <p class="profile-subtitle">{{ $distributorEnquiry->phone }}</p>

                @if($distributorEnquiry->status === 'new')
                    <span class="status-pill warning">
                        <i class="fas fa-clock"></i>
                        New
                    </span>
                @else
                    <span class="status-pill success">
                        <i class="fas fa-check-circle"></i>
                        Read
                    </span>
                @endif
            </div>

            <div class="detail-section-pad-sm">
                <div class="d-grid gap-2" style="grid-template-columns:1fr 1fr;">
                    <div class="stat-mini">
                        <p class="stat-mini-label">Enquiry ID</p>
                        <p class="stat-mini-value">#{{ $distributorEnquiry->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Category</p>
                        <p class="stat-mini-value-sm">{{ $distributorEnquiry->partnership_category }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column:span 2;">
                        <p class="stat-mini-label">Submitted On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($distributorEnquiry->created_at)->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="tel:{{ $distributorEnquiry->phone }}" class="quick-link primary">
                    <i class="fas fa-phone"></i>
                    Call Applicant
                </a>

                <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $distributorEnquiry->phone) }}"
                   target="_blank"
                   class="quick-link">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>

                <a href="{{ route('admin.distributor-enquiries.index') }}" class="quick-link">
                    <i class="fas fa-list"></i>
                    All Enquiries
                </a>
            </div>
        </div>
    </div>

    <div>
        <div class="detail-card mb-3">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-handshake"></i>
                </div>

                <p class="detail-section-title">Partnership Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">{{ $distributorEnquiry->full_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $distributorEnquiry->phone }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Business / Firm</span>
                    <span class="detail-value">{{ $distributorEnquiry->business_name ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">City / District</span>
                    <span class="detail-value">{{ $distributorEnquiry->city }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">State</span>
                    <span class="detail-value">{{ $distributorEnquiry->state }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Partnership Category</span>
                    <span class="detail-value">{{ $distributorEnquiry->partnership_category }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Business Experience</span>
                    <span class="detail-value">{{ $distributorEnquiry->business_experience ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Current Network</span>
                    <span class="detail-value">{{ $distributorEnquiry->current_network ?: '-' }}</span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Additional Details</p>
            </div>

            <div class="detail-section-pad-sm">
                <p style="font-size:14px;line-height:1.75;color:#475569;margin:0;">
                    {{ $distributorEnquiry->message ?: 'No additional details added.' }}
                </p>
            </div>
        </div>
    </div>

</div>

@endsection