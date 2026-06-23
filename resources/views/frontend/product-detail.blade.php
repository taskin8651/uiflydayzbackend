@extends('frontend.master')
@section('content')

<!-- ===================== PRODUCT DETAIL PREMIUM START ===================== -->
<main>

  <!-- ===================== PRODUCT DETAIL TOP ===================== -->
  <section class="pdx-detail-section" id="productDetail">

    <div class="pdx-bg-grid"></div>
    <div class="pdx-glow pdx-glow-one"></div>
    <div class="pdx-glow pdx-glow-two"></div>

    <div class="container position-relative">

    @php
    $mainImage = $product->getFirstMediaUrl('product_main_image')
        ?: asset('assets/images/products/product.png');

    $galleryImages = $product->getMedia('product_gallery');

    $allImages = collect();

    $allImages->push([
        'url' => $mainImage,
        'alt' => $product->name,
    ]);

    foreach ($galleryImages as $galleryImage) {
        $allImages->push([
            'url' => $galleryImage->getUrl(),
            'alt' => $product->name,
        ]);
    }

    $features = array_filter([
        $product->feature_one,
        $product->feature_two,
        $product->feature_three,
        $product->feature_four,
    ]);

    $rating = (float) $product->rating;
@endphp

<div class="row align-items-center g-4 g-lg-5">

    <div class="col-lg-6">
        <div class="pdx-product-gallery">

            <div class="pdx-image-card">

                <div class="pdx-image-badge">
                    <i class="bi bi-stars"></i>
                    {{ $product->badge_text ?: 'Premium Product' }}
                </div>

                <div class="pdx-ring pdx-ring-one"></div>
                <div class="pdx-ring pdx-ring-two"></div>

                <img src="{{ $mainImage }}"
                     alt="{{ $product->name }}"
                     class="pdx-main-img"
                     id="pdxMainImage">

                <div class="pdx-float-card pdx-float-one">
                    <i class="bi bi-droplet-half"></i>
                    <span>{{ $product->float_one_text ?: '3X Absorption' }}</span>
                </div>

                <div class="pdx-float-card pdx-float-two">
                    <i class="bi bi-shield-check"></i>
                    <span>{{ $product->float_two_text ?: 'Leak Guard' }}</span>
                </div>

            </div>

            @if($allImages->count())
                <div class="pdx-thumb-row">
                    @foreach($allImages as $key => $image)
                        <button type="button"
                                class="pdx-thumb {{ $key === 0 ? 'active' : '' }}"
                                data-image="{{ $image['url'] }}"
                                aria-label="View product image {{ $key + 1 }}">
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                        </button>
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <div class="col-lg-6">
        <div class="pdx-detail-content">

            <div class="pdx-kicker">
                <span><i class="bi bi-bag-heart-fill"></i></span>
                Product Detail
            </div>

            <h1 class="pdx-title">
                {{ $product->name }}

                @if($product->subtitle)
                    <span>{{ $product->subtitle }}</span>
                @endif
            </h1>

            @if($product->short_description)
                <p class="pdx-short-desc">
                    {{ $product->short_description }}
                </p>
            @endif

            <div class="pdx-rating">
                <div class="pdx-stars">
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

                <span>{{ $product->rating_text ?: number_format($rating, 1) . '/5 customer rating' }}</span>
            </div>

            <div class="pdx-info-grid">

                <div class="pdx-info-box">
                    <small>Size</small>
                    <strong>{{ $product->size_text ?: optional($product->sizeCategory)->size_label }}</strong>
                </div>

                <div class="pdx-info-box">
                    <small>Flow</small>
                    <strong>{{ $product->flow_text ?: optional($product->sizeCategory)->flow_label }}</strong>
                </div>

                <div class="pdx-info-box">
                    <small>Pack</small>
                    <strong>{{ $product->pack_text ?: 'Pack' }}</strong>
                </div>

            </div>

            @if(count($features))
                <ul class="pdx-points">
                    @foreach($features as $feature)
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            @endif

            <div class="pdx-actions">

                <a href="{{ route('contact') ?? url('/contact') }}" class="pdx-btn pdx-btn-primary">
                    Buy / Enquire
                    <i class="bi bi-arrow-right-short"></i>
                </a>

                <a target="_blank"
                   href="https://wa.me/917209770033?text={{ urlencode('Hi FlyDayz Team, I want details about ' . $product->name . '.') }}"
                   class="pdx-btn pdx-btn-whatsapp">
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>

            </div>

        </div>
    </div>

