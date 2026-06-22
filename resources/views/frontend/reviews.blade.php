@extends('frontend.master')
@section('content')


<!-- ===================== REVIEWS HERO ===================== -->
<section class="reviews-page-hero" id="home">

  <div class="reviews-page-bg"></div>
  <div class="reviews-page-noise"></div>

  <img src="assets/img/blob-pink-blue.png" class="reviews-page-decor reviews-blob-1" alt="">
  <img src="assets/img/blob-soft-pink.png" class="reviews-page-decor reviews-blob-2" alt="">
  <img src="assets/img/cotton-1.png" class="reviews-page-decor reviews-cotton-1" alt="">
  <img src="assets/img/cotton-2.png" class="reviews-page-decor reviews-cotton-2" alt="">
  <img src="assets/img/pad-outline-1.png" class="reviews-page-pad-bg" alt="">

  <div class="container position-relative">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="badge-chip mb-3 reviews-page-reveal">
          <i class="bi bi-chat-quote"></i> Real Customer Feedback
        </div>

        <h1 class="reviews-page-title reviews-page-reveal" style="--d:.10s">
          Loved for Comfort.
          <span class="headline-accent">
            Trusted for Protection
            <span class="headline-shine" aria-hidden="true"></span>
          </span>
        </h1>

        <p class="reviews-page-subtitle reviews-page-reveal" style="--d:.20s">
          Hear what women say about FlyDayz premium sanitary pads — soft feel,
          reliable protection, freshness, comfort, and confidence.
        </p>

        <div class="d-flex flex-wrap gap-2 reviews-page-reveal" style="--d:.30s">
          <a class="btn btn-brand" href="#customerReviews">
            <i class="bi bi-star-fill me-2"></i>Read Reviews
          </a>

          <a class="btn btn-outline-dark" href="#shareReview">
            <i class="bi bi-pencil-square me-2"></i>Share Review
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="reviews-hero-card glass reviews-page-reveal" style="--d:.20s">

          <div class="reviews-hero-top">
            <div class="reviews-rating-big">
              4.8
              <span>/5</span>
            </div>

            <div>
              <div class="reviews-stars">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
              </div>
              <div class="muted small mt-1">Based on customer feedback</div>
            </div>
          </div>

          <div class="reviews-pack-stage">
            <img src="assets/images/products/product2.png" class="reviews-pack-img" alt="FlyDayz Regular Pack">
            <img src="assets/images/products/product1.png" class="reviews-outline-img" alt="">
          </div>

          <div class="reviews-hero-pills">
            <span><i class="bi bi-cloud-check"></i> Soft Comfort</span>
            <span><i class="bi bi-shield-plus"></i> Leak Control</span>
            <span><i class="bi bi-heart-pulse"></i> Fresh Feel</span>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== REVIEW SUMMARY ===================== -->
<section class="section reviews-summary-section">
  <div class="container">

    <div class="row g-4">

      <div class="col-md-6 col-lg-3">
        <div class="reviews-summary-card glass">
          <div class="summary-icon">
            <i class="bi bi-star-fill"></i>
          </div>
          <h3>4.8/5</h3>
          <p>Average customer rating</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="reviews-summary-card glass">
          <div class="summary-icon">
            <i class="bi bi-cloud-check"></i>
          </div>
          <h3>Soft</h3>
          <p>Comfort-focused product feel</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="reviews-summary-card glass">
          <div class="summary-icon">
            <i class="bi bi-shield-check"></i>
          </div>
          <h3>Secure</h3>
          <p>Protection and fit support</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="reviews-summary-card glass">
          <div class="summary-icon">
            <i class="bi bi-whatsapp"></i>
          </div>
          <h3>Quick</h3>
          <p>Support on WhatsApp</p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ===================== CUSTOMER REVIEWS ===================== -->
<section class="section bg-soft customer-reviews-section" id="customerReviews">
  <div class="container">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
      <div>
        <div class="badge-chip mb-3">
          <i class="bi bi-chat-heart"></i> Customer Stories
        </div>

        <h2 class="fw-bold mb-1">
          What Women Say About <span class="brand-grad">FlyDayz</span>
        </h2>

        <p class="muted mb-0">
          Real-looking sample reviews for your product landing page.
        </p>
      </div>

      <div class="d-flex gap-2">
        <button class="slider-btn" type="button" data-reviews-page-slide="prev" aria-label="Previous">
          <i class="bi bi-arrow-left"></i>
        </button>

        <button class="slider-btn" type="button" data-reviews-page-slide="next" aria-label="Next">
          <i class="bi bi-arrow-right"></i>
        </button>
      </div>
    </div>

    @if(isset($reviewItems) && $reviewItems->count())
    <div class="reviews-page-slider" id="reviewsPageSlider">

        @foreach($reviewItems as $review)
            <article class="reviews-page-card glass">

                <div class="review-card-top">
                    <div class="review-profile">
                        <div class="review-avatar">
                            {{ strtoupper(substr($review->name, 0, 1)) }}
                        </div>

                        <div>
                            <h6>{{ $review->name }}</h6>

                            <span>
                                <i class="bi bi-patch-check-fill"></i>
                                {{ $review->buyer_label ?: 'Verified Buyer' }}
                            </span>
                        </div>
                    </div>

                    <div class="review-star-row">
                        @for($i = 1; $i <= 5; $i++)
                            @if($review->rating >= $i)
                                <i class="bi bi-star-fill"></i>
                            @elseif($review->rating >= ($i - 0.5))
                                <i class="bi bi-star-half"></i>
                            @else
                                <i class="bi bi-star"></i>
                            @endif
                        @endfor
                    </div>
                </div>

                <p class="review-message">
                    “{{ $review->message }}”
                </p>

                <div class="review-card-bottom">
                    @if($review->product_tag)
                        <span class="chip small">
                            <i class="bi bi-bag-heart me-1"></i>
                            {{ $review->product_tag }}
                        </span>
                    @endif

                    @if($review->review_time)
                        <span class="muted small">
                            {{ $review->review_time }}
                        </span>
                    @endif
                </div>

            </article>
        @endforeach

    </div>
