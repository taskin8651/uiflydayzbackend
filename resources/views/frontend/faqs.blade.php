@extends('frontend.master')
@section('content')




<!-- ===================== FAQ HERO ===================== -->
<section class="faqs-page-hero" id="home">

  <div class="faqs-page-bg"></div>
  <div class="faqs-page-noise"></div>

  <img src="assets/img/blob-pink-blue.png" class="faqs-page-decor faqs-blob-1" alt="">
  <img src="assets/img/blob-soft-pink.png" class="faqs-page-decor faqs-blob-2" alt="">
  <img src="assets/img/cotton-1.png" class="faqs-page-decor faqs-cotton-1" alt="">
  <img src="assets/img/cotton-2.png" class="faqs-page-decor faqs-cotton-2" alt="">
  <img src="assets/img/pad-outline-1.png" class="faqs-page-pad-bg" alt="">

  <div class="container position-relative">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="badge-chip mb-3 faqs-page-reveal">
          <i class="bi bi-question-circle"></i> Quick Help & Answers
        </div>

        <h1 class="faqs-page-title faqs-page-reveal" style="--d:.10s">
          Questions?
          <span class="headline-accent">
            We’ve Got Answers
            <span class="headline-shine" aria-hidden="true"></span>
          </span>
        </h1>

        <p class="faqs-page-subtitle faqs-page-reveal" style="--d:.20s">
          Find quick answers about FlyDayz sanitary pads, size selection, comfort,
          usage, storage, buying options, and distributorship enquiries.
        </p>

        <div class="d-flex flex-wrap gap-2 faqs-page-reveal" style="--d:.30s">
          <a class="btn btn-brand" href="#productFaqs">
            <i class="bi bi-patch-question me-2"></i>View FAQs
          </a>

          <a class="btn btn-outline-dark" target="_blank"
             href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20have%20a%20question%20about%20FlyDayz%20pads.">
            <i class="bi bi-whatsapp me-2"></i>Ask on WhatsApp
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="faqs-hero-card glass faqs-page-reveal" style="--d:.20s">

          <div class="faqs-hero-pills">
            <span><i class="bi bi-rulers"></i> Size Guide</span>
            <span><i class="bi bi-cloud-check"></i> Comfort</span>
            <span><i class="bi bi-shield-plus"></i> Protection</span>
          </div>

          <div class="faqs-pack-stage">
            <img src="assets/images/products/product4.png" class="faqs-pack-img" alt="FlyDayz Pack">
            <img src="assets/images/products/product.png" class="faqs-outline-img" alt="">
          </div>

          <div class="faqs-help-box">
            <div class="help-icon">
              <i class="bi bi-headset"></i>
            </div>
            <div>
              <h6>Still confused?</h6>
              <p>Call or WhatsApp us for product selection and availability.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===================== FAQ CATEGORY CARDS ===================== -->
<section class="section faq-category-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="badge-chip mb-3">
        <i class="bi bi-grid-3x3-gap"></i> Help Topics
      </div>

      <h2 class="fw-bold mb-2">
        Browse FAQ <span class="brand-grad">Categories</span>
      </h2>

      <p class="muted mb-0">
        Choose a topic and get answers quickly.
      </p>
    </div>

    <div class="row g-4">

      <div class="col-md-6 col-lg-3">
        <a href="#sizeFaqs" class="faq-category-card glass">
          <div class="faq-category-icon">
            <i class="bi bi-rulers"></i>
          </div>
          <h5>Size Selection</h5>
          <p>Choose Regular, XL, or Overnight based on your need.</p>
        </a>
      </div>

      <div class="col-md-6 col-lg-3">
        <a href="#comfortFaqs" class="faq-category-card glass">
          <div class="faq-category-icon">
            <i class="bi bi-cloud-check"></i>
          </div>
          <h5>Comfort & Skin</h5>
          <p>Soft feel, freshness, and sensitive skin guidance.</p>
        </a>
      </div>

      <div class="col-md-6 col-lg-3">
        <a href="#usageFaqs" class="faq-category-card glass">
          <div class="faq-category-icon">
            <i class="bi bi-droplet-half"></i>
          </div>
          <h5>Usage & Protection</h5>
          <p>Leak control, changing time, and overnight use.</p>
        </a>
      </div>

      <div class="col-md-6 col-lg-3">
        <a href="#buyFaqs" class="faq-category-card glass">
          <div class="faq-category-icon">
            <i class="bi bi-shop"></i>
          </div>
          <h5>Buying & Support</h5>
          <p>Product availability, bulk orders, and distributorship.</p>
        </a>
      </div>

    </div>

  </div>
</section>

