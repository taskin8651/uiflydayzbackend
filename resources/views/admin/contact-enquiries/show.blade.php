@extends('layouts.admin')

@section('page-title', 'Contact Enquiry Details')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.contact-enquiries.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Contact Enquiry Details</h2>

        <p class="admin-page-subtitle">
            Full contact enquiry information
        </p>
    </div>

    <div class="show-actions">
        @can('contact_enquiry_delete')
            <form action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry->id) }}"
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
                <div class="profile-avatar-lg" style="background:#0EA5E9;">
                    {{ strtoupper(substr($contactEnquiry->full_name, 0, 1)) }}
                </div>

                <p class="profile-title">{{ $contactEnquiry->full_name }}</p>
                <p class="profile-subtitle">{{ $contactEnquiry->phone }}</p>

                @if($contactEnquiry->status === 'new')
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
                        <p class="stat-mini-value">#{{ $contactEnquiry->id }}</p>
                    </div>

                    <div class="stat-mini">
                        <p class="stat-mini-label">Type</p>
                        <p class="stat-mini-value-sm">{{ $contactEnquiry->enquiry_type }}</p>
                    </div>

                    <div class="stat-mini" style="grid-column:span 2;">
                        <p class="stat-mini-label">Submitted On</p>
                        <p class="stat-mini-value-sm">
                            {{ optional($contactEnquiry->created_at)->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card detail-card-pad">
            <p class="quick-title">Quick Actions</p>

            <div class="quick-list">
                <a href="tel:{{ $contactEnquiry->phone }}" class="quick-link primary">
                    <i class="fas fa-phone"></i>
                    Call
                </a>

                <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $contactEnquiry->phone) }}"
                   target="_blank"
                   class="quick-link">
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>

                <a href="{{ route('admin.contact-enquiries.index') }}" class="quick-link">
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
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                <p class="detail-section-title">Contact Details</p>
            </div>

            <div class="detail-section-body">
                <div class="detail-row">
                    <span class="detail-label">Full Name</span>
                    <span class="detail-value">{{ $contactEnquiry->full_name }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $contactEnquiry->phone }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Enquiry Type</span>
                    <span class="detail-value">{{ $contactEnquiry->enquiry_type }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">City / Area</span>
                    <span class="detail-value">{{ $contactEnquiry->city ?: '-' }}</span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">Submitted At</span>
                    <span class="detail-value">
                        {{ optional($contactEnquiry->created_at)->format('d M Y, H:i') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-section-head">
                <div class="detail-section-icon">
                    <i class="fas fa-align-left"></i>
                </div>

                <p class="detail-section-title">Message</p>
            </div>

            <div class="detail-section-pad-sm">
                <p style="font-size:14px;line-height:1.75;color:#475569;margin:0;">
                    {{ $contactEnquiry->message }}
                </p>
            </div>
        </div>
    </div>

</div>

@endsection