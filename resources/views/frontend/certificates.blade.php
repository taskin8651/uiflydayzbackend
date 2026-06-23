@extends('frontend.master')
@section('content')

<!-- ===================== CERTIFICATION HERO ===================== -->
<section class="cf-hero" id="home">
  <div class="cf-hero-grid"></div>
  <div class="cf-glow cf-glow-one"></div>
  <div class="cf-glow cf-glow-two"></div>

  <img src="assets/images/decor/pad-outline-1.png" class="cf-hero-decor cf-decor-one" alt="">
  <img src="assets/images/decor/pad-outline-2.png" class="cf-hero-decor cf-decor-two" alt="">

  <div class="container position-relative">
    <div class="row align-items-center g-4 g-lg-5">

      <div class="col-lg-6">
        <div class="cf-kicker">
          <span><i class="bi bi-patch-check-fill"></i></span>
          Quality, Hygiene & Compliance
        </div>

        <h1 class="cf-hero-title">
          Certified Standards.
          <span>Trusted Feminine Care.</span>
        </h1>

        <p class="cf-hero-copy">
          Explore FlyDayz quality, manufacturing, laboratory and product-compliance
          credentials in one transparent certification centre.
        </p>

        <div class="cf-hero-points">
          <div>
            <i class="bi bi-award"></i>
            <span><strong>Quality Systems</strong>Structured process standards</span>
          </div>
          <div>
            <i class="bi bi-shield-check"></i>
            <span><strong>Hygiene Focus</strong>Clean manufacturing practices</span>
          </div>
          <div>
            <i class="bi bi-file-earmark-check"></i>
            <span><strong>Document Access</strong>View and download records</span>
          </div>
        </div>

        <div class="cf-hero-actions">
          <a href="#certificationLibrary" class="cf-btn-primary">
            Explore Certifications <i class="bi bi-arrow-down-short"></i>
          </a>
          <a href="{{ route('contact') }}" class="cf-btn-secondary">Request Verification</a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="cf-hero-showcase">

          <div class="cf-showcase-top">
            <span><i class="bi bi-shield-fill-check"></i> Trusted Standards</span>
            <strong>Verified</strong>
          </div>

          <div class="cf-seal-stage">
            <div class="cf-orbit cf-orbit-one"></div>
            <div class="cf-orbit cf-orbit-two"></div>

            <div class="cf-master-seal">
              <div class="cf-master-seal-inner">
                <i class="bi bi-patch-check-fill"></i>
                <strong>FlyDayz</strong>
                <span>Quality Assurance</span>
              </div>
            </div>

            <span class="cf-float-chip cf-chip-one"><i class="bi bi-award"></i> ISO</span>
            <span class="cf-float-chip cf-chip-two"><i class="bi bi-building-check"></i> GMP</span>
            <span class="cf-float-chip cf-chip-three"><i class="bi bi-beaker"></i> NABL</span>
            <span class="cf-float-chip cf-chip-four"><i class="bi bi-patch-check"></i> ISI</span>
          </div>

          <div class="cf-showcase-bottom">
            <div><strong>Quality</strong><span>Management</span></div>
            <div><strong>Hygiene</strong><span>Manufacturing</span></div>
            <div><strong>Compliance</strong><span>Documentation</span></div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- ===================== CERTIFICATION HERO END ===================== -->


<!-- ===================== TRUST SUMMARY ===================== -->
<section class="cf-trust-strip">
  <div class="container">
    <div class="cf-trust-grid">

      <div class="cf-trust-item">
        <div class="cf-trust-icon"><i class="bi bi-patch-check-fill"></i></div>
        <div>
          <strong>Recognized Standards</strong>
          <span>Quality-focused certification framework</span>
        </div>
      </div>

      <div class="cf-trust-item">
        <div class="cf-trust-icon"><i class="bi bi-shield-lock-fill"></i></div>
        <div>
          <strong>Hygiene Assurance</strong>
          <span>Clean production and handling focus</span>
        </div>
      </div>

      <div class="cf-trust-item">
        <div class="cf-trust-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
        <div>
          <strong>Downloadable Records</strong>
          <span>Easy access for buyers and partners</span>
        </div>
      </div>

      <div class="cf-trust-item">
        <div class="cf-trust-icon"><i class="bi bi-headset"></i></div>
        <div>
          <strong>Verification Support</strong>
          <span>Contact our team for documentation</span>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ===================== TRUST SUMMARY END ===================== -->


