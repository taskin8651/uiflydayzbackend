<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FlyDayz – Premium Sanitary Pads</title>

  <title>{{ $websiteSettings->meta_title ?: $websiteSettings->website_name }}</title>
  <meta name="description" content="{{ $websiteSettings->meta_description }}">
  <meta name="keywords" content="{{ $websiteSettings->meta_keywords }}">
  <meta name="robots" content="{{ $websiteSettings->robots_text ?: 'index, follow' }}">
  <link rel="icon" href="{{ $websiteSettings->favicon_url }}">
  <meta property="og:image" content="{{ $websiteSettings->og_image_url }}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
    integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

  <!-- ===================== FLYDAYZ PREMIUM PRELOADER ===================== -->
  <div id="flydayzPreloader" class="flydayz-preloader" aria-label="FlyDayz loading screen">
    <div class="preloader-bg-glow glow-one"></div>
    <div class="preloader-bg-glow glow-two"></div>

    <img src="assets/images/decor/cotton-1.png" class="preloader-decor preloader-cotton cotton-a" alt="">
    <img src="assets/images/decor/cotton-2.png" class="preloader-decor preloader-cotton cotton-b" alt="">
    <img src="assets/images/decor/petal-1.png" class="preloader-decor preloader-petal petal-a" alt="">
    <img src="assets/images/decor/petal-2.png" class="preloader-decor preloader-petal petal-b" alt="">

    <div class="preloader-card">

      <!-- LOGO -->
      <div class="preloader-brand">
        <img src="{{ $websiteSettings->header_logo_url }}" alt="{{ $websiteSettings->website_name }} Logo" class="preloader-logo">
        <!-- <small>Premium Feminine Hygiene</small> -->
      </div>

      <!-- REAL PAD IMAGE -->
      <div class="pad-loader" aria-hidden="true">
        <div class="pad-image-wrap">

          <div class="pad-loader-glow"></div>

          <img src="assets/images/decor/pad-outline-1.png" alt="" class="preloader-pad-img">

          <span class="absorb-dot dot-1"></span>
          <span class="absorb-dot dot-2"></span>
          <span class="absorb-dot dot-3"></span>
          <span class="absorb-dot dot-4"></span>
          <span class="absorb-dot dot-5"></span>

          <div class="pad-shine"></div>
        </div>
      </div>

      <div class="preloader-text">
        <strong>Preparing comfort for you</strong>
        <span>Soft care • Fresh feel • Secure protection</span>
      </div>

      <div class="preloader-progress">
        <span></span>
      </div>

    </div>
  </div>
  <!-- ===================== FLYDAYZ PREMIUM PRELOADER END ===================== -->



  <!-- ===================== MYFLYDAYZ PREMIUM HEADER ===================== -->
  <header class="myfly-header">
    <nav class="navbar navbar-expand-lg myfly-navbar">
      <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand myfly-brand" href="{{ route('home') }}">
          <img src="{{ $websiteSettings->header_logo_url }}" alt="{{ $websiteSettings->website_name }} Logo" class="myfly-logo">
        </a>

        <!-- MOBILE TOGGLE -->
        <button class="navbar-toggler myfly-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
          aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <!-- MENU -->
        <div id="mainNav" class="collapse navbar-collapse myfly-menu-wrap">
          <ul class="navbar-nav ms-auto align-items-lg-center myfly-menu">

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('home') ? 'active' : '' }}"
           href="{{ route('home') }}">
            Home
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('products', 'products.*') ? 'active' : '' }}"
           href="{{ route('products') }}">
            Products
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('technology') ? 'active' : '' }}"
           href="{{ route('technology') }}">
            Technology
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('whychoose') ? 'active' : '' }}"
           href="{{ route('whychoose') }}">
            Why Us
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('downloads') ? 'active' : '' }}"
           href="{{ route('downloads') }}">
            Download Catalogue
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('certificates') ? 'active' : '' }}"
           href="{{ route('certificates') }}">
            Our Certifications
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('reviews') ? 'active' : '' }}"
           href="{{ route('reviews') }}">
            Reviews
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('blog.index', 'blog.*') ? 'active' : '' }}"
           href="{{ route('blog.index') }}">
            Blog
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('careers') ? 'active' : '' }}"
           href="{{ route('careers') }}">
            Career
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link myfly-link {{ request()->routeIs('contact') ? 'active' : '' }}"
           href="{{ route('contact') }}">
            Contact
        </a>
    </li>

