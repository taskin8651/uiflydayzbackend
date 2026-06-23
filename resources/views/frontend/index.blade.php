
@extends('frontend.master')
@section('content')

  <!-- ===================== FLYDAYZ PREMIUM HERO SECTION ===================== -->
  <section id="home" class="hero-premium">

    <!-- Background Shapes -->
    <div class="hero-bg-shape shape-one"></div>
    <div class="hero-bg-shape shape-two"></div>
    <div class="hero-bg-shape shape-three"></div>

    <!-- Premium Floating Decor -->
    <div class="hero-decor-layer" aria-hidden="true">

      <!-- Cotton -->
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-cotton cotton-one" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-cotton cotton-two" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-cotton cotton-three" alt="">

      <!-- Petals -->
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-petal petal-one" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-petal petal-two" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-petal petal-three" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-petal petal-four" alt="">

      <!-- Pad Outlines -->
      <img src="assets/images/decor/pad-outline-1.png" class="hero-decor hero-pad-outline pad-outline-one" alt="">
      <img src="assets/images/decor/pad-outline-2.png" class="hero-decor hero-pad-outline pad-outline-two" alt="">

    </div>

    <div class="hero-slider-window">
      <div class="hero-slider-track">

        <!-- SLIDE 1 -->
        <div class="hero-slide is-active">
          <div class="container">
            <div class="hero-slide-grid">

              <!-- LEFT CONTENT -->
              <div class="hero-slide-content">

                <div class="hero-kicker">
                  <span><i class="bi bi-shield-check"></i></span>
                  Premium Hygienic Protection
                </div>

                <h1 class="hero-headline">
                  Gentle Care for
                  <span class="headline-accent">
                    Confident Days
                    <span class="headline-shine" aria-hidden="true"></span>
                  </span>
                </h1>

                <p class="hero-lead">
                  FlyDayz sanitary pads are designed for soft comfort, quick absorption, and dependable protection to
                  help women feel fresh, secure, and confident every day.
                </p>

                <div class="hero-feature-row">
                  <div class="hero-feature-card">
                    <i class="bi bi-droplet-half"></i>
                    <div>
                      <strong>Quick Absorption</strong>
                      <small>Fast dry feel</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-feather"></i>
                    <div>
                      <strong>Soft Comfort</strong>
                      <small>Gentle on skin</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-shield-lock"></i>
                    <div>
                      <strong>Leak Guard</strong>
                      <small>Secure protection</small>
                    </div>
                  </div>
                </div>

                <div class="hero-btns">
                  <a class="hero-btn-primary" href="{{ route('products') }}">
                    Explore Products
                    <i class="bi bi-arrow-right-short"></i>
                  </a>

                  <a class="hero-btn-secondary" href="{{ route('technology') }}">
                    See Technology
                  </a>
                </div>

                <div class="hero-bottom-note">
                  <span class="note-dot"></span>
                  Designed for modern feminine hygiene and everyday confidence.
                </div>

              </div>

              <!-- RIGHT PRODUCT -->
              <div class="hero-pack-wrapper">
                <div class="product-premium-card product-card-purple">

                  <div class="product-holo-bg"></div>
                  <div class="product-neon-grid"></div>
                  <div class="product-orbit orbit-one"></div>
                  <div class="product-orbit orbit-two"></div>

                  <div class="product-card-top">
                    <span>FlyDayz Premium Care</span>
                    <strong>5 in 1 Protection</strong>
                  </div>

                  <div class="product-img-wrap">
                    <span class="product-aura aura-one"></span>
                    <span class="product-aura aura-two"></span>

                    <img src="assets/images/products/product2.png" class="hero-pack-img"
                      alt="FlyDayz Premium Sanitary Pad Pack">
                  </div>

                  <div class="product-floating-pill pill-one">
                    <i class="bi bi-stars"></i>
                    Soft Touch
                  </div>

                  <div class="product-floating-pill pill-two">
                    <i class="bi bi-droplet-half"></i>
                    Fast Absorb
                  </div>

                  <div class="product-premium-strip">
                    <div>
                      <i class="bi bi-shield-check"></i>
                      <span>BIS Approved</span>
                    </div>
                    <div>
                      <i class="bi bi-clock-history"></i>
                      <span>Up to 12 Hrs</span>
                    </div>
                    <div>
                      <i class="bi bi-patch-check"></i>
                      <span>Medical Grade</span>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="hero-slide">
          <div class="container">
            <div class="hero-slide-grid">

              <!-- LEFT CONTENT -->
              <div class="hero-slide-content">

                <div class="hero-kicker">
                  <span><i class="bi bi-droplet-half"></i></span>
                  Super Gel Lock Protection
                </div>

                <h1 class="hero-headline">
                  Fresh Comfort for
                  <span class="headline-accent">
                    Heavy Flow Care
                    <span class="headline-shine" aria-hidden="true"></span>
                  </span>
                </h1>

                <p class="hero-lead">
                  Built for active routines, FlyDayz helps provide quick absorption, soft comfort, and reliable
                  protection when extra care matters most.
                </p>

                <div class="hero-feature-row">
                  <div class="hero-feature-card">
                    <i class="bi bi-lightning-charge"></i>
                    <div>
                      <strong>Fast Lock</strong>
                      <small>Quick absorb layer</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-wind"></i>
                    <div>
                      <strong>Fresh Feel</strong>
                      <small>Comfortable wear</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-heart"></i>
                    <div>
                      <strong>Gentle Care</strong>
                      <small>Skin friendly feel</small>
                    </div>
                  </div>
                </div>

                <div class="hero-btns">
                  <a class="hero-btn-primary" href="{{ route('products') }}">
                    Shop Now
                    <i class="bi bi-arrow-right-short"></i>
                  </a>

                  <a class="hero-btn-secondary" href="{{ route('whychoose') }}">
                    Why FlyDayz
                  </a>
                </div>

                <div class="hero-bottom-note">
                  <span class="note-dot"></span>
                  Comfort, freshness, and confidence for busy days.
                </div>

              </div>

              <!-- RIGHT PRODUCT -->
              <div class="hero-pack-wrapper">
                <div class="product-premium-card product-card-blue">

                  <div class="product-holo-bg"></div>
                  <div class="product-neon-grid"></div>
                  <div class="product-orbit orbit-one"></div>
                  <div class="product-orbit orbit-two"></div>

                  <div class="product-card-top">
                    <span>Advanced Flow Care</span>
                    <strong>Heavy Flow Support</strong>
                  </div>

                  <div class="product-img-wrap">
                    <span class="product-aura aura-one"></span>
                    <span class="product-aura aura-two"></span>

                    <img src="assets/images/products/product1.png" class="hero-pack-img"
                      alt="FlyDayz Heavy Flow Sanitary Pad Pack">
                  </div>

                  <div class="product-floating-pill pill-one">
                    <i class="bi bi-shield-check"></i>
                    Leak Guard
                  </div>

                  <div class="product-floating-pill pill-two">
                    <i class="bi bi-droplet"></i>
                    Gel Lock
                  </div>

                  <div class="product-premium-strip">
                    <div>
                      <i class="bi bi-lightning-charge"></i>
                      <span>Fast Lock</span>
                    </div>
                    <div>
                      <i class="bi bi-droplet-half"></i>
                      <span>Gel Core</span>
                    </div>
                    <div>
                      <i class="bi bi-shield-lock"></i>
                      <span>Leak Guard</span>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- SLIDE 3 -->
        <div class="hero-slide">
          <div class="container">
            <div class="hero-slide-grid">

              <!-- LEFT CONTENT -->
              <div class="hero-slide-content">

                <div class="hero-kicker">
                  <span><i class="bi bi-moon-stars"></i></span>
                  Premium Night Care
                </div>

                <h1 class="hero-headline">
                  Peaceful Nights,
                  <span class="headline-accent">
                    Confident Mornings
                    <span class="headline-shine" aria-hidden="true"></span>
                  </span>
                </h1>

                <p class="hero-lead">
                  Longer coverage and soft comfort help you rest better with dependable overnight protection and a
                  premium hygiene experience.
                </p>

                <div class="hero-feature-row">
                  <div class="hero-feature-card">
                    <i class="bi bi-moon"></i>
                    <div>
                      <strong>Night Care</strong>
                      <small>Longer coverage</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-shield-lock"></i>
                    <div>
                      <strong>Secure Fit</strong>
                      <small>Reliable support</small>
                    </div>
                  </div>

                  <div class="hero-feature-card">
                    <i class="bi bi-stars"></i>
                    <div>
                      <strong>Premium Feel</strong>
                      <small>Soft experience</small>
                    </div>
                  </div>
                </div>

                <div class="hero-btns">
                  <a class="hero-btn-primary" href="{{ route('products') }}">
                    View Range
                    <i class="bi bi-arrow-right-short"></i>
                  </a>

                  <a class="hero-btn-secondary" href="{{ route('contact') }}">
                    Contact Us
                  </a>
                </div>

                <div class="hero-bottom-note">
                  <span class="note-dot"></span>
                  Made for peaceful sleep and confident mornings.
                </div>

              </div>

              <!-- RIGHT PRODUCT -->
              <div class="hero-pack-wrapper">
                <div class="product-premium-card product-card-night">

                  <div class="product-holo-bg"></div>
                  <div class="product-neon-grid"></div>
                  <div class="product-orbit orbit-one"></div>
                  <div class="product-orbit orbit-two"></div>

                  <div class="product-card-top">
                    <span>Night Comfort</span>
                    <strong>All Night Care</strong>
                  </div>

                  <div class="product-img-wrap">
                    <span class="product-aura aura-one"></span>
                    <span class="product-aura aura-two"></span>

                    <img src="assets/images/products/product4.png" class="hero-pack-img"
                      alt="FlyDayz Night Care Sanitary Pad Pack">
                  </div>

                  <div class="product-floating-pill pill-one">
                    <i class="bi bi-moon-stars"></i>
                    Night Care
                  </div>

                  <div class="product-floating-pill pill-two">
                    <i class="bi bi-heart-pulse"></i>
                    Comfort Fit
                  </div>

                  <div class="product-premium-strip">
                    <div>
                      <i class="bi bi-moon-stars"></i>
                      <span>Night Care</span>
                    </div>
                    <div>
                      <i class="bi bi-clock-history"></i>
                      <span>Long Wear</span>
                    </div>
                    <div>
                      <i class="bi bi-heart-pulse"></i>
                      <span>Comfort Fit</span>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- ARROWS -->
    <button class="hero-arrow hero-prev" type="button" aria-label="Previous slide">
      <i class="bi bi-arrow-left"></i>
    </button>

    <button class="hero-arrow hero-next" type="button" aria-label="Next slide">
      <i class="bi bi-arrow-right"></i>
    </button>

    <!-- DOTS -->
    <div class="hero-slider-dots"></div>

  </section>
  <!-- ===================== FLYDAYZ PREMIUM HERO SECTION END ===================== -->




  <!-- ===================== PRODUCT SIZE PREMIUM GRID ===================== -->
  <section id="products-size" class="section product-section">

    <div class="size-section-glow glow-left"></div>
    <div class="size-section-glow glow-right"></div>

    <div class="container">

      <!-- SECTION HEADER -->
      <div class="product-size-header">

        <div class="product-size-heading">
          <div class="section-kicker">
            <span><i class="bi bi-grid-3x3-gap-fill"></i></span>
            Size-Wise Collection
          </div>

          <h2 class="product-size-title">
            Find Your Perfect Size
          </h2>

          <p class="product-size-subtitle">
            Choose the right FlyDayz pad for heavy flow, very heavy flow, daily confidence,
            and extra coverage protection.
          </p>
        </div>

        <div class="product-size-badge">
          <strong>3</strong>
          <span>Premium Variants</span>
        </div>

      </div>

      <!-- PRODUCT GRID -->
      @if(isset($productSizeCategories) && $productSizeCategories->count())
    <div class="product-size-grid">

        @foreach($productSizeCategories as $index => $category)
            @php
                $product = \App\Models\Product::where('status', true)
                    ->where('product_size_category_id', $category->id)
                    ->orderBy('sort_order')
                    ->first();

                $image = $product && $product->getFirstMediaUrl('product_main_image')
                    ? $product->getFirstMediaUrl('product_main_image')
                    : asset('assets/images/products/product.png');
            @endphp

            <article class="product-size-card">
                <div class="product-card-top">
                    <span class="product-serial">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>

                <div class="product-media">
                    <img src="{{ $image }}" alt="{{ $category->name }}">
                </div>

                <div class="product-body">
                    <div class="product-spec-row">
                        <div>
                            <small>Size</small>
                            <strong>{{ $category->size_label ?: $category->name }}</strong>
                        </div>

                        <div>
                            <small>Flow</small>
                            <strong>{{ $category->flow_label ?: 'Normal' }}</strong>
                        </div>
                    </div>

                    <div class="absorption-box {{ $category->absorption_type ?: 'normal' }}">
                        <div class="absorption-labels">
                            <span>Normal</span>
                            <span>Heavy Flow</span>
                            <span>Very Heavy</span>
                        </div>

                        <div class="absorption-track">
                            <span></span>
                            <i></i>
                        </div>

                        <div class="absorption-text">
                            {{ $category->flow_label ?: 'Normal Flow' }}
                        </div>
                    </div>

                    <div class="product-actions">
                        <a class="btn btn-brand btn-sm flex-grow-1"
                           href="{{ route('products') }}?size={{ $category->slug }}">
                            View More
                        </a>
                    </div>
                </div>
            </article>
        @endforeach

    </div>