<!-- ===================== CERTIFICATION LIBRARY ===================== -->
<section class="section cf-library" id="certificationLibrary">
  <div class="container">

    <div class="cf-library-head">
      <div>
        <div class="cf-kicker">
          <span><i class="bi bi-grid-3x3-gap-fill"></i></span>
          Certification Library
        </div>
        <h2>Browse Certifications by Category</h2>
        <p>
          Filter quality, manufacturing, laboratory and product-compliance credentials.
        </p>
      </div>

      <div class="cf-library-count">
        <strong>4</strong>
        <span>Certification Categories</span>
      </div>
    </div>

   <div class="cf-filter-bar" role="group" aria-label="Certification category filters">
    <button class="cf-filter-btn active" type="button" data-cert-filter="all">
        <i class="bi bi-grid"></i> All
    </button>

    <button class="cf-filter-btn" type="button" data-cert-filter="quality">
        <i class="bi bi-award"></i> Quality
    </button>

    <button class="cf-filter-btn" type="button" data-cert-filter="manufacturing">
        <i class="bi bi-building-check"></i> Manufacturing
    </button>

    <button class="cf-filter-btn" type="button" data-cert-filter="laboratory">
        <i class="bi bi-beaker"></i> Laboratory
    </button>

    <button class="cf-filter-btn" type="button" data-cert-filter="compliance">
        <i class="bi bi-file-earmark-check"></i> Compliance
    </button>
</div>

@if(isset($certificateItems) && $certificateItems->count())
    <div class="cf-cert-grid">

        @foreach($certificateItems as $item)
            @php
                $fileUrl = $item->getFirstMediaUrl('certificate_file');
            @endphp

            <article class="cf-cert-card {{ $item->is_featured ? 'featured' : '' }}"
                     data-cert-category="{{ $item->category }}">

                <div class="cf-cert-top">
                    <span class="cf-cert-category">
                        {{ $item->category_label ?: ucfirst($item->category) }}
                    </span>

                    <span class="cf-cert-status {{ $item->status_type === 'neutral' ? 'neutral' : '' }}">
                        <i class="{{ $item->status_icon ?: 'bi bi-check-circle-fill' }}"></i>
                        {{ $item->status_label ?: 'Listed' }}
                    </span>
                </div>

                <div class="cf-cert-logo cf-doc-icon">
                    <i class="{{ $item->logo_icon_class ?: 'bi bi-journal-check' }}"></i>
                </div>

                <div class="cf-cert-body">

                    @if($item->code)
                        <span class="cf-cert-code">
                            {{ $item->code }}
                        </span>
                    @endif

                    <h3>{{ $item->title }}</h3>

                    @if($item->description)
                        <p>{{ $item->description }}</p>
                    @endif

                    <div class="cf-cert-meta">
                        <span>
                            <i class="{{ $item->meta_icon ?: 'bi bi-award' }}"></i>
                            {{ $item->meta_text ?: ucfirst($item->category) }}
                        </span>

                        <span>
                            <i class="bi bi-filetype-pdf"></i>
                            {{ $item->file_type ?: 'PDF Record' }}
                        </span>
                    </div>

                    <div class="cf-cert-actions">
                        @if($fileUrl)
                            <a href="{{ $fileUrl }}"
                               target="_blank"
                               class="cf-view-btn">
                                <i class="bi bi-eye"></i>
                                View
                            </a>

                            <a href="{{ $fileUrl }}"
                               download
                               class="cf-download-btn">
                                <i class="bi bi-download"></i>
                            </a>
                        @else
                            <button type="button"
                                    class="cf-view-btn"
                                    disabled>
                                <i class="bi bi-x-circle"></i>
                                No File
                            </button>
                        @endif
                    </div>

                </div>
            </article>
        @endforeach

    </div>
@else
    <div class="text-center py-5">
        <p class="mb-0">No certificates available.</p>
    </div>
@endif

    <div class="cf-empty-state" id="cfEmptyState" hidden>
      <i class="bi bi-folder2-open"></i>
      <h3>No certification found</h3>
      <p>Please select another category.</p>
    </div>

  </div>
</section>
<!-- ===================== CERTIFICATION LIBRARY END ===================== -->