</ul>

          <!-- CTA -->
          <div class="myfly-actions">
            <a class="myfly-main-btn" href="{{ route('distributor') }}">
              <span>Become a Distributor</span>
              <i class="bi bi-arrow-right-short"></i>
            </a>
          </div>

        </div>

      </div>
    </nav>
  </header>
  <!-- ===================== MYFLYDAYZ PREMIUM HEADER END ===================== -->


  @yield('content')



  
<!-- ===================== FLYDAYZ ULTRA PREMIUM FOOTER ===================== -->
<footer class="footer-premium">

  <!-- BACKGROUND DECORATION -->
  <div class="footer-bg-layer"></div>
  <div class="footer-bg-pattern"></div>

  <div class="footer-bg-glow footer-glow-one"></div>
  <div class="footer-bg-glow footer-glow-two"></div>
  <div class="footer-bg-glow footer-glow-three"></div>

  <div class="container position-relative">

    <!-- ===================== TOP CTA ===================== -->
    <div class="footer-top-cta">

      <div class="footer-cta-left">

        <div class="footer-cta-icon">
          <i class="bi bi-briefcase"></i>
        </div>

        <div class="footer-cta-content">

          <div class="footer-cta-kicker">
            Business Partnership
          </div>

          <h3>Distributorship & Bulk Orders</h3>

          <p>
            Connect with the FlyDayz team for partnership, retail supply,
            bulk orders and product availability.
          </p>

        </div>

      </div>

      <div class="footer-cta-actions">

        <a class="btn footer-btn-primary" href="{{ $websiteSettings->phone_url }}">
          <i class="bi bi-telephone-fill"></i>
          Call {{ $websiteSettings->primary_phone }}
        </a>

        <a
          class="btn footer-btn-whatsapp"
          target="_blank"
          rel="noopener noreferrer"
          href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I am interested in distributorship.') }}"
        >
          <i class="bi bi-whatsapp"></i>
          WhatsApp
        </a>

      </div>

    </div>
    <!-- ===================== TOP CTA END ===================== -->


    <!-- ===================== MAIN FOOTER GRID ===================== -->
    <div class="row g-4 g-xl-5 footer-grid">

      <!-- BRAND -->
      <div class="col-md-6 col-lg-4">

        <div class="footer-brand-column">

          <a
            class="footer-brand"
            href="{{ route('home') }}"
            aria-label="FlyDayz Home"
          >
            <img
              src="{{ $websiteSettings->footer_logo_url }}"
              alt="{{ $websiteSettings->website_name }} Logo"
              class="footer-logo"
            >
          </a>

          <p class="footer-about">
            FlyDayz is built for modern comfort — soft on skin,
            strong on protection. Premium hygienic care designed
            to keep women fresh, confident and worry-free.
          </p>

          <div class="footer-trust-badges">

            <span>
              <i class="bi bi-cloud-check-fill"></i>
              Cotton Soft
            </span>

            <span>
              <i class="bi bi-droplet-half"></i>
              Gel Lock
            </span>

            <span>
              <i class="bi bi-shield-plus"></i>
              Leak Control
            </span>

          </div>

        </div>

      </div>


      <!-- QUICK LINKS -->
      <div class="col-6 col-md-3 col-lg-2">

        <div class="footer-column">

          <div class="footer-title">
            Quick Links
          </div>

          <ul class="footer-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('products') }}">Products</a></li>
            <li><a href="{{ route('technology') }}">Technology</a></li>
            <li><a href="{{ route('whychoose') }}">Why FlyDayz</a></li>
            <li><a href="{{ route('reviews') }}">Reviews</a></li>
            <li><a href="{{ route('faqs') }}">FAQs</a></li>
            <li><a href="{{ route('privacy') }}">Privacy</a></li>
            <li><a href="{{ route('terms') }}">T&amp;C</a></li>
          </ul>

        </div>

      </div>


      <!-- PRODUCTS -->
      <div class="col-6 col-md-3 col-lg-2">

        <div class="footer-column">

          <div class="footer-title">
            Products
          </div>

          <ul class="footer-links">
            <li><a href="{{ route('products') }}">Regular</a></li>
            <li><a href="{{ route('products') }}">Cotton Soft</a></li>
            <li><a href="{{ route('products') }}">XL</a></li>
            <li><a href="{{ route('products') }}">Overnight</a></li>
            <li><a href="{{ route('products') }}">Pocket Pack</a></li>
          </ul>

        </div>

      </div>


      <!-- CONTACT -->
      <div class="col-md-6 col-lg-4">

        <div class="footer-column">

          <div class="footer-title">
            Contact &amp; Support
          </div>

          <div class="footer-contact-box">

            <!-- CALL -->
            <a
              class="footer-contact-row"
              href="{{ $websiteSettings->phone_url }}"
            >

              <div class="footer-contact-icon">
                <i class="bi bi-telephone-fill"></i>
              </div>

              <div class="footer-contact-info">
                <span>Call Us</span>
                <strong>{{ $websiteSettings->primary_phone }}</strong>
              </div>

              <i class="bi bi-arrow-up-right footer-contact-arrow"></i>

            </a>


            <!-- WHATSAPP -->
            <a
              class="footer-contact-row"
              target="_blank"
              rel="noopener noreferrer"
              href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I want to know more about your products.') }}"
            >

              <div class="footer-contact-icon whatsapp">
                <i class="bi bi-whatsapp"></i>
              </div>

              <div class="footer-contact-info">
                <span>WhatsApp Support</span>
                <strong>Chat with us</strong>
              </div>

              <i class="bi bi-arrow-up-right footer-contact-arrow"></i>

            </a>


            @if($websiteSettings->email)
              <a class="footer-contact-row" href="mailto:{{ $websiteSettings->email }}">
                <div class="footer-contact-icon"><i class="bi bi-envelope-fill"></i></div>
                <div class="footer-contact-info"><span>Email Us</span><strong>{{ $websiteSettings->email }}</strong></div>
                <i class="bi bi-arrow-up-right footer-contact-arrow"></i>
              </a>
            @endif

            <!-- DISTRIBUTOR CARD -->
            <div class="footer-distributor-card">

              <div class="footer-distributor-decoration"></div>

              <div class="footer-distributor-badge">
                <i class="bi bi-shop-window"></i>
                Partner Enquiry
              </div>

              <h4>Looking for distributorship?</h4>

              <p>
                Message us for margins, onboarding,
                availability and bulk-supply details.
              </p>

              <div class="footer-distributor-actions">

                <a
                  class="btn footer-btn-primary"
                  target="_blank"
                  rel="noopener noreferrer"
                  href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I want distributorship details.') }}"
                >
                  <i class="bi bi-briefcase-fill"></i>
                  Distributorship
                </a>

                <a
                  class="btn footer-btn-secondary"
                  href="{{ route('contact') }}"
                >
                  <i class="bi bi-chat-dots-fill"></i>
                  Enquire
                </a>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
    <!-- ===================== MAIN FOOTER GRID END ===================== -->


    <!-- ===================== FOOTER BOTTOM ===================== -->
    <div class="footer-bottom">

      <div class="footer-copy">
        © <span id="footerYear">2026</span> FlyDayz.
        All Rights Reserved.
      </div>

      <div class="footer-visitor">
        <i class="bi bi-eye-fill"></i>
        <span>Total Visitors :</span>
        <strong id="visitorCount">000000</strong>
      </div>

      <div class="footer-social">

        <a
          class="social-btn"
          href="{{ $websiteSettings->phone_url }}"
          aria-label="Call FlyDayz"
        >
          <i class="bi bi-telephone-fill"></i>
        </a>

        <a
          class="social-btn whatsapp"
          target="_blank"
          rel="noopener noreferrer"
          href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I want to know more about your products.') }}"
          aria-label="WhatsApp FlyDayz"
        >
          <i class="bi bi-whatsapp"></i>
        </a>

        @if($websiteSettings->instagram_url)
          <a class="social-btn" target="_blank" rel="noopener noreferrer" href="{{ $websiteSettings->instagram_url }}" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
          </a>
        @endif

        @if($websiteSettings->facebook_url)
          <a class="social-btn" target="_blank" rel="noopener noreferrer" href="{{ $websiteSettings->facebook_url }}" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
          </a>
        @endif

        @if($websiteSettings->linkedin_url)
          <a class="social-btn" target="_blank" rel="noopener noreferrer" href="{{ $websiteSettings->linkedin_url }}" aria-label="LinkedIn">
            <i class="bi bi-linkedin"></i>
          </a>
        @endif

      </div>

    </div>
    <!-- ===================== FOOTER BOTTOM END ===================== -->

  </div>