<!-- ===================== MAIN FAQ ACCORDION ===================== -->
<section class="section bg-soft faqs-main-section" id="productFaqs">
  <div class="container">

    <div class="text-center mb-4">
      <div class="badge-chip mb-3">
        <i class="bi bi-patch-question"></i> Frequently Asked Questions
      </div>

      <h2 class="fw-bold mb-2">Everything You Need to Know</h2>
      <p class="muted mb-0">
        Quick answers about FlyDayz premium sanitary pads.
      </p>
    </div>

    <div class="faq-search-card glass mb-4">
      <div class="faq-search-icon">
        <i class="bi bi-search"></i>
      </div>
      <input type="text" id="faqSearchInput" placeholder="Search FAQs..." aria-label="Search FAQs">
    </div>

    @if(isset($faqItems) && $faqItems->count())

    @php
        $groupedFaqs = $faqItems->groupBy('group_key');
        $faqCounter = 1;
        $firstOpenUsed = false;
    @endphp

    <div class="accordion faq-page-accordion glass p-2" id="faqPageAccordion">

        @foreach($groupedFaqs as $groupKey => $faqs)

            @php
                $firstFaq = $faqs->first();
            @endphp

            <div class="faq-group-title" id="{{ $groupKey }}Faqs">
                <i class="{{ $firstFaq->group_icon ?: 'bi bi-question-circle' }}"></i>
                {{ $firstFaq->group_title }}
            </div>

            @foreach($faqs as $faq)

                @php
                    $faqId = 'faqDynamic' . $faq->id;

                    $isOpen = false;

                    if ($faq->is_open && !$firstOpenUsed) {
                        $isOpen = true;
                        $firstOpenUsed = true;
                    } elseif (!$firstOpenUsed && $loop->parent->first && $loop->first) {
                        $isOpen = true;
                        $firstOpenUsed = true;
                    }
                @endphp

                <div class="accordion-item faq-item border-0 faq-search-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button faq-btn {{ $isOpen ? '' : 'collapsed' }}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#{{ $faqId }}"
                                aria-expanded="{{ $isOpen ? 'true' : 'false' }}">
                            <span class="faq-ic">
                                <i class="{{ $faq->question_icon ?: 'bi bi-question-circle' }}"></i>
                            </span>
                            {{ $faq->question }}
                        </button>
                    </h2>

                    <div id="{{ $faqId }}"
                         class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}"
                         data-bs-parent="#faqPageAccordion">
                        <div class="accordion-body faq-body">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>

            @endforeach

        @endforeach

        <div class="faq-no-result" id="faqNoResult">
            <i class="bi bi-search"></i>
            <h5>No FAQ found</h5>
            <p>Try another keyword or contact us on WhatsApp.</p>
        </div>

    </div>

@else

    <div class="text-center py-5">
        <p class="mb-0">No FAQs available.</p>
    </div>

@endif

  </div>
</section>




<!-- ===================== QUICK HELP SECTION ===================== -->
<section class="section faq-help-section">
  <div class="faq-help-glow faq-help-glow-1"></div>
  <div class="faq-help-glow faq-help-glow-2"></div>

  <div class="container position-relative">

    <div class="text-center mb-5 faq-help-head">
      <div class="badge-chip mb-3">
        <i class="bi bi-headset"></i> Need Personal Help?
      </div>

      <h2 class="faq-help-title fw-bold mb-2">We Can Help You Choose</h2>

      <p class="faq-help-subtitle muted mb-0">
        Not sure about size, product type, or availability? Contact us directly.
      </p>
    </div>

    <div class="row g-4 faq-help-row">

      <div class="col-md-4">
        <div class="faq-help-card glass">
          <div class="faq-help-icon">
            <i class="bi bi-rulers"></i>
          </div>

          <h5>Choose Pad Size</h5>

          <p>
            Get guidance based on flow, day use, night use, and comfort need.
          </p>

          <a class="btn btn-brand btn-sm" target="_blank"
             href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20need%20help%20choosing%20pad%20size.">
            Ask Now
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="faq-help-card glass active">
          <div class="faq-help-icon">
            <i class="bi bi-bag-heart"></i>
          </div>

          <h5>Product Details</h5>

          <p>
            Know more about Regular, XL, Overnight, and Pocket Pack options.
          </p>

          <a class="btn btn-brand btn-sm" target="_blank"
             href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20product%20details.">
            Get Details
          </a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="faq-help-card glass">
          <div class="faq-help-icon">
            <i class="bi bi-briefcase"></i>
          </div>

          <h5>Distributorship</h5>

          <p>
            Ask about business partnership, bulk orders, and availability.
          </p>

          <a class="btn btn-brand btn-sm" target="_blank"
             href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20distributorship%20details.">
            Partner With Us
          </a>
        </div>
      </div>

    </div>

  </div>
</section>
<!-- ===================== QUICK HELP SECTION END ===================== -->




<!-- ===================== CONTACT CTA ===================== -->
<section class="section bg-soft faqs-contact-section" id="contact">
  <div class="container">

    <div class="faqs-contact-card glass">
      <div>
        <div class="badge-chip mb-3">
          <i class="bi bi-chat-dots"></i> Still Have Questions?
        </div>

        <h2 class="fw-bold mb-2">
          Chat With FlyDayz Team
        </h2>

        <p class="muted mb-0">
          Contact us for product guidance, availability, bulk orders, or distributorship.
        </p>
      </div>

      <div class="d-flex flex-wrap gap-2">
        <a class="btn btn-brand" href="tel:7209770033">
          <i class="bi bi-telephone me-2"></i>Call 7209770033
        </a>

        <a class="btn btn-outline-dark" target="_blank"
           href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20have%20a%20question%20about%20FlyDayz%20pads.">
          <i class="bi bi-whatsapp me-2"></i>WhatsApp
        </a>
      </div>
    </div>

  </div>
</section>




@endsection