<!-- ===================== QUALITY PROCESS ===================== -->
<section class="section cf-process">
  <div class="container">

    <div class="cf-section-head text-center">
      <div class="cf-kicker">
        <span><i class="bi bi-diagram-3-fill"></i></span>
        Quality Assurance Journey
      </div>
      <h2>How FlyDayz Supports Product Quality</h2>
      <p>
        A clear quality pathway from material selection to finished-pack review.
      </p>
    </div>

    <div class="cf-process-grid">

      <article class="cf-process-card">
        <span>01</span>
        <div class="cf-process-icon"><i class="bi bi-box2-heart"></i></div>
        <h3>Material Selection</h3>
        <p>Comfort-focused materials selected according to product requirements.</p>
      </article>

      <article class="cf-process-card">
        <span>02</span>
        <div class="cf-process-icon"><i class="bi bi-building-gear"></i></div>
        <h3>Controlled Production</h3>
        <p>Structured manufacturing and hygiene-focused handling processes.</p>
      </article>

      <article class="cf-process-card featured">
        <span>03</span>
        <div class="cf-process-icon"><i class="bi bi-beaker"></i></div>
        <h3>Quality Testing</h3>
        <p>Product and packaging checks supporting consistency and performance.</p>
      </article>

      <article class="cf-process-card">
        <span>04</span>
        <div class="cf-process-icon"><i class="bi bi-patch-check-fill"></i></div>
        <h3>Final Approval</h3>
        <p>Documented review before finished packs move toward distribution.</p>
      </article>

    </div>

  </div>
</section>
<!-- ===================== QUALITY PROCESS END ===================== -->


<!-- ===================== VERIFICATION SECTION ===================== -->
<section class="section cf-verify">
  <div class="container">

    <div class="cf-verify-card">
      <div class="row align-items-center g-4 g-lg-5">

        <div class="col-lg-6">
          <div class="cf-verify-content">
            <div class="cf-kicker">
              <span><i class="bi bi-search"></i></span>
              Document Verification
            </div>

            <h2>Need to Verify a Certificate?</h2>

            <p>
              Buyers, distributors and institutional partners can contact our team
              for certificate copies, current validity details and supporting records.
            </p>

            <div class="cf-verify-list">
              <div><i class="bi bi-check-circle-fill"></i> Certificate copy request</div>
              <div><i class="bi bi-check-circle-fill"></i> Validity and issue information</div>
              <div><i class="bi bi-check-circle-fill"></i> Buyer compliance documentation</div>
              <div><i class="bi bi-check-circle-fill"></i> Distributor support records</div>
            </div>

            <div class="cf-verify-actions">
              <a href="{{ $websiteSettings->phone_url }}" class="cf-btn-primary">
                <i class="bi bi-telephone"></i> Call {{ $websiteSettings->primary_phone }}
              </a>

              <a target="_blank"
                 href="{{ $websiteSettings->whatsappUrl() }}"
                 class="cf-whatsapp-btn">
                <i class="bi bi-whatsapp"></i> Verify on WhatsApp
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="cf-verify-visual">
            <div class="cf-document-stack cf-stack-back"></div>
            <div class="cf-document-stack cf-stack-mid"></div>

            <div class="cf-document-main">
              <div class="cf-document-head">
                <img src="assets/images/hero/logo.png" alt="FlyDayz">
                <i class="bi bi-patch-check-fill"></i>
              </div>

              <span>Quality & Compliance</span>
              <h3>Certificate Verification</h3>

              <div class="cf-document-lines">
                <i></i><i></i><i></i><i></i>
              </div>

              <div class="cf-document-seal">
                <i class="bi bi-award-fill"></i>
                <span>Verified<br>Document</span>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- ===================== VERIFICATION SECTION END ===================== -->


<!-- ===================== CERTIFICATION CTA ===================== -->
<section class="section cf-cta-section" id="contact">
  <div class="container">
    <div class="cf-cta-card">

      <div>
        <div class="cf-cta-badge">
          <i class="bi bi-shield-check"></i>
          Quality Documentation Support
        </div>

        <h2>Need Certificates for Business or Procurement?</h2>

        <p>
          Connect with FlyDayz for certification documents, product information,
          bulk orders and distributorship enquiries.
        </p>
      </div>

      <div class="cf-cta-actions">
        <a href="{{ route('downloads') }}" class="cf-btn-primary">
          <i class="bi bi-download"></i> Download Documents
        </a>

        <a target="_blank"
           href="{{ $websiteSettings->whatsappUrl() }}"
           class="cf-whatsapp-btn">
          <i class="bi bi-whatsapp"></i> WhatsApp
        </a>
      </div>

    </div>
  </div>
</section>
<!-- ===================== CERTIFICATION CTA END ===================== -->



@endsection