</footer>
<!-- ===================== FLYDAYZ ULTRA PREMIUM FOOTER END ===================== -->



  <!-- ===================== BACK TO TOP BUTTON ===================== -->
  <button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">
    <i class="bi bi-arrow-up"></i>
  </button>
  <!-- ===================== BACK TO TOP BUTTON END ===================== -->

  <!-- ===================== FLOATING WHATSAPP BUTTON ===================== -->
  <a class="wa-float" target="_blank"
    href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I want to know more about your products.') }}"
    aria-label="Chat with FlyDayz on WhatsApp">
    <span class="wa-tooltip">Chat on WhatsApp</span>
    <span class="wa-icon">
      <i class="bi bi-whatsapp"></i>
    </span>
  </a>
  <!-- ===================== FLOATING WHATSAPP BUTTON END ===================== -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @php
    $frontendSettings = [
      'name' => $websiteSettings->website_name,
      'phone' => $websiteSettings->primary_phone,
      'phoneUrl' => $websiteSettings->phone_url,
      'email' => $websiteSettings->email,
      'whatsappNumber' => preg_replace('/\D+/', '', (string) $websiteSettings->whatsapp_number),
      'logoUrl' => $websiteSettings->header_logo_url,
      'footerDescription' => $websiteSettings->footer_description,
      'copyright' => $websiteSettings->copyright_text,
    ];
  @endphp
  <script>
    window.flydayzSettings = {!! json_encode($frontendSettings, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!};
    document.addEventListener('DOMContentLoaded', function () {
      const settings = window.flydayzSettings;
      document.querySelectorAll('a[href^="tel:"]').forEach(link => link.href = settings.phoneUrl);
      document.querySelectorAll('a[href*="wa.me/"]').forEach(link => {
        try {
          const whatsappLink = new URL(link.href);
          whatsappLink.pathname = '/' + settings.whatsappNumber;
          link.href = whatsappLink.toString();
        } catch (error) {}
      });
      document.querySelectorAll('a[href^="mailto:"]').forEach(link => link.href = 'mailto:' + (settings.email || ''));
      document.querySelectorAll('img[src*="assets/images/hero/logo.png"]').forEach(image => image.src = settings.logoUrl);
      const footerAbout = document.querySelector('.footer-about');
      if (footerAbout && settings.footerDescription) footerAbout.textContent = settings.footerDescription;
      const footerCopy = document.querySelector('.footer-copy');
      if (footerCopy && settings.copyright) footerCopy.textContent = settings.copyright;
    });
  </script>
  @if($websiteSettings->google_analytics_code){!! $websiteSettings->google_analytics_code !!}@endif
  @if($websiteSettings->google_tag_manager_code){!! $websiteSettings->google_tag_manager_code !!}@endif
  @if($websiteSettings->facebook_pixel_code){!! $websiteSettings->facebook_pixel_code !!}@endif
  @if($websiteSettings->schema_json)<script type="application/ld+json">{!! $websiteSettings->schema_json !!}</script>@endif

</body>

</html>