@endif

    </div>
  </section>
  <!-- ===================== PRODUCT SIZE PREMIUM GRID END ===================== -->



  <!-- ===================== FLYDAYZ PRODUCT TYPE ULTRA PREMIUM ===================== -->
  <section id="products-type" class="product-type-premium">
    <div class="container">

      <div class="product-type-heading">
        <div class="product-type-kicker">
          <span><i class="bi bi-stars"></i></span>
          Product Collection
        </div>

        <h2>Choose Your Protection Type</h2>
        <p>
          Explore FlyDayz premium sanitary pad categories designed for comfort, freshness, and dependable hygiene care.
        </p>
      </div>

      @if(isset($protectionTypes) && $protectionTypes->count())
    <div class="product-type-grid">

        @foreach($protectionTypes as $type)
            @php
                $icon = $type->slug === 'ultra-thin-napkins' || $type->slug === 'ultra-thin-napkin'
                    ? 'bi bi-feather'
                    : 'bi bi-shield-check';

                $image = $type->getFirstMediaUrl('protection_type_image')
                    ?: asset('assets/images/products/product.png');

                $points = array_filter([
                    $type->point_one,
                    $type->point_two,
                    $type->point_three,
                ]);
            @endphp

            <article class="product-type-card {{ $type->is_alt ? 'product-type-card-alt' : '' }}">
                <div class="product-type-glow"></div>

                <div class="product-type-content">
                    <div class="product-type-badge">
                        <i class="{{ $icon }}"></i>
                        {{ $type->badge_text ?: 'Everyday Protection' }}
                    </div>

                    <h3>{{ $type->title }}</h3>

                    @if($type->description)
                        <p>{{ $type->description }}</p>
                    @endif

                    @if(count($points))
                        <ul class="product-type-points">
                            @foreach($points as $point)
                                <li>
                                    <i class="bi bi-check2"></i>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('products') }}?protection={{ $type->slug }}" class="product-type-btn">
                        View Products
                        <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>

                <div class="product-type-visual">
                    <div class="product-type-circle"></div>

                    <img src="{{ $image }}"
                         alt="{{ $type->title }}"
                         class="product-type-img">

                    <img src="{{ asset('assets/images/decor/pad-outline-2.png') }}"
                         alt=""
                         class="product-type-decor">
                </div>
            </article>
        @endforeach

    </div>
