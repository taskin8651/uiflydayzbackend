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

        @canany(['product_size_category_access', 'protection_type_access', 'product_access'])
    @php
        $productActive = request()->is('admin/product-size-categories*')
            || request()->is('admin/protection-types*')
            || request()->is('admin/products*');
    @endphp

    <div x-data="{ open: {{ $productActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Products"
                class="nav-link nav-group-btn {{ $productActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-box-open nav-icon"></i>
                <span class="nav-label">Product Management</span>
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

            @can('product_size_category_access')
                <a href="{{ route('admin.product-size-categories.index') }}"
                   class="sub-link {{ request()->is('admin/product-size-categories*') ? 'active' : '' }}">
                    <i class="fas fa-ruler"></i>
                    Size Categories
                </a>
            @endcan

            @can('protection_type_access')
                <a href="{{ route('admin.protection-types.index') }}"
                   class="sub-link {{ request()->is('admin/protection-types*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt"></i>
                    Protection Types
                </a>
            @endcan

            @can('product_access')
                <a href="{{ route('admin.products.index') }}"
                   class="sub-link {{ request()->is('admin/products*') ? 'active' : '' }}">
                    <i class="fas fa-box"></i>
                    Products
                </a>
            @endcan

        </div>
    </div>
@endcanany

      @canany(['tech_pillar_access', 'about_section_access', 'download_item_access', 'certificate_item_access', 'review_item_access', 'career_job_access'])
    @php
        $techActive = request()->is('admin/tech-pillars*')
            || request()->is('admin/about-section*')
            || request()->is('admin/download-items*')
            || request()->is('admin/certificate-items*')
            || request()->is('admin/review-items*')
            || request()->is('admin/career-jobs*');
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

            @can('career_job_access')
                <a href="{{ route('admin.career-jobs.index') }}"
                   class="sub-link {{ request()->is('admin/career-jobs*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    Career Jobs
                </a>
            @endcan

        </div>
    </div>
@endcanany

{{-- ENQUIRY MANAGEMENT GROUP --}}
@canany(['distributor_enquiry_access', 'contact_enquiry_access'])
    @php
        $enquiryActive = request()->is('admin/distributor-enquiries*')
            || request()->is('admin/contact-enquiries*');
    @endphp

    <div x-data="{ open: {{ $enquiryActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Enquiries"
                class="nav-link nav-group-btn {{ $enquiryActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-inbox nav-icon"></i>
                <span class="nav-label">Enquiries</span>
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

            @can('distributor_enquiry_access')
                <a href="{{ route('admin.distributor-enquiries.index') }}"
                   class="sub-link {{ request()->is('admin/distributor-enquiries*') ? 'active' : '' }}">
                    <i class="fas fa-handshake"></i>
                    Distributor Enquiries
                </a>
            @endcan

            @can('contact_enquiry_access')
                <a href="{{ route('admin.contact-enquiries.index') }}"
                   class="sub-link {{ request()->is('admin/contact-enquiries*') ? 'active' : '' }}">
                    <i class="fas fa-envelope-open-text"></i>
                    Contact Enquiries
                </a>
            @endcan

        </div>
    </div>
@endcanany

@can('faq_item_access')
    <a href="{{ route('admin.faq-items.index') }}"
       class="nav-link {{ request()->is('admin/faq-items*') ? 'active' : '' }}"
       data-tooltip="FAQ Items">

        <i class="fas fa-question-circle nav-icon"></i>
        <span class="nav-label">FAQ Items</span>
    </a>
@endcan

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

    <a href="{{ route('admin.website-settings.index') }}"
       class="nav-link {{ request()->is('admin/website-settings*') ? 'active' : '' }}"
       data-tooltip="Website Settings">

        <i class="fas fa-cog nav-icon"></i>
        <span class="nav-label">Website Settings</span>
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
