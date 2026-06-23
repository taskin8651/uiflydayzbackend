

@extends('frontend.master')
@section('content')


<!-- ===================== TECHNOLOGY HERO ===================== -->
<section class="tech-page-hero" id="technologyHome">

  <div class="tech-hero-glow tech-hero-glow-one"></div>
  <div class="tech-hero-glow tech-hero-glow-two"></div>
  <div class="tech-hero-grid"></div>

  <img
    src="assets/images/decor/pad-outline-1.png"
    class="tech-hero-decor tech-pad-one"
    alt=""
    aria-hidden="true"
  >

  <img
    src="assets/images/decor/pad-outline-2.png"
    class="tech-hero-decor tech-pad-two"
    alt=""
    aria-hidden="true"
  >

  <div class="container position-relative">

    <div class="row align-items-center g-4 g-lg-5">

      <!-- LEFT -->
      <div class="col-lg-6">

        <div class="tech-hero-content">

          <div class="tech-kicker">
            <span>
              <i class="bi bi-cpu-fill"></i>
            </span>
            Advanced Feminine Hygiene Engineering
          </div>

          <h1 class="tech-hero-title">
            Comfort Technology
            <span>Designed to Protect</span>
          </h1>

          <p class="tech-hero-text">
            FlyDayz combines a soft medical-grade topsheet, fast absorption,
            3D Super Gel Lock, wider wings and advanced leak-control design
            to support comfort through normal, heavy and very heavy flow days.
          </p>

          <div class="tech-hero-points">

            <div class="tech-hero-point">
              <i class="bi bi-droplet-fill"></i>

              <div>
                <strong>Fast Absorption</strong>
                <span>Quick wetness-locking support</span>
              </div>
            </div>

            <div class="tech-hero-point">
              <i class="bi bi-shield-check"></i>

              <div>
                <strong>Reliable Coverage</strong>
                <span>Wider back and secure wings</span>
              </div>
            </div>

            <div class="tech-hero-point">
              <i class="bi bi-feather"></i>

              <div>
                <strong>Gentle Comfort</strong>
                <span>Soft non-printed topsheet</span>
              </div>
            </div>

          </div>

          <div class="tech-hero-actions">

            <a href="#technologyLayers" class="tech-btn-primary">
              Explore Technology
              <i class="bi bi-arrow-down-short"></i>
            </a>

            <a href="{{ route('products') }}" class="tech-btn-secondary">
              View Products
            </a>

          </div>

        </div>

      </div>

      <!-- RIGHT -->
      <div class="col-lg-6">

        <div class="tech-hero-showcase">

          <div class="tech-showcase-orbit orbit-one"></div>
          <div class="tech-showcase-orbit orbit-two"></div>

          <div class="tech-showcase-top">

            <span>
              <i class="bi bi-patch-check-fill"></i>
              Premium Protection System
            </span>

            <strong>5 in 1</strong>

          </div>

          <div class="tech-product-stage">

            <span class="tech-product-aura aura-one"></span>
            <span class="tech-product-aura aura-two"></span>

            <img
              src="assets/images/decor/pad-outline-1.png"
              class="tech-stage-pad"
              alt=""
              aria-hidden="true"
            >

            <img
              src="assets/images/products/product1.png"
              class="tech-stage-product"
              alt="FlyDayz Premium Gel Pad Pack"
            >

            <div class="tech-floating-chip chip-one">
              <i class="bi bi-droplet-half"></i>
              3D Gel Lock
            </div>

            <div class="tech-floating-chip chip-two">
              <i class="bi bi-feather"></i>
              Soft Topsheet
            </div>

            <div class="tech-floating-chip chip-three">
              <i class="bi bi-shield-lock"></i>
              Leak Guard
            </div>

          </div>

          <div class="tech-showcase-bottom">

            <div>
              <strong>Normal</strong>
              <span>Daily comfort</span>
            </div>

            <div>
              <strong>Heavy</strong>
              <span>Extra absorption</span>
            </div>

            <div>
              <strong>Very Heavy</strong>
              <span>Maximum coverage</span>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>