@endif

    </div>
  </section>
  <!-- ===================== FLYDAYZ PRODUCT TYPE ULTRA PREMIUM END ===================== -->


  <!-- ===================== FEATURES ULTRA PREMIUM ===================== -->
  <section id="features" class="section features-premium">

    <div class="feature-bg-glow glow-one"></div>
    <div class="feature-bg-glow glow-two"></div>
    <div class="feature-bg-glow glow-three"></div>

    <div class="container position-relative">

      <div class="row align-items-center g-4 g-lg-5">

        <!-- LEFT CONTENT -->
        <div class="col-lg-6">

          <div class="feature-section-kicker">
            <span><i class="bi bi-stars"></i></span>
            Technology You Can Feel
          </div>

          <h2 class="feature-main-title">
            Comfort Technology <span>That Works</span>
          </h2>

          <p class="feature-main-text">
            Every FlyDayz pad is crafted with comfort-first layers that help deliver softness,
            fast absorption, freshness, and reliable leak protection for everyday confidence.
          </p>

          <div class="feature-grid">

            <div class="feature-card feature-card-two">
              <div class="feature-card-shine"></div>

              <div class="feature-ic">
                <i class="bi bi-feather"></i>
              </div>

              <div class="feature-body">
                <div class="feature-meta">Layer 01</div>
                <div class="feature-title">Feather Top Sheet</div>
                <p class="feature-desc">
                  Soft-touch surface designed to feel gentle on the skin.
                </p>
              </div>
            </div>

            <div class="feature-card feature-card-one">
              <div class="feature-card-shine"></div>

              <div class="feature-ic">
                <i class="bi bi-droplet-fill"></i>
              </div>

              <div class="feature-body">
                <div class="feature-meta">Tech 02</div>
                <div class="feature-title">3D Super Gel Lock</div>
                <p class="feature-desc">
                  Helps lock wetness quickly for a dry and comfortable feel.
                </p>
              </div>
            </div>


            <div class="feature-card feature-card-three">
              <div class="feature-card-shine"></div>

              <div class="feature-ic">
                <i class="bi bi-clock-history"></i>
              </div>

              <div class="feature-body">
                <div class="feature-meta">Care 03</div>
                <div class="feature-title">Up to 12 Hrs Protection</div>
                <p class="feature-desc">
                  Designed for long-lasting comfort and dependable protection.
                </p>
              </div>
            </div>

            <div class="feature-card feature-card-four">
              <div class="feature-card-shine"></div>

              <div class="feature-ic">
                <i class="fa-solid fa-flask"></i>
              </div>

              <div class="feature-body">
                <div class="feature-meta">Trust 04</div>
                <div class="feature-title">Clinically Tested</div>
                <p class="feature-desc">
                  Made with hygiene-focused care for trusted everyday use.
                </p>
              </div>
            </div>

          </div>

          <div class="feature-actions">
            <a class="btn feature-btn-primary" href="{{ route('products') }}">
              <i class="bi bi-bag-heart me-2"></i>
              Explore Products
            </a>

            <a class="btn feature-btn-secondary" target="_blank"
              href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20to%20know%20more%20about%20FlyDayz%20technology.">
              <i class="bi bi-whatsapp me-2"></i>
              Ask on WhatsApp
            </a>
          </div>

        </div>

        <!-- RIGHT VISUAL -->
        <div class="col-lg-6">

          <div class="feature-showcase">

            <div class="showcase-top">
              <div class="showcase-label">
                <span>5 in 1</span>
                <strong>Protection System</strong>
              </div>

              <div class="showcase-mini-pill">
                <i class="bi bi-patch-check-fill"></i>
                Premium Care
              </div>
            </div>

            <div class="showcase-stage">
              <div class="showcase-orbit orbit-one"></div>
              <div class="showcase-orbit orbit-two"></div>

              <img src="assets/images/decor/pad-outline-1.png" class="showcase-pad-bg" alt="">
              <img src="assets/images/products/product1.png" class="showcase-pack" alt="FlyDayz Premium Pack">

              <div class="floating-tech-pill tech-pill-one">
                <i class="bi bi-droplet-half"></i>
                Gel Lock
              </div>

              <div class="floating-tech-pill tech-pill-two">
                <i class="bi bi-feather"></i>
                Soft Touch
              </div>

              <div class="floating-tech-pill tech-pill-three">
                <i class="bi bi-shield-check"></i>
                Leak Guard
              </div>
            </div>

            <!-- PREMIUM FLOW METER -->
            <div class="showcase-bottom">
              <div class="premium-flow-meter">

                <div class="premium-flow-labels">
                  <span>Light</span>
                  <span>Moderate</span>
                  <span>Very Heavy Flow</span>
                </div>

                <div class="premium-flow-track">
                  <span class="premium-flow-fill"></span>
                  <span class="premium-flow-pointer"></span>
                </div>

              </div>
            </div>

          </div>

        </div>

      </div>

    </div>
  </section>
  <!-- ===================== FEATURES ULTRA PREMIUM END ===================== -->




  <!-- ===================== WHY FLYDAYZ ULTRA PREMIUM ===================== -->
  <section id="why" class="section why-premium">

    <div class="why-bg-glow why-glow-one"></div>
    <div class="why-bg-glow why-glow-two"></div>
    <div class="why-bg-glow why-glow-three"></div>

    <div class="container position-relative">

      <!-- SECTION HEADER -->
      <div class="why-section-header text-center">

        <div class="why-section-kicker">
          <span><i class="bi bi-stars"></i></span>
          Why Women Choose FlyDayz
        </div>

        <h2 class="why-main-title">
          5 in 1 Premium Protection
        </h2>

        <p class="why-main-subtitle">
          FlyDayz is thoughtfully designed with comfort, hygiene, absorption, odour control,
          and wider coverage support for confident everyday protection.
        </p>

      </div>

      <!-- 5 IN 1 FEATURE CARDS -->
     @if(isset($techPillars) && $techPillars->count())

    <div class="row g-4 why-card-row row-cols-1 row-cols-sm-2 row-cols-lg-5">

        @foreach($techPillars as $index => $pillar)

            @php
                $fallbackIcons = [
                    asset('assets/images/ICON-1.png'),
                    asset('assets/images/ICON-2.png'),
                    asset('assets/images/ICON3.png'),
                    asset('assets/images/ICON4.png'),
                    asset('assets/images/ICON5.png'),
                ];

                $icon = $pillar->getFirstMediaUrl('tech_pillar_icon')
                    ?: ($fallbackIcons[$index] ?? asset('assets/images/ICON-1.png'));

                $number = $pillar->number ?: str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            @endphp

            <div class="col">
                <div class="why-card {{ $pillar->is_featured ? 'active' : '' }}">

                    <div class="why-card-number">
                        {{ $number }}
                    </div>

                    <div class="why-icon-img-wrap">
                        <img src="{{ $icon }}"
                             class="why-icon-img"
                             alt="{{ $pillar->icon_alt ?: $pillar->title }}">
                    </div>

                    <div class="why-title-sm">
                        {{ $pillar->title }}
                    </div>

                    @if($pillar->description)
                        <div class="why-text">
                            {{ $pillar->description }}
                        </div>
                    @endif

                </div>
            </div>

        @endforeach

    </div>

