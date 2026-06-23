


@extends('frontend.master')
@section('content')

  <!-- ===================== MYFLYDAYZ PREMIUM HEADER END ===================== -->
  <section class="wy-hero" id="home">
    <div class="wy-grid"></div>
    <div class="wy-glow wy-glow-one"></div>
    <div class="wy-glow wy-glow-two"></div>
    <img src="assets/images/decor/pad-outline-1.png" class="wy-hero-decor wy-decor-one" alt="">
    <img src="assets/images/decor/pad-outline-2.png" class="wy-hero-decor wy-decor-two" alt="">
    <div class="container position-relative">
      <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-6">
          <div class="wy-kicker"><span><i class="bi bi-heart-pulse-fill"></i></span>Why Women Choose FlyDayz</div>
          <h1 class="wy-hero-title">Care That Feels Soft.<span>Protection You Can Trust.</span></h1>
          <p class="wy-hero-copy">FlyDayz brings together comfort-first materials, thoughtful protection, hygienic
            manufacturing and value-focused product choices for modern feminine care.</p>
          <div class="wy-hero-points">
            <div><i class="bi bi-feather"></i><span><strong>Soft Comfort</strong>Gentle everyday feel</span></div>
            <div><i class="bi bi-droplet-half"></i><span><strong>Fast Absorption</strong>Dry-feel support</span></div>
            <div><i class="bi bi-shield-check"></i><span><strong>Secure Protection</strong>Confidence in motion</span>
            </div>
          </div>
          <div class="wy-hero-actions"><a href="#whyPromise" class="wy-btn-primary">Discover Our Promise <i
                class="bi bi-arrow-down-short"></i></a><a href="{{ route('products') }}" class="wy-btn-secondary">Explore
              Products</a></div>
        </div>
        <div class="col-lg-6">
          <div class="wy-hero-showcase">
            <div class="wy-showcase-top"><span><i class="bi bi-patch-check-fill"></i> Premium Feminine
                Hygiene</span><strong>5 in 1</strong></div>
            <div class="wy-product-stage">
              <div class="wy-orbit wy-orbit-one"></div>
              <div class="wy-orbit wy-orbit-two"></div><img src="assets/images/decor/pad-outline-1.png"
                class="wy-stage-pad" alt=""><img src="assets/images/products/product1.png" class="wy-stage-pack"
                alt="FlyDayz Premium Gel Pads"><span class="wy-float-chip wy-chip-one"><i class="bi bi-feather"></i>
                Soft Touch</span><span class="wy-float-chip wy-chip-two"><i class="bi bi-droplet-fill"></i> Gel
                Lock</span><span class="wy-float-chip wy-chip-three"><i class="bi bi-shield-lock"></i> Leak Guard</span>
            </div>
            <div class="wy-showcase-bottom">
              <div><strong>Soft</strong><span>Comfort feel</span></div>
              <div><strong>Safe</strong><span>Hygienic care</span></div>
              <div><strong>Smart</strong><span>Value driven</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="section wy-promise" id="whyPromise">
    <div class="container">
      <div class="wy-section-head text-center">
        <div class="wy-kicker"><span><i class="bi bi-stars"></i></span>Our Promise</div>
        <h2>Why FlyDayz Stands Apart</h2>
        <p>Every detail is shaped around comfort, confidence, hygiene and dependable everyday protection.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <article class="wy-promise-card"><span class="wy-card-no">01</span>
            <div class="wy-promise-icon"><i class="bi bi-award"></i></div>
            <h3>Premium Quality</h3>
            <p>Thoughtful materials and comfort-focused engineering for dependable daily care.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-3">
          <article class="wy-promise-card"><span class="wy-card-no">02</span>
            <div class="wy-promise-icon"><i class="bi bi-shield-check"></i></div>
            <h3>Hygiene First</h3>
            <p>Designed and presented with clean, quality-focused feminine hygiene standards.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-3">
          <article class="wy-promise-card featured"><span class="wy-card-no">03</span>
            <div class="wy-promise-icon"><i class="bi bi-gem"></i></div>
            <h3>Smart Value</h3>
            <p>Premium comfort and protection without unnecessary premium pricing.</p>
          </article>
        </div>
        <div class="col-md-6 col-lg-3">
          <article class="wy-promise-card"><span class="wy-card-no">04</span>
            <div class="wy-promise-icon"><i class="bi bi-headset"></i></div>
            <h3>Quick Support</h3>
            <p>Fast guidance for products, availability, bulk orders and distributorship.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section wy-five">
    <div class="container">
      <div class="wy-five-shell">
        <div class="wy-five-head">
          <div>
            <div class="wy-kicker"><span><i class="bi bi-shield-fill-check"></i></span>Built for Better Care</div>
            <h2>5 in 1 Premium Protection</h2>
            <p>Five thoughtful features working together for comfort, freshness and confidence.</p>
          </div>
          <div class="wy-five-badge"><strong>5</strong><span>Benefits<br>One Pack</span></div>
        </div>
      @if($techPillars->count())
    <div class="wy-five-grid">

        @foreach($techPillars as $pillar)
            <article class="wy-five-card {{ $pillar->is_featured ? 'active' : '' }}">

                <img src="{{ $pillar->getFirstMediaUrl('tech_pillar_icon') ?: asset('assets/images/default-icon.png') }}"
                     alt="{{ $pillar->icon_alt ?: $pillar->title }}">

                <h3>{{ $pillar->title }}</h3>

                @if($pillar->description)
                    <p>{{ $pillar->description }}</p>
                @endif

            </article>
        @endforeach

    </div>
