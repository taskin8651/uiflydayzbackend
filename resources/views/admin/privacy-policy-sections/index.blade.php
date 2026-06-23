@extends('layouts.admin')

@section('page-title', 'Privacy Policy')

@section('content')

<div class="admin-page-head">
    <div>
        <h2 class="admin-page-title">Privacy Policy Sections</h2>

        <p class="admin-page-subtitle">
            Manage the categories and content shown on the Privacy Policy page.
        </p>
    </div>

    <a href="{{ route('admin.privacy-policy-sections.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i>
        Add Section
    </a>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <p class="stat-label">Total Sections</p>
        <p class="stat-value">{{ $sections->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Published</p>
        <p class="stat-value">{{ $sections->where('status', true)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Draft</p>
        <p class="stat-value">{{ $sections->where('status', false)->count() }}</p>
    </div>

    <div class="stat-card">
        <p class="stat-label">Last Order</p>
        <p class="stat-value">{{ $sections->max('sort_order') ?? 0 }}</p>
    </div>
</div>

<div class="page-card">

    <div class="page-card-header">
        <p class="page-card-title">All Privacy Sections</p>

        <span class="page-card-note">
            <i class="fas fa-info-circle"></i>
            These sections appear on the public Privacy Policy page.
        </span>
    </div>

    <div class="page-card-table">
        <table class="min-w-full datatable datatable-PrivacyPolicySection">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Section</th>
                    <th>Icon</th>
                    <th>Subtitle</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sections as $section)
                    <tr>
                        <td>
                            <span class="id-text">#{{ $section->id }}</span>
                        </td>

                        <td>
                            <div class="inline-flex-center">
                                <div class="avatar-circle" style="background:#4F46E5;">
                                    <i class="{{ $section->icon_class ?: 'bi bi-shield-check' }}"></i>
                                </div>

                                <div>
                                    <p class="table-main-text">
                                        {{ $section->title }}
                                    </p>

                                    <p class="table-sub-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($section->content), 80) }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $section->icon_class ?: 'bi bi-shield-check' }}
                            </span>
                        </td>

                        <td>
                            @if($section->subtitle)
                                <span style="color:#475569;font-size:13px;">
                                    {{ $section->subtitle }}
                                </span>
                            @else
                                <span style="color:#94A3B8;font-size:13px;">
                                    No subtitle
                                </span>
                            @endif
                        </td>

                        <td>
                            @if($section->status)
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-success"></span>
                                    <span style="font-size:12.5px;color:#166534;">Published</span>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2">
                                    <span class="status-dot status-warning"></span>
                                    <span style="font-size:12.5px;color:#92400E;">Draft</span>
                                </div>
                            @endif
                        </td>

                        <td>
                            <span class="role-tag">
                                {{ $section->sort_order ?? 0 }}
                            </span>
                        </td>

                        <td>
                            <div class="action-row">

                                <a href="{{ route('admin.privacy-policy-sections.edit', $section) }}"
                                   class="btn-outline btn-outline-edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.privacy-policy-sections.destroy', $section) }}"
                                      style="display:inline;"
                                      onsubmit="return confirm('Delete this section?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-outline btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Delete
                                    </button>
                                </form>

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
    if ($.fn.DataTable) {
        $('.datatable-PrivacyPolicySection').DataTable({
            order: [[5, 'asc']],
            pageLength: 25,
            responsive: true,
            language: {
                search: '',
                searchPlaceholder: 'Search privacy sections...'
            }
        });
    }
});
</script>

@endsection