@else

    <div class="text-center py-5">
        <p class="mb-0">No technology features found.</p>
    </div>

@endif

      <!-- 5 IN 1 TRUST STRIP -->
      <div class="why-protection-strip">

        <div class="why-strip-features">

          <div class="why-strip-item">
            <img src="assets/images/ICON-1.png" alt="Fragrance Free">
            <span>Fragrance<br>Free</span>
          </div>

          <div class="why-strip-item">
            <img src="assets/images/ICON-2.png" alt="Longer and Wider Wings">
            <span>Longer & Wider<br>Wings</span>
          </div>

          <div class="why-strip-item">
            <img src="assets/images/ICON3.png" alt="3X Absorption">
            <span>3X<br>Absorption</span>
          </div>

          <div class="why-strip-item">
            <img src="assets/images/ICON4.png" alt="Medical Grade Non-Printed Topsheet">
            <span>Medical Grade<br>Non-Printed Topsheet</span>
          </div>

          <div class="why-strip-item">
            <img src="assets/images/ICON5.png" alt="Prevents Odour">
            <span>Prevents<br>Odour</span>
          </div>

        </div>

        <div class="why-strip-badge">
          <span>5 in 1</span>
          <small>Protection</small>
        </div>

      </div>

      <!-- BOTTOM CTA -->
      <div class="why-cta">

        <div class="why-cta-content">
          <div class="why-cta-badge">
            <i class="bi bi-stars"></i>
            Premium Feminine Hygiene
          </div>

          <h3>Ready to experience better comfort?</h3>

          <p>
            Explore the full FlyDayz range and choose the right pad for your daily,
            heavy flow, and night-care needs.
          </p>
        </div>

        <div class="why-cta-actions">
          <a class="btn why-btn-primary" href="{{ route('products') }}">
            <i class="bi bi-bag-heart me-2"></i>
            Explore Products
          </a>

          <a class="btn why-btn-secondary" target="_blank"
            href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20more%20details.">
            <i class="bi bi-whatsapp me-2"></i>
            WhatsApp
          </a>
        </div>

      </div>

    </div>
  </section>
  <!-- ===================== WHY FLYDAYZ ULTRA PREMIUM END ===================== -->


  <!-- ===================== FLYDAYZ CERTIFICATION ULTRA PREMIUM ===================== -->
  <section id="certifications" class="certification-premium">

    <div class="cert-bg-glow cert-glow-one"></div>
    <div class="cert-bg-glow cert-glow-two"></div>
    <div class="cert-bg-glow cert-glow-three"></div>

    <div class="container position-relative">

      <div class="certification-wrap">

        <!-- LEFT CONTENT -->
        <div class="certification-content">

          <div class="cert-section-kicker">
            <span><i class="bi bi-patch-check-fill"></i></span>
            Trusted Quality Standards
          </div>

          <h2 class="cert-main-title">
            Certified Care You Can Trust
          </h2>

          <p class="cert-main-text">
            FlyDayz follows recognized quality and hygiene standards to deliver dependable,
            safe, and premium feminine hygiene products for everyday confidence.
          </p>

          <a href="{{ route('certificates') }}" class="cert-btn">
            View Certificates
            <i class="bi bi-arrow-right-short"></i>
          </a>

        </div>

        <!-- CERTIFICATION CARDS -->
        @if(isset($certificateItems) && $certificateItems->count())

    <div class="certification-grid">

        @foreach($certificateItems as $index => $certificate)

            @php
                $fallbackLogos = [
                    asset('assets/images/certificates/iso-9001.png'),
                    asset('assets/images/certificates/gmp.png'),
                    asset('assets/images/certificates/nabl.png'),
                    asset('assets/images/certificates/isi.png'),
                ];

                $logo = $certificate->getFirstMediaUrl('certificate_logo')
                    ?: ($fallbackLogos[$index] ?? asset('assets/images/certificates/iso-9001.png'));

                $altText = $certificate->category_label
                    ?: $certificate->title
                    ?: 'Certification';
            @endphp

            <div class="cert-card {{ $certificate->is_featured ? 'active' : '' }}">

                <div class="cert-icon-wrap">
                    <img src="{{ $logo }}"
                         alt="{{ $altText }}">
                </div>

                <div class="cert-card-body">
                    <h3>{{ $certificate->title }}</h3>

                    @if($certificate->description)
                        <p>{{ $certificate->description }}</p>
                    @elseif($certificate->category_label)
                        <p>{{ $certificate->category_label }}</p>
                    @else
                        <p>{{ $certificate->file_type ?: 'Certification Standard' }}</p>
                    @endif
                </div>

                <div class="cert-card-mark">
                    <i class="{{ $certificate->status_icon ?: 'bi bi-check2-circle' }}"></i>
                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="text-center py-5">
        <p class="mb-0">No certifications available.</p>
    </div>