@else
    <div class="text-center py-5">
        <p class="mb-0">No reviews available.</p>
    </div>
@endif

    <div class="muted small mt-2">
      Tip: mobile par swipe karein, desktop par drag karein.
    </div>

  </div>
</section>

<!-- ===================== REVIEW HIGHLIGHTS ===================== -->
<section class="section review-highlights-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="badge-chip mb-3">
        <i class="bi bi-stars"></i> Most Appreciated
      </div>

      <h2 class="fw-bold mb-2">What Customers Like Most</h2>
      <p class="muted mb-0">
        FlyDayz is appreciated for comfort, softness, fit, and confidence.
      </p>
    </div>

    <div class="row g-4">

      <div class="col-md-6 col-lg-3">
        <div class="review-highlight-card glass">
          <div class="highlight-icon">
            <i class="bi bi-cloud-check"></i>
          </div>
          <h5>Soft Feel</h5>
          <p>Customers love the gentle cotton-soft touch for everyday comfort.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="review-highlight-card glass">
          <div class="highlight-icon">
            <i class="bi bi-droplet-half"></i>
          </div>
          <h5>Absorption</h5>
          <p>Fast absorption support helps users feel fresh and confident.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="review-highlight-card glass">
          <div class="highlight-icon">
            <i class="bi bi-shield-plus"></i>
          </div>
          <h5>Leak Control</h5>
          <p>Secure fit and coverage help reduce leakage worries.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="review-highlight-card glass">
          <div class="highlight-icon">
            <i class="bi bi-box-seam"></i>
          </div>
          <h5>Premium Pack</h5>
          <p>Modern packaging gives the brand a fresh and premium look.</p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ===================== SHARE REVIEW SECTION ===================== -->
<section class="section bg-soft share-review-section" id="shareReview">
  <div class="container">

    <div class="share-review-card glass">
      <div class="row align-items-center g-4">

        <div class="col-lg-7">
          <div class="badge-chip mb-3">
            <i class="bi bi-pencil-square"></i> Share Your Experience
          </div>

          <h2 class="fw-bold mb-3">
            Used FlyDayz? Tell Us Your Review
          </h2>

          <p class="muted mb-4">
            Your feedback helps us improve and also helps other customers choose the right product.
            Share your review directly with our team on WhatsApp.
          </p>

          <div class="share-review-points">
            <span><i class="bi bi-check-circle-fill"></i> Comfort feedback</span>
            <span><i class="bi bi-check-circle-fill"></i> Product experience</span>
            <span><i class="bi bi-check-circle-fill"></i> Size suggestion</span>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="share-review-action">
            <div class="share-rating">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>

            <a class="btn btn-brand w-100 mt-3" target="_blank"
               href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20to%20share%20my%20review.">
              <i class="bi bi-whatsapp me-2"></i>Send Review on WhatsApp
            </a>

            <a class="btn btn-outline-dark w-100 mt-2" href="tel:7209770033">
              <i class="bi bi-telephone me-2"></i>Call 7209770033
            </a>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ===================== CONTACT CTA ===================== -->
<section class="section reviews-contact-section" id="contact">
  <div class="container">

    <div class="reviews-contact-card glass">
      <div>
        <div class="badge-chip mb-3">
          <i class="bi bi-chat-dots"></i> Need Help?
        </div>

        <h2 class="fw-bold mb-2">
          Want Product Details or Distributorship?
        </h2>

        <p class="muted mb-0">
          Contact FlyDayz team for product information, availability, bulk orders, and distributorship.
        </p>
      </div>

      <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-brand" href="tel:7209770033">
          <i class="bi bi-telephone me-2"></i>Call 7209770033
        </a>

        <a class="btn btn-outline-dark" target="_blank"
           href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20product%20details.">
          <i class="bi bi-whatsapp me-2"></i>WhatsApp
        </a>
      </div>
    </div>

  </div>
</section>


@endsection