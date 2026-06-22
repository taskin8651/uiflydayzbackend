<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>
        @endcan

       {{-- TECHNOLOGY CONTENT GROUP --}}
@canany(['tech_pillar_access', 'about_section_access', 'download_item_access', 'certificate_item_access', 'review_item_access'])
    @php
        $techActive = request()->is('admin/tech-pillars*')
            || request()->is('admin/about-section*')
            || request()->is('admin/download-items*')
            || request()->is('admin/certificate-items*')
            || request()->is('admin/review-items*');
    @endphp

    <div x-data="{ open: {{ $techActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Technology"
                class="nav-link nav-group-btn {{ $techActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-microchip nav-icon"></i>
                <span class="nav-label">Technology Content</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            @can('about_section_access')
                <a href="{{ route('admin.about-section.index') }}"
                   class="sub-link {{ request()->is('admin/about-section*') ? 'active' : '' }}">
                    <i class="fas fa-info-circle"></i>
                    About Section
                </a>
            @endcan

            @can('tech_pillar_access')
                <a href="{{ route('admin.tech-pillars.index') }}"
                   class="sub-link {{ request()->is('admin/tech-pillars*') ? 'active' : '' }}">
                    <i class="fas fa-layer-group"></i>
                    Technology Pillars
                </a>
            @endcan

            @can('download_item_access')
                <a href="{{ route('admin.download-items.index') }}"
                   class="sub-link {{ request()->is('admin/download-items*') ? 'active' : '' }}">
                    <i class="fas fa-download"></i>
                    Download Items
                </a>
            @endcan

            @can('certificate_item_access')
                <a href="{{ route('admin.certificate-items.index') }}"
                   class="sub-link {{ request()->is('admin/certificate-items*') ? 'active' : '' }}">
                    <i class="fas fa-certificate"></i>
                    Certificate Items
                </a>
            @endcan

            @can('review_item_access')
                <a href="{{ route('admin.review-items.index') }}"
                   class="sub-link {{ request()->is('admin/review-items*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    Review Items
                </a>
            @endcan

        </div>
    </div>
@endcanany

        <a href="{{ route('admin.blog-posts.index') }}"
           data-tooltip="Blog Articles"
           class="nav-link {{ request()->is('admin/blog-posts*') ? 'active' : '' }}">
            <i class="fas fa-book-open nav-icon"></i>
            <span class="nav-label">Blog Articles</span>
        </a>
        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