@endif

      </div>

    </div>
  </section>
  <!-- ===================== FLYDAYZ CERTIFICATION ULTRA PREMIUM END ===================== -->

  <!-- ===================== REVIEWS ULTRA PREMIUM SLIDER ===================== -->
  <section id="reviews" class="section reviews-premium">

    <div class="review-bg-glow review-glow-one"></div>
    <div class="review-bg-glow review-glow-two"></div>
    <div class="review-bg-glow review-glow-three"></div>

    <div class="container position-relative">

      <!-- SECTION HEADER -->
      <div class="reviews-header">

        <div class="reviews-heading">
          <div class="reviews-kicker">
            <span><i class="bi bi-chat-quote"></i></span>
            Real Customer Feedback
          </div>

          <h2 class="reviews-main-title">
            Stories of Comfort & Confidence
          </h2>

          <p class="reviews-main-subtitle">
            Women love FlyDayz for its soft feel, reliable protection, freshness, and confidence through busy days and
            peaceful nights.
          </p>
        </div>

        <div class="reviews-controls">
          <button class="slider-btn" type="button" data-review-slide="prev" aria-label="Previous">
            <i class="bi bi-arrow-left"></i>
          </button>

          <button class="slider-btn" type="button" data-review-slide="next" aria-label="Next">
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>

      </div>

      <!-- REVIEW TRUST SUMMARY -->
      <div class="review-summary-strip">

        <div class="review-summary-card">
          <div class="summary-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <div>
            <strong>4.8/5 Rating</strong>
            <span>Based on customer feedback</span>
          </div>
        </div>

        <div class="review-summary-card">
          <div class="summary-icon">
            <i class="bi bi-patch-check-fill"></i>
          </div>
          <div>
            <strong>Verified Buyers</strong>
            <span>Real comfort experiences</span>
          </div>
        </div>

        <div class="review-summary-card">
          <div class="summary-icon">
            <i class="bi bi-heart-fill"></i>
          </div>
          <div>
            <strong>Trusted Comfort</strong>
            <span>Softness women recommend</span>
          </div>
        </div>

      </div>

      <!-- SLIDER -->
   @if(isset($reviewItems) && $reviewItems->count())

    <div class="review-slider" id="reviewSlider">

        @foreach($reviewItems as $review)

            @php
                $rating = (float) $review->rating;

                $firstLetter = strtoupper(substr($review->name, 0, 1));

                $tagIcon = 'bi bi-bag-heart';

                if ($review->product_tag) {
                    $tagLower = strtolower($review->product_tag);

                    if (str_contains($tagLower, 'cotton')) {
                        $tagIcon = 'bi bi-feather';
                    } elseif (str_contains($tagLower, 'xl') || str_contains($tagLower, 'night')) {
                        $tagIcon = 'bi bi-moon-stars';
                    } elseif (str_contains($tagLower, 'everyday')) {
                        $tagIcon = 'bi bi-stars';
                    }
                }
            @endphp

            <article class="review-card">

                <div class="quote-mark">
                    <i class="bi bi-quote"></i>
                </div>

                <div class="review-top">

                    <div class="review-user">

                        <div class="avatar">
                            {{ $firstLetter }}
                        </div>

                        <div class="review-user-info">

                            <div class="review-verified">
                                <i class="bi bi-patch-check-fill"></i>

                                <div class="review-name">
                                    {{ $review->name }}
                                </div>
                            </div>

                            <div class="review-designation">

                                <span>
                                    <i class="bi bi-person-heart"></i>
                                    {{ $review->buyer_label ?: 'Verified Buyer' }}
                                </span>

                                <span>
                                    <i class="bi bi-geo-alt-fill"></i>
                                    Patna, Bihar
                                </span>

                            </div>

                        </div>

                    </div>

                    <div class="review-stars" aria-label="{{ number_format($rating, 1) }} star rating">

                        @for($i = 1; $i <= 5; $i++)

                            @if($rating >= $i)
                                <i class="bi bi-star-fill"></i>
                            @elseif($rating >= ($i - 0.5))
                                <i class="bi bi-star-half"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif

                        @endfor

                    </div>

                </div>

                @if($review->message)
                    <p class="review-text">
                        “{{ $review->message }}”
                    </p>
                @endif

                <div class="review-meta">

                    @if($review->product_tag)
                        <span class="review-chip">
                            <i class="{{ $tagIcon }}"></i>
                            {{ $review->product_tag }}
                        </span>
                    @endif

                    @if($review->review_time)
                        <span class="review-date">
                            {{ $review->review_time }}
                        </span>
                    @endif

                </div>

            </article>

        @endforeach

    </div>

@else

    <div class="text-center py-5">
        <p class="mb-0">No customer reviews available.</p>
    </div>

@endif

      <!-- BOTTOM CTA -->
      <div class="reviews-bottom">

        <div class="reviews-bottom-content">
          <div class="reviews-bottom-badge">
            <i class="bi bi-heart-fill"></i>
            Your experience matters
          </div>

          <h3>Want to share your FlyDayz story?</h3>

          <p>
            Message us on WhatsApp and tell us how FlyDayz helped you feel comfortable, fresh, and confident.
          </p>

        </div>

        <a class="btn reviews-btn-primary" target="_blank"
          href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20to%20share%20my%20review.">
          <i class="bi bi-whatsapp me-2"></i>
          Send Review
        </a>

      </div>

    </div>
  </section>
  <!-- ===================== REVIEWS ULTRA PREMIUM SLIDER END ===================== -->





  <!-- ===================== FAQ ULTRA PREMIUM ===================== -->
  <section id="faqs" class="section faq-premium">

    <div class="faq-bg-glow faq-glow-one"></div>
    <div class="faq-bg-glow faq-glow-two"></div>
    <div class="faq-bg-glow faq-glow-three"></div>

    <div class="container position-relative">

      <!-- SECTION HEADER -->
      <div class="faq-section-header text-center">

        <div class="faq-section-kicker">
          <span><i class="bi bi-question-circle"></i></span>
          Quick Help & Guidance
        </div>

        <h2 class="faq-main-title">
          Answers for Better Care
        </h2>

        <p class="faq-main-subtitle">
          Find simple answers about FlyDayz pad sizes, comfort, usage, storage, leak protection, and availability.
        </p>

      </div>

      <!-- INTRO STRIP -->
      <div class="faq-help-card">

        <div class="faq-help-left">
          <div class="faq-help-icon">
            <i class="bi bi-chat-heart"></i>
          </div>

          <div>
            <h3>Need help choosing the right pad?</h3>
            <p>
              Tell us your flow type, usage time, and comfort preference. Our team can guide you quickly on WhatsApp.
            </p>
          </div>
        </div>

        <a class="btn faq-btn-primary" target="_blank"
          href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20need%20help%20choosing%20the%20right%20pad%20size.">
          <i class="bi bi-whatsapp me-2"></i>
          Ask on WhatsApp
        </a>

      </div>

  @if(isset($faqItems) && $faqItems->count())

    <div class="accordion faq-accordion" id="faqAccordion">

        @foreach($faqItems as $index => $faq)

            @php
                $faqId = 'homeFaq' . $faq->id;

                $isOpen = false;

                if ($faq->is_open) {
                    $isOpen = true;
                } elseif ($loop->first) {
                    $isOpen = true;
                }
            @endphp

            <div class="accordion-item faq-item">

                <h2 class="accordion-header">

                    <button class="accordion-button faq-question {{ $isOpen ? '' : 'collapsed' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#{{ $faqId }}"
                            aria-expanded="{{ $isOpen ? 'true' : 'false' }}">

                        <span class="faq-ic">
                            <i class="{{ $faq->question_icon ?: 'bi bi-question-circle' }}"></i>
                        </span>

                        <span class="faq-question-text">
                            {{ $faq->question }}
                        </span>

                    </button>

                </h2>

                <div id="{{ $faqId }}"
                     class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body faq-answer">
                        {!! $faq->answer !!}
                    </div>

                </div>

            </div>

        @endforeach

    </div>