<!-- ===================== TECHNOLOGY HERO END ===================== -->



  <!-- ===================== 5 IN 1 TECHNOLOGY ===================== -->
  <section class="section tech-pillars-section">

    <div class="container">

      <div class="tech-section-head text-center">

        <div class="tech-section-kicker">
          <span>
            <i class="bi bi-stars"></i>
          </span>
          FlyDayz Core Technologies
        </div>

        <h2>
          5 in 1 Protection System
        </h2>

        <p>
          Every feature works together to support freshness, stability,
          absorption and confident protection.
        </p>

      </div>

      @if($techPillars->count())
    <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-5">

        @foreach($techPillars as $pillar)
            <div class="col">

                <article class="tech-pillar-card {{ $pillar->is_featured ? 'featured' : '' }}">

                    @if($pillar->number)
                        <div class="tech-pillar-number">
                            {{ $pillar->number }}
                        </div>
                    @endif

                    <div class="tech-pillar-icon">
                        <img src="{{ $pillar->getFirstMediaUrl('tech_pillar_icon') ?: asset('assets/images/default-icon.png') }}"
                             alt="{{ $pillar->icon_alt ?: $pillar->title }}">
                    </div>

                    <h3>{{ $pillar->title }}</h3>

                    @if($pillar->description)
                        <p>
                            {{ $pillar->description }}
                        </p>
                    @endif

                </article>

            </div>
        @endforeach

    </div>
@else
    <div class="text-center py-5">
        <p class="mb-0">No technology pillars found.</p>
    </div>
@endif

    </div>

  </section>
  <!-- ===================== 5 IN 1 TECHNOLOGY END ===================== -->


  <!-- ===================== LAYER TECHNOLOGY ===================== -->
  <section class="section tech-layer-section"
           id="technologyLayers">

    <div class="tech-layer-glow"></div>

    <div class="container position-relative">

      <div class="row align-items-center g-4 g-lg-5">

        <!-- PRODUCT VISUAL -->
        <div class="col-lg-6">

          <div class="tech-layer-visual">

            <div class="layer-visual-label">
              Multi-Layer Protection
            </div>

            <div class="layer-product-wrap">

              <div class="layer-product-ring ring-one"></div>
              <div class="layer-product-ring ring-two"></div>

              <img src="assets/images/decor/pad-outline-1.png"
                   class="layer-pad-outline"
                   alt="Sanitary pad technology">

              <img src="assets/images/products/product2.png"
                   class="layer-product-pack"
                   alt="FlyDayz Premium Pack">

            </div>

            <div class="layer-floating-tag layer-tag-one">
              <span>01</span>
              Soft Medical-Grade Topsheet
            </div>

            <div class="layer-floating-tag layer-tag-two">
              <span>02</span>
              Fast Distribution Layer
            </div>

            <div class="layer-floating-tag layer-tag-three">
              <span>03</span>
              3D Super Gel Lock Core
            </div>

            <div class="layer-floating-tag layer-tag-four">
              <span>04</span>
              Breathable Leak-Proof Back
            </div>

          </div>

        </div>

        <!-- CONTENT -->
        <div class="col-lg-6">

          <div class="tech-layer-content">

            <div class="tech-section-kicker">
              <span>
                <i class="bi bi-layers-fill"></i>
              </span>
              Layer-by-Layer Engineering
            </div>

            <h2>
              Protection Built in Every Layer
            </h2>

            <p class="tech-layer-intro">
              From the surface touching the skin to the secure back layer,
              each component is designed to perform a specific comfort
              and protection function.
            </p>

            <div class="tech-layer-list">

              <article class="tech-layer-item">

                <div class="tech-layer-item-icon">
                  <i class="bi bi-feather"></i>
                </div>

                <div>
                  <span>Layer 01</span>
                  <h3>Soft Non-Printed Topsheet</h3>
                  <p>
                    Gentle surface designed for softness and comfortable contact.
                  </p>
                </div>

              </article>

              <article class="tech-layer-item">

                <div class="tech-layer-item-icon">
                  <i class="bi bi-arrow-down-circle"></i>
                </div>

                <div>
                  <span>Layer 02</span>
                  <h3>Rapid Distribution Layer</h3>
                  <p>
                    Helps move wetness away from the top surface quickly.
                  </p>
                </div>

              </article>

              <article class="tech-layer-item">

                <div class="tech-layer-item-icon">
                  <i class="bi bi-droplet-fill"></i>
                </div>

                <div>
                  <span>Layer 03</span>
                  <h3>3D Super Gel Lock Core</h3>
                  <p>
                    Absorbent gel-lock support helps retain wetness inside the core.
                  </p>
                </div>

              </article>

              <article class="tech-layer-item">

                <div class="tech-layer-item-icon">
                  <i class="bi bi-shield-check"></i>
                </div>

                <div>
                  <span>Layer 04</span>
                  <h3>Leak-Resistant Back Layer</h3>
                  <p>
                    Provides structured backing for secure and dependable protection.
                  </p>
                </div>

              </article>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- ===================== LAYER TECHNOLOGY END ===================== -->


  <!-- ===================== CATEGORY-WISE PRODUCT TECHNOLOGY ===================== -->
  <section class="section tech-products-section"
           id="technologyProducts">

    <div class="container">

      <div class="tech-products-header">

        <div>

          <div class="tech-section-kicker">
            <span>
              <i class="bi bi-grid-3x3-gap-fill"></i>
            </span>
            Category-Wise Protection
          </div>

          <h2>
            Technology for Every Flow Category
          </h2>

          <p>
            Compare FlyDayz technology according to pad size,
            usage requirement and absorption level.
          </p>

        </div>

        <div class="tech-category-summary">
          <strong>{{ $sizeCategories->count() }}</strong>
          <span>Protection Categories</span>
        </div>

      </div>

      @if(false) <!-- Legacy static product cards retained only as reference -->
      <!-- FILTER BUTTONS -->
      <div class="tech-product-filters"
           role="group"
           aria-label="Product category filters">

        <button class="tech-filter-btn active"
                type="button"
                data-tech-filter="all">
          All Categories
        </button>

        <button class="tech-filter-btn"
                type="button"
                data-tech-filter="regular">
          Regular
        </button>

        <button class="tech-filter-btn"
                type="button"
                data-tech-filter="xl">
          XL
        </button>

        <button class="tech-filter-btn"
                type="button"
                data-tech-filter="xxl">
          XXL
        </button>

      </div>

      <!-- PRODUCT CATEGORY GRID -->
      <div class="tech-product-grid">

        <!-- REGULAR -->
        <article class="tech-product-card"
                 data-tech-category="regular">

          <div class="tech-product-card-top">

            <span class="tech-product-size">
              Regular
            </span>

            <span class="tech-product-flow normal">
              Normal Flow
            </span>

          </div>

          <div class="tech-product-media">

            <div class="tech-product-media-bg"></div>

            <img src="assets/images/decor/pad-outline-2.png"
                 class="tech-product-pad-bg"
                 alt="">

            <img src="assets/images/products/product.png"
                 class="tech-category-product-img"
                 alt="FlyDayz Regular Pad Pack">

          </div>

          <div class="tech-product-body">

            <div class="tech-product-heading">
              <div>
                <span>Daily Protection</span>
                <h3>FlyDayz Regular</h3>
              </div>

              <strong>240 mm</strong>
            </div>

            <p>
              Comfortable daily-use technology for normal flow and routine care.
            </p>

            <div class="tech-product-features">

              <span>
                <i class="bi bi-feather"></i>
                Soft Topsheet
              </span>

              <span>
                <i class="bi bi-droplet-half"></i>
                Quick Absorb
              </span>

              <span>
                <i class="bi bi-shield-check"></i>
                Secure Wings
              </span>

            </div>

            <div class="tech-flow-meter normal-flow">

              <div class="tech-flow-labels">
                <span>Normal</span>
                <span>Heavy</span>
                <span>Very Heavy</span>
              </div>

              <div class="tech-flow-track">
                <span class="tech-flow-fill"></span>
                <span class="tech-flow-marker"></span>
              </div>

              <strong>Normal Flow Technology</strong>

            </div>

            <a href="all-product.html?category=regular"
               class="tech-product-btn">

              View Regular Products
              <i class="bi bi-arrow-right-short"></i>

            </a>

          </div>

        </article>

        <!-- XL -->
        <article class="tech-product-card"
                 data-tech-category="xl">

          <div class="tech-product-card-top">

            <span class="tech-product-size">
              XL
            </span>

            <span class="tech-product-flow heavy">
              Heavy Flow
            </span>

          </div>

          <div class="tech-product-media">

            <div class="tech-product-media-bg"></div>

            <img src="assets/images/decor/pad-outline-2.png"
                 class="tech-product-pad-bg"
                 alt="">

            <img src="assets/images/products/product1.png"
                 class="tech-category-product-img"
                 alt="FlyDayz XL Premium Pad Pack">

          </div>

          <div class="tech-product-body">

            <div class="tech-product-heading">

              <div>
                <span>Extra Coverage</span>
                <h3>FlyDayz XL</h3>
              </div>

              <strong>280 mm</strong>

            </div>

            <p>
              Wider coverage and enhanced absorption support for heavy-flow days.
            </p>

            <div class="tech-product-features">

              <span>
                <i class="bi bi-droplet-fill"></i>
                3D Gel Lock
              </span>

              <span>
                <i class="bi bi-arrows-expand"></i>
                Wider Back
              </span>

              <span>
                <i class="bi bi-clock-history"></i>
                Long Wear
              </span>

            </div>

            <div class="tech-flow-meter heavy-flow">

              <div class="tech-flow-labels">
                <span>Normal</span>
                <span>Heavy</span>
                <span>Very Heavy</span>
              </div>

              <div class="tech-flow-track">
                <span class="tech-flow-fill"></span>
                <span class="tech-flow-marker"></span>
              </div>

              <strong>Heavy Flow Technology</strong>

            </div>

            <a href="all-product.html?category=xl"
               class="tech-product-btn">

              View XL Products
              <i class="bi bi-arrow-right-short"></i>

            </a>

          </div>

        </article>

        <!-- XXL -->
        <article class="tech-product-card tech-product-featured"
                 data-tech-category="xxl">

          <div class="tech-product-card-top">

            <span class="tech-product-size">
              XXL
            </span>

            <span class="tech-product-flow very-heavy">
              Very Heavy Flow
            </span>

          </div>

          <div class="tech-product-media">

            <div class="tech-product-media-bg"></div>

            <img src="assets/images/decor/pad-outline-1.png"
                 class="tech-product-pad-bg"
                 alt="">

            <img src="assets/images/products/product2.png"
                 class="tech-category-product-img"
                 alt="FlyDayz XXL Night Care Pad Pack">

          </div>

          <div class="tech-product-body">

            <div class="tech-product-heading">

              <div>
                <span>Maximum Protection</span>
                <h3>FlyDayz XXL</h3>
              </div>

              <strong>330 mm</strong>

            </div>

            <p>
              Extra-long night-care technology for very heavy flow and extended coverage.
            </p>

            <div class="tech-product-features">

              <span>
                <i class="bi bi-moon-stars"></i>
                Night Care
              </span>

              <span>
                <i class="bi bi-shield-lock"></i>
                Maximum Coverage
              </span>

              <span>
                <i class="bi bi-clock-fill"></i>
                Up to 12 Hrs
              </span>

            </div>

            <div class="tech-flow-meter very-heavy-flow">

              <div class="tech-flow-labels">
                <span>Normal</span>
                <span>Heavy</span>
                <span>Very Heavy</span>
              </div>

              <div class="tech-flow-track">
                <span class="tech-flow-fill"></span>
                <span class="tech-flow-marker"></span>
              </div>

              <strong>Very Heavy Flow Technology</strong>

            </div>

            <a href="all-product.html?category=xxl"
               class="tech-product-btn">

              View XXL Products
              <i class="bi bi-arrow-right-short"></i>

            </a>

          </div>

        </article>

      </div>

      <div class="tech-products-empty"
           id="techProductsEmpty"
           hidden>

        No products are available in this category.

      </div>
      @endif

      <div class="tech-product-filters" role="group" aria-label="Product category filters">
        <button class="tech-filter-btn active" type="button" data-tech-filter="all">All Categories</button>
        @foreach($sizeCategories as $category)
          <button class="tech-filter-btn" type="button" data-tech-filter="{{ $category->slug }}">{{ $category->name }}</button>
        @endforeach
      </div>

      <div class="tech-product-grid">
        @forelse($products as $product)
          @php
            $image = $product->getFirstMediaUrl('product_main_image') ?: asset('assets/images/products/product.png');
            $category = optional($product->sizeCategory);
            $features = array_filter([$product->feature_one, $product->feature_two, $product->feature_three]);
          @endphp
          <article class="tech-product-card {{ $product->is_featured ? 'tech-product-featured' : '' }}" data-tech-category="{{ $category->slug ?: 'other' }}">
            <div class="tech-product-card-top"><span class="tech-product-size">{{ $category->name ?: 'Premium' }}</span><span class="tech-product-flow {{ $product->absorption_type }}">{{ $product->flow_text ?: $category->flow_label ?: 'Comfort Care' }}</span></div>
            <div class="tech-product-media"><div class="tech-product-media-bg"></div><img src="{{ asset('assets/images/decor/pad-outline-2.png') }}" class="tech-product-pad-bg" alt=""><img src="{{ $image }}" class="tech-category-product-img" alt="{{ $product->name }}"></div>
            <div class="tech-product-body"><div class="tech-product-heading"><div><span>{{ $product->badge_text ?: optional($product->protectionType)->title ?: 'Premium Protection' }}</span><h3>{{ $product->name }}</h3></div><strong>{{ $product->size_text ?: $category->size_label }}</strong></div><p>{{ $product->short_description }}</p><div class="tech-product-features">@forelse($features as $feature)<span><i class="bi bi-patch-check"></i>{{ $feature }}</span>@empty<span><i class="bi bi-shield-check"></i>Comfort-focused protection</span>@endforelse</div><a href="{{ route('products.show', $product->slug) }}" class="tech-product-btn">View Product <i class="bi bi-arrow-right-short"></i></a></div>
          </article>
        @empty
          <div class="tech-products-empty" style="display:block">Products will appear here once added from the admin panel.</div>
        @endforelse
      </div>

    </div>

  </section>
  <!-- ===================== CATEGORY-WISE PRODUCT TECHNOLOGY END ===================== -->


  <!-- ===================== PERFORMANCE SECTION ===================== -->
  <section class="section tech-performance-section">

    <div class="container">

      <div class="tech-section-head text-center">

        <div class="tech-section-kicker">
          <span>
            <i class="bi bi-bar-chart-fill"></i>
          </span>
          Performance Focus
        </div>

        <h2>
          Designed Around Real Usage
        </h2>

        <p>
          FlyDayz technology focuses on softness, absorption,
          secure positioning and confidence during movement.
        </p>

      </div>

      <div class="row g-4">

        <div class="col-md-6 col-lg-3">

          <article class="tech-performance-card">

            <div class="tech-performance-icon">
              <i class="bi bi-feather"></i>
            </div>

            <span>01</span>

            <h3>Skin Comfort</h3>

            <p>
              Soft contact surface for a gentle everyday wearing experience.
            </p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="tech-performance-card">

            <div class="tech-performance-icon">
              <i class="bi bi-droplet-fill"></i>
            </div>

            <span>02</span>

            <h3>Wetness Lock</h3>

            <p>
              Gel-core support helps retain absorbed wetness inside the pad.
            </p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="tech-performance-card featured">

            <div class="tech-performance-icon">
              <i class="bi bi-shield-check"></i>
            </div>

            <span>03</span>

            <h3>Leak Confidence</h3>

            <p>
              Wider wings and structured backing support secure protection.
            </p>

          </article>

        </div>

        <div class="col-md-6 col-lg-3">

          <article class="tech-performance-card">

            <div class="tech-performance-icon">
              <i class="bi bi-wind"></i>
            </div>

            <span>04</span>

            <h3>Freshness Support</h3>

            <p>
              Fragrance-free and odour-focused design for clean confidence.
            </p>

          </article>

        </div>

      </div>

    </div>

  </section>
  <!-- ===================== PERFORMANCE SECTION END ===================== -->


  <!-- ===================== QUALITY TESTING SECTION ===================== -->
  <section class="section tech-testing-section">

    <div class="container">

      <div class="tech-testing-card">

        <div class="row align-items-center g-4 g-lg-5">

          <div class="col-lg-6">

            <div class="tech-testing-content">

              <div class="tech-section-kicker">
                <span>
                  <i class="fa-solid fa-flask"></i>
                </span>
                Quality & Hygiene Focus
              </div>

              <h2>
                Technology Supported by Quality Standards
              </h2>

              <p>
                FlyDayz products are developed with hygiene-focused production,
                material quality checks and performance-oriented design standards.
              </p>

              <div class="tech-testing-list">

                <div>
                  <i class="bi bi-patch-check-fill"></i>
                  <span>Medical-grade topsheet design</span>
                </div>

                <div>
                  <i class="bi bi-patch-check-fill"></i>
                  <span>BIS-approved product positioning</span>
                </div>

                <div>
                  <i class="bi bi-patch-check-fill"></i>
                  <span>Clinically tested technology claims</span>
                </div>

                <div>
                  <i class="bi bi-patch-check-fill"></i>
                  <span>Hygiene-focused manufacturing process</span>
                </div>

              </div>

              <a href="certification.html"
                 class="tech-btn-primary">

                View Certifications
                <i class="bi bi-arrow-right-short"></i>

              </a>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="tech-testing-visual">

              <div class="testing-visual-circle"></div>

              <div class="testing-badge testing-badge-one">
                <i class="bi bi-patch-check-fill"></i>
                BIS Approved
              </div>

              <div class="testing-badge testing-badge-two">
                <i class="fa-solid fa-flask"></i>
                Clinically Tested
              </div>

              <div class="testing-badge testing-badge-three">
                <i class="bi bi-shield-check"></i>
                Medical Grade
              </div>

              <img src="assets/images/products/product1.png"
                   alt="FlyDayz Premium Technology Pack"
                   class="testing-product-img">

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- ===================== QUALITY TESTING SECTION END ===================== -->


  <!-- ===================== TECHNOLOGY CTA ===================== -->
  <section class="section tech-page-cta-section">

    <div class="container">

      <div class="tech-page-cta">

        <div class="tech-page-cta-content">

          <div class="tech-cta-badge">
            <i class="bi bi-stars"></i>
            Find Your Protection
          </div>

          <h2>
            Choose Technology That Matches Your Flow
          </h2>

          <p>
            Explore Regular, XL and XXL FlyDayz products for daily use,
            heavy-flow protection and premium night care.
          </p>

        </div>

        <div class="tech-page-cta-actions">

          <a href="all-product.html"
             class="tech-btn-primary">

            <i class="bi bi-bag-heart"></i>
            Explore Products

          </a>

          <a target="_blank"
             href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20need%20help%20choosing%20the%20right%20FlyDayz%20product."
             class="tech-whatsapp-btn">

            <i class="bi bi-whatsapp"></i>
            Ask on WhatsApp

          </a>

        </div>

      </div>

    </div>

  </section>
  <!-- ===================== TECHNOLOGY CTA END ===================== -->



@endsection