@else
    <div class="text-center py-4">
        <p class="mb-0">No features found.</p>
    </div>
@endif
      </div>
    </div>
  </section>


  <!-- ===================== ABOUT FLYDAYZ PREMIUM ===================== -->
  <section id="about" class="section about-premium">

    <!-- Decorative background -->
    <div class="about-bg-grid"></div>
    <div class="about-glow about-glow-one"></div>
    <div class="about-glow about-glow-two"></div>

    <img src="assets/images/decor/blob-soft-pink.png" class="about-decor about-blob-one" alt="" aria-hidden="true">

    <img src="assets/images/decor/blob-pink-blue.png" class="about-decor about-blob-two" alt="" aria-hidden="true">

    <img src="assets/images/decor/cotton-1.png" class="about-decor about-cotton" alt="" aria-hidden="true">

    <img src="assets/images/decor/pad-outline-1.png" class="about-decor about-pad-outline" alt="" aria-hidden="true">

    <div class="container position-relative">

     @php
    $aboutImage = optional($aboutSection)->getFirstMediaUrl('about_section_image');
@endphp

<div class="row align-items-center g-4 g-xl-5">

    <!-- LEFT VISUAL -->
    <div class="col-lg-6">
        <div class="about-visual">

            <div class="about-visual-ring ring-one"></div>
            <div class="about-visual-ring ring-two"></div>

            <div class="about-product-card">

                <div class="about-product-top">
                    <span class="about-mini-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        Premium Feminine Care
                    </span>

                    <span class="about-product-status">
                        <span></span>
                        Trusted Protection
                    </span>
                </div>

                <div class="about-product-stage">
                    <div class="about-product-halo"></div>

                    <img src="{{ $aboutImage ?: asset('assets/images/products/product.png') }}"
                         class="about-product-img"
                         alt="{{ optional($aboutSection)->title ?: 'FlyDayz Premium Sanitary Pads' }}">
                </div>

                <div class="about-product-features">

                    <div class="about-product-feature">
                        <div class="about-feature-icon">
                            <i class="bi bi-cloud"></i>
                        </div>
                        <div>
                            <strong>Ultra Soft</strong>
                            <span>Comfortable topsheet</span>
                        </div>
                    </div>

                    <div class="about-product-feature">
                        <div class="about-feature-icon">
                            <i class="bi bi-droplet-half"></i>
                        </div>
                        <div>
                            <strong>Gel Lock</strong>
                            <span>Fast absorption</span>
                        </div>
                    </div>

                    <div class="about-product-feature">
                        <div class="about-feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div>
                            <strong>Leak Guard</strong>
                            <span>Reliable protection</span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="about-floating-card about-floating-card-one">
                <div class="about-floating-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div>
                    <strong>Women First</strong>
                    <span>Comfort-led design</span>
                </div>
            </div>

            <div class="about-floating-card about-floating-card-two">
                <div class="about-floating-icon">
                    <i class="bi bi-stars"></i>
                </div>
                <div>
                    <strong>Premium Feel</strong>
                    <span>Everyday confidence</span>
                </div>
            </div>

        </div>
    </div>

    <!-- RIGHT CONTENT -->
    <div class="col-lg-6">
        <div class="about-content">

            <div class="badge-chip about-kicker">
                <i class="bi bi-heart-fill"></i>
                About FlyDayz
            </div>

            <h2 class="about-title">
                {{ optional($aboutSection)->title ?: 'Comfort Made Personal. Protection Made Powerful.' }}
            </h2>

            <p class="about-lead">
                {{ optional($aboutSection)->short_description ?: 'FlyDayz is a modern feminine hygiene brand focused on creating sanitary pads that combine softness, reliable absorption and secure leak protection.' }}
            </p>

            <p class="about-description">
                {{ optional($aboutSection)->description ?: 'From active mornings to peaceful nights, our goal is to deliver hygienic protection that feels gentle on the skin while providing dependable performance when it matters most.' }}
            </p>

            <div class="about-highlight-grid">

                <div class="about-highlight-card">
                    <div class="about-highlight-icon">
                        <i class="bi bi-gem"></i>
                    </div>
                    <div>
                        <h3>Premium Quality</h3>
                        <p>Carefully selected materials and modern production standards.</p>
                    </div>
                </div>

                <div class="about-highlight-card">
                    <div class="about-highlight-icon">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <div>
                        <h3>Skin-Friendly Comfort</h3>
                        <p>Soft-touch protection created for everyday feminine care.</p>
                    </div>
                </div>

                <div class="about-highlight-card">
                    <div class="about-highlight-icon">
                        <i class="bi bi-shield-plus"></i>
                    </div>
                    <div>
                        <h3>Reliable Protection</h3>
                        <p>Designed for dependable absorption and better leak control.</p>
                    </div>
                </div>

                <div class="about-highlight-card">
                    <div class="about-highlight-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h3>Growing Partner Network</h3>
                        <p>Building availability through retailers and distributors.</p>
                    </div>
                </div>

            </div>

            <div class="about-stats">

                <div class="about-stat">
                    <strong>5 in 1</strong>
                    <span>Protection</span>
                </div>

                <div class="about-stat">
                    <strong>3X</strong>
                    <span>Absorption</span>
                </div>

                <div class="about-stat">
                    <strong>12 Hr</strong>
                    <span>Protection</span>
                </div>

                <div class="about-stat">
                    <strong>100%</strong>
                    <span>Comfort Focus</span>
                </div>

            </div>

            <div class="about-actions">
                <a class="btn btn-brand" href="#products">
                    <i class="bi bi-bag-heart me-2"></i>
                    Explore Products
                </a>

                <a class="btn btn-outline-dark" target="_blank"
                   href="{{ $websiteSettings->whatsappUrl() }}">
                    <i class="bi bi-whatsapp me-2"></i>
                    Connect With Us
                </a>
            </div>

        </div>
    </div>

</div>

      <!-- Bottom trust strip -->
      <div class="about-trust-strip">

        <div class="about-trust-item">
          <i class="bi bi-patch-check-fill"></i>
          <span>Quality-Focused Manufacturing</span>
        </div>

        <div class="about-trust-divider"></div>

        <div class="about-trust-item">
          <i class="bi bi-heart-fill"></i>
          <span>Designed for Women's Comfort</span>
        </div>

        <div class="about-trust-divider"></div>

        <div class="about-trust-item">
          <i class="bi bi-box-seam-fill"></i>
          <span>Multiple Sizes & Pack Options</span>
        </div>

        <div class="about-trust-divider"></div>

        <div class="about-trust-item">
          <i class="bi bi-headset"></i>
          <span>Business & Customer Support</span>
        </div>

      </div>

    </div>
  </section>
  <!-- ===================== ABOUT FLYDAYZ PREMIUM END ===================== -->



  <section class="section wy-products" id="whyProducts">
    <div class="container">
      <div class="wy-products-head">
        <div>
          <div class="wy-kicker"><span><i class="bi bi-grid-3x3-gap-fill"></i></span>Protection by Need</div>
          <h2>Products for Every Flow Category</h2>
          <p>Choose from daily care, heavy-flow protection and extra-long night care.</p>
        </div>
        <div class="wy-products-count"><strong>{{ $products->count() }}</strong><span>Available Products</span></div>
      </div>
      @if(false) <!-- Legacy static product cards retained only as reference -->
      <div class="wy-filter-bar"><button class="wy-filter-btn active" data-why-filter="all">All
          Categories</button><button class="wy-filter-btn" data-why-filter="regular">Regular</button><button
          class="wy-filter-btn" data-why-filter="xl">XL</button><button class="wy-filter-btn"
          data-why-filter="xxl">XXL</button></div>
      <div class="wy-product-grid">
        <article class="wy-product-card" data-why-category="regular">
          <div class="wy-product-top"><span>Regular</span><strong>Normal Flow</strong></div>
          <div class="wy-product-media"><img src="assets/images/decor/pad-outline-2.png" class="wy-product-bg"
              alt=""><img src="assets/images/products/product.png" class="wy-product-img" alt="FlyDayz Regular"></div>
          <div class="wy-product-body"><span class="wy-product-eyebrow">Daily Protection</span>
            <h3>FlyDayz Regular</h3>
            <p>Soft, lightweight protection for routine daytime comfort.</p>
            <div class="wy-product-meta"><span><i class="bi bi-rulers"></i> 240 mm</span><span><i
                  class="bi bi-droplet-half"></i> Normal Flow</span></div><a href="{{ route('products') }}"
              class="wy-product-link">View Regular Range <i class="bi bi-arrow-right-short"></i></a>
          </div>
        </article>
        <article class="wy-product-card featured" data-why-category="xl">
          <div class="wy-product-top"><span>XL</span><strong>Heavy Flow</strong></div>
          <div class="wy-product-media"><img src="assets/images/decor/pad-outline-2.png" class="wy-product-bg"
              alt=""><img src="assets/images/products/product1.png" class="wy-product-img" alt="FlyDayz XL"></div>
          <div class="wy-product-body"><span class="wy-product-eyebrow">Enhanced Coverage</span>
            <h3>FlyDayz XL</h3>
            <p>Wider coverage and gel-lock support for heavy-flow days.</p>
            <div class="wy-product-meta"><span><i class="bi bi-rulers"></i> 280 mm</span><span><i
                  class="bi bi-droplet-fill"></i> Heavy Flow</span></div><a href="{{ route('products') }}"
              class="wy-product-link">View XL Range <i class="bi bi-arrow-right-short"></i></a>
          </div>
        </article>
        <article class="wy-product-card" data-why-category="xxl">
          <div class="wy-product-top"><span>XXL</span><strong>Very Heavy Flow</strong></div>
          <div class="wy-product-media"><img src="assets/images/decor/pad-outline-1.png" class="wy-product-bg"
              alt=""><img src="assets/images/products/product2.png" class="wy-product-img" alt="FlyDayz XXL"></div>
          <div class="wy-product-body"><span class="wy-product-eyebrow">Night Care</span>
            <h3>FlyDayz XXL</h3>
            <p>Extra-long protection for very heavy flow and overnight comfort.</p>
            <div class="wy-product-meta"><span><i class="bi bi-rulers"></i> 330 mm</span><span><i
                  class="bi bi-moon-stars"></i> Night Care</span></div><a href="{{ route('products') }}"
              class="wy-product-link">View XXL Range <i class="bi bi-arrow-right-short"></i></a>
          </div>
        </article>
      </div>
      @endif
      <div class="wy-filter-bar"><button class="wy-filter-btn active" data-why-filter="all">All Categories</button>@foreach($sizeCategories as $category)<button class="wy-filter-btn" data-why-filter="{{ $category->slug }}">{{ $category->name }}</button>@endforeach</div>
      <div class="wy-product-grid">@forelse($products as $product) @php($category = optional($product->sizeCategory)) @php($image = $product->getFirstMediaUrl('product_main_image') ?: asset('assets/images/products/product.png'))<article class="wy-product-card {{ $product->is_featured ? 'featured' : '' }}" data-why-category="{{ $category->slug ?: 'other' }}"><div class="wy-product-top"><span>{{ $category->name ?: 'Premium' }}</span><strong>{{ $product->flow_text ?: $category->flow_label ?: 'Comfort Care' }}</strong></div><div class="wy-product-media"><img src="{{ asset('assets/images/decor/pad-outline-2.png') }}" class="wy-product-bg" alt=""><img src="{{ $image }}" class="wy-product-img" alt="{{ $product->name }}"></div><div class="wy-product-body"><span class="wy-product-eyebrow">{{ $product->badge_text ?: optional($product->protectionType)->title ?: 'Premium Protection' }}</span><h3>{{ $product->name }}</h3><p>{{ $product->short_description }}</p><div class="wy-product-meta"><span><i class="bi bi-rulers"></i> {{ $product->size_text ?: $category->size_label }}</span><span><i class="bi bi-droplet-half"></i> {{ $product->flow_text ?: $category->flow_label }}</span></div><a href="{{ route('products.show', $product->slug) }}" class="wy-product-link">View Product <i class="bi bi-arrow-right-short"></i></a></div></article>@empty<div class="wy-products-empty">Products will appear here once added from the admin panel.</div>@endforelse</div>
    </div>
  </section>

  <section class="section wy-quality">
    <div class="container">
      <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-6">
          <div class="wy-quality-visual">
            <div class="wy-quality-ring ring-one"></div>
            <div class="wy-quality-ring ring-two"></div><img src="assets/images/decor/pad-outline-1.png"
              class="wy-quality-pad" alt=""><img src="assets/images/products/product1.png" class="wy-quality-pack"
              alt="FlyDayz Premium Pack"><span class="wy-quality-chip chip-one"><i class="bi bi-feather"></i> Soft on
              Skin</span><span class="wy-quality-chip chip-two"><i class="bi bi-droplet-fill"></i> Strong
              Absorption</span><span class="wy-quality-chip chip-three"><i class="bi bi-shield-check"></i> Secure
              Protection</span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="wy-quality-content">
            <div class="wy-kicker"><span><i class="bi bi-patch-check-fill"></i></span>Quality Focus</div>
            <h2>Comfort and Protection in Every Pack</h2>
            <p class="wy-quality-intro">FlyDayz focuses on the things women care about most: softness, secure fit,
              freshness, absorption and confidence during everyday routines.</p>
            <div class="wy-quality-list">
              <div><i class="bi bi-cloud-check"></i><span><strong>Soft on Skin</strong>Comfort-focused top layer for a
                  gentle feel.</span></div>
              <div><i class="bi bi-droplet-half"></i><span><strong>Strong on Protection</strong>Absorption and coverage
                  support for confidence.</span></div>
              <div><i class="bi bi-box-seam"></i><span><strong>Premium Presentation</strong>Clean, modern and
                  retail-ready packaging.</span></div>
              <div><i class="bi bi-people"></i><span><strong>Partner Ready</strong>Support for retailers, distributors
                  and bulk buyers.</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section wy-business">
    <div class="container">
      <div class="wy-section-head text-center">
        <div class="wy-kicker"><span><i class="bi bi-briefcase-fill"></i></span>Built for Growth</div>
        <h2>Trusted by Customers. Ready for Partners.</h2>
        <p>FlyDayz is designed as both a comfort-focused product and a strong retail opportunity.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4">
          <article class="wy-business-card">
            <div class="wy-business-icon"><i class="bi bi-shop"></i></div>
            <h3>Retail Friendly</h3>
            <p>Clear product categories, attractive packs and easy in-store presentation.</p>
          </article>
        </div>
        <div class="col-lg-4">
          <article class="wy-business-card featured">
            <div class="wy-business-icon"><i class="bi bi-graph-up-arrow"></i></div>
            <h3>Growth Focused</h3>
            <p>A high-demand hygiene category supported by multiple sizes and use cases.</p>
          </article>
        </div>
        <div class="col-lg-4">
          <article class="wy-business-card">
            <div class="wy-business-icon"><i class="bi bi-headset"></i></div>
            <h3>Quick Onboarding</h3>
            <p>Fast product, margin, supply and distributorship assistance on call or WhatsApp.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="section wy-cta-section" id="contact">
    <div class="container">
      <div class="wy-cta-card">
        <div>
          <div class="wy-cta-badge"><i class="bi bi-stars"></i> Ready for Better Care?</div>
          <h2>Choose Comfort. Choose Confidence. Choose FlyDayz.</h2>
          <p>Explore the product range or connect with our team for availability, bulk orders and distributorship.</p>
        </div>
        <div class="wy-cta-actions"><a href="{{ route('products') }}" class="wy-btn-primary"><i class="bi bi-bag-heart"></i>
            Explore Products</a><a target="_blank"
            href="{{ $websiteSettings->whatsappUrl() }}"
            class="wy-whatsapp"><i class="bi bi-whatsapp"></i> WhatsApp</a></div>
      </div>
    </div>
  </section>
@endsection