@else

    <div class="text-center py-5">
        <p class="mb-0">No FAQs available.</p>
    </div>

@endif

      <!-- BOTTOM CTA -->
      <div class="faq-bottom-card">

        <div class="faq-bottom-content">
          <div class="faq-bottom-badge">
            <i class="bi bi-stars"></i>
            Still Need Help?
          </div>

          <h3>Have more questions about FlyDayz?</h3>

          <p>
            Chat with our team for product guidance, size selection, availability, and distributorship enquiries.
          </p>
        </div>

        <a class="btn faq-btn-primary" target="_blank"
          href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20have%20a%20question%20about%20FlyDayz%20pads.">
          <i class="bi bi-whatsapp me-2"></i>
          Chat Now
        </a>

      </div>

    </div>
  </section>
  <!-- ===================== FAQ ULTRA PREMIUM END ===================== -->



  <!-- ===================== CONTACT & DISTRIBUTORSHIP ULTRA PREMIUM ===================== -->
  <section id="contact" class="section contact-premium">

    <div class="contact-bg-glow contact-glow-one"></div>
    <div class="contact-bg-glow contact-glow-two"></div>
    <div class="contact-bg-glow contact-glow-three"></div>

    <div class="container position-relative">

      <div class="row align-items-center g-4 g-lg-5">

        <!-- LEFT SIDE -->
        <div class="col-lg-6">

          <div class="contact-section-kicker">
            <span><i class="bi bi-briefcase"></i></span>
            Distributorship & Business Enquiry
          </div>

          <h2 class="contact-main-title">
            Partner With FlyDayz
          </h2>

          <p class="contact-main-text">
            Join hands with FlyDayz and become part of a growing feminine hygiene brand.
            We are looking for reliable distributors and business partners to expand across regions.
          </p>

          <div class="contact-benefit-grid">

            <div class="contact-benefit-card">
              <i class="bi bi-box-seam"></i>
              <div>
                <strong>Bulk Order Support</strong>
                <span>For distributors and retailers</span>
              </div>
            </div>

            <div class="contact-benefit-card">
              <i class="bi bi-graph-up-arrow"></i>
              <div>
                <strong>Growing Market</strong>
                <span>High-demand hygiene category</span>
              </div>
            </div>

            <div class="contact-benefit-card">
              <i class="bi bi-patch-check"></i>
              <div>
                <strong>Premium Product</strong>
                <span>Soft comfort and reliable protection</span>
              </div>
            </div>

            <div class="contact-benefit-card">
              <i class="bi bi-headset"></i>
              <div>
                <strong>Quick Assistance</strong>
                <span>Support through call and WhatsApp</span>
              </div>
            </div>

          </div>

          <div class="contact-actions">

            <a class="btn contact-btn-primary" href="tel:7209770033">
              <i class="bi bi-telephone me-2"></i>
              Call 7209770033
            </a>

            <a class="btn contact-btn-secondary" target="_blank"
              href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20am%20interested%20in%20distributorship.">
              <i class="bi bi-whatsapp me-2"></i>
              WhatsApp
            </a>

          </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-6">

          <div class="contact-business-card">

            <div class="contact-card-header">

              <div>
                <div class="contact-card-label">
                  Business Support
                </div>

                <h3>
                  Start Your Partnership
                </h3>
              </div>

              <div class="contact-card-icon">
                <i class="bi bi-shop-window"></i>
              </div>

            </div>

            <!-- CONTACT NUMBER -->
            <div class="contact-number-box">

              <div class="number-label">
                <img src="assets/images/call.png" alt="Call FlyDayz" class="contact-call-img">
              </div>

              <a href="tel:7209770033" class="contact-number">
                7209770033
              </a>

              <p>
                Available for distributorship enquiries, bulk orders,
                and product availability.
              </p>

            </div>

            <!-- CALLING HOURS -->
            <div class="contact-timing-card">

              <div class="contact-timing-head">

                <div class="contact-timing-icon">
                  <i class="bi bi-clock-history"></i>
                </div>

                <div class="contact-timing-title">
                  <span>Calling Hours</span>
                  <h4>Our Team Is Available</h4>
                </div>

                <div class="contact-open-badge">
                  <span></span>
                  Open Daily
                </div>

              </div>

              <div class="contact-timing-grid">

                <div class="contact-timing-item">

                  <div class="timing-item-icon">
                    <i class="bi bi-calendar-week"></i>
                  </div>

                  <div>
                    <span>Working Days</span>
                    <strong>Monday to Sunday</strong>
                  </div>

                </div>

                <div class="contact-timing-item">

                  <div class="timing-item-icon">
                    <i class="bi bi-clock"></i>
                  </div>

                  <div>
                    <span>Calling Time</span>
                    <strong>10:00 AM – 05:00 PM</strong>
                  </div>

                </div>

              </div>

              <div class="contact-holiday-note">
                <i class="bi bi-info-circle-fill"></i>
                <span>Closed on Government Holidays</span>
              </div>

            </div>

            <!-- SUPPORT PILLS -->
            <div class="contact-card-pills">

              <span>
                <i class="bi bi-check-circle-fill"></i>
                Fast Response
              </span>

              <span>
                <i class="bi bi-check-circle-fill"></i>
                Customer Support
              </span>

              <span>
                <i class="bi bi-check-circle-fill"></i>
                Bulk Orders
              </span>

            </div>

            <!-- CARD ACTIONS -->
            <div class="contact-card-actions">

              <a class="btn contact-btn-primary w-100" href="tel:7209770033">
                <i class="bi bi-telephone me-2"></i>
                Call Now
              </a>

              <a class="btn contact-btn-whatsapp w-100" target="_blank"
                href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20to%20become%20a%20distributor.">
                <i class="bi bi-whatsapp me-2"></i>
                Chat on WhatsApp
              </a>

            </div>

          </div>

        </div>

      </div>

    </div>
  </section>
  <!-- ===================== CONTACT & DISTRIBUTORSHIP ULTRA PREMIUM END ===================== -->


@endsection