</div>
<script>
  document.querySelectorAll('.pdx-thumb').forEach(function (thumb) {
  thumb.addEventListener('click', function () {
    const image = this.getAttribute('data-image');
    const mainImage = document.getElementById('pdxMainImage');

    if (mainImage && image) {
      mainImage.setAttribute('src', image);
    }

    document.querySelectorAll('.pdx-thumb').forEach(function (item) {
      item.classList.remove('active');
    });

    this.classList.add('active');
  });
});
</script>

    </div>
  </section>
  <!-- ===================== PRODUCT DETAIL TOP END ===================== -->


  <!-- ===================== DESCRIPTION & SPECIFICATION ===================== -->
  <section class="pdx-description-section">

    <div class="container">

      <div class="pdx-description-card">

        <div class="row g-4 g-lg-5">

          <!-- DESCRIPTION -->
          <div class="col-lg-7">

            <div class="pdx-section-kicker">
              <span><i class="bi bi-info-circle-fill"></i></span>
              Product Description
            </div>

            <h2 class="pdx-section-title">
              Comfort, Coverage & Confidence in Every Pack
            </h2>

            <p class="pdx-description-text">
              FlyDayz XL Gold is crafted for women who need dependable protection
              without compromising comfort. Its soft top sheet, absorbent core and
              secure wings help provide a comfortable wearing experience during
              heavy-flow days.
            </p>

            <p class="pdx-description-text">
              The XL coverage helps reduce leakage worries, while the gel-lock
              absorbent system supports quick wetness management and freshness.
              It is suitable for active days, office hours, college, travel and
              regular heavy-flow needs.
            </p>

            <div class="pdx-description-icons">

              <div>
                <i class="bi bi-cloud-check-fill"></i>
                <strong>Soft Feel</strong>
                <span>Gentle top layer</span>
              </div>

              <div>
                <i class="bi bi-droplet-half"></i>
                <strong>Fast Absorb</strong>
                <span>Gel-lock core</span>
              </div>

              <div>
                <i class="bi bi-shield-lock-fill"></i>
                <strong>Leak Guard</strong>
                <span>Secure protection</span>
              </div>

            </div>

          </div>


          <!-- SPECIFICATION -->
          <div class="col-lg-5">

            <div class="pdx-spec-card">

              <div class="pdx-spec-head">
                <i class="bi bi-list-check"></i>
                <h3>Product Specification</h3>
              </div>

              <div class="pdx-spec-list">

                <div class="pdx-spec-row">
                  <span>Product Name</span>
                  <strong>FlyDayz XL Gold</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Size</span>
                  <strong>XL · 280 mm</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Flow Type</span>
                  <strong>Heavy Flow</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Pack Size</span>
                  <strong>6 Pads</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Top Sheet</span>
                  <strong>Cotton Soft</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Core</span>
                  <strong>Gel Lock Absorbent Core</strong>
                </div>

                <div class="pdx-spec-row">
                  <span>Wings</span>
                  <strong>Longer & Wider Wings</strong>
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>
  <!-- ===================== DESCRIPTION & SPECIFICATION END ===================== -->


  <!-- ===================== RELATED PRODUCTS ===================== -->
  <section class="pdx-related-section">

    <div class="container">

      <div class="pdx-related-head text-center">

        <div class="pdx-section-kicker mx-auto">
          <span><i class="bi bi-box-seam-fill"></i></span>
          Related Products
        </div>

        <h2 class="pdx-section-title">
          Explore More FlyDayz Products
        </h2>

        <p class="pdx-section-subtitle">
          Choose the right product according to flow, size and comfort need.
        </p>

      </div>

      <div class="row g-4">

        <!-- PRODUCT 1 -->
        <div class="col-md-6 col-lg-4">
          <article class="pdx-related-card">

            <div class="pdx-related-tag">Normal Flow</div>

            <div class="pdx-related-img">
              <img
                src="assets/images/products/product.png"
                alt="FlyDayz Regular"
              >
            </div>

            <div class="pdx-related-body">
              <h3>FlyDayz Regular</h3>
              <p>Daily comfort and soft protection for light-to-normal flow.</p>

              <div class="pdx-related-meta">
                <span><i class="bi bi-rulers"></i> Regular</span>
                <span><i class="bi bi-cloud-check"></i> Soft Feel</span>
              </div>

              <a href="product-detail.html" class="pdx-related-btn">
                View Details
                <i class="bi bi-arrow-right-short"></i>
              </a>
            </div>

          </article>
        </div>


        <!-- PRODUCT 2 -->
        <div class="col-md-6 col-lg-4">
          <article class="pdx-related-card active">

            <div class="pdx-related-tag">Current Product</div>

            <div class="pdx-related-img">
              <img
                src="assets/images/products/product2.png"
                alt="FlyDayz XL Gold"
              >
            </div>

            <div class="pdx-related-body">
              <h3>FlyDayz XL Gold</h3>
              <p>Premium XL protection for heavy-flow days and secure coverage.</p>

              <div class="pdx-related-meta">
                <span><i class="bi bi-droplet-half"></i> Heavy Flow</span>
                <span><i class="bi bi-shield-check"></i> Leak Guard</span>
              </div>

              <a href="product-detail.html" class="pdx-related-btn">
                Current Product
                <i class="bi bi-patch-check-fill"></i>
              </a>
            </div>

          </article>
        </div>


        <!-- PRODUCT 3 -->
        <div class="col-md-6 col-lg-4">
          <article class="pdx-related-card">

            <div class="pdx-related-tag">Night Care</div>

            <div class="pdx-related-img">
              <img
                src="assets/images/products/product4.png"
                alt="FlyDayz Overnight"
              >
            </div>

            <div class="pdx-related-body">
              <h3>FlyDayz Overnight</h3>
              <p>Longer coverage for night use, travel and very heavy flow.</p>

              <div class="pdx-related-meta">
                <span><i class="bi bi-moon-stars"></i> Night Care</span>
                <span><i class="bi bi-stars"></i> Extra Comfort</span>
              </div>

              <a href="product-detail.html" class="pdx-related-btn">
                View Details
                <i class="bi bi-arrow-right-short"></i>
              </a>
            </div>

          </article>
        </div>

      </div>

    </div>

  </section>
  <!-- ===================== RELATED PRODUCTS END ===================== -->

</main>
<!-- ===================== PRODUCT DETAIL PREMIUM END ===================== -->

@endsection