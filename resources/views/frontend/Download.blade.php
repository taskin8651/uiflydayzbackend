@extends('frontend.master')
@section('content')


<!-- ===================== DOWNLOAD HERO ===================== -->
<section class="dl-hero" id="home">
  <div class="dl-hero-grid"></div>
  <div class="dl-glow dl-glow-one"></div>
  <div class="dl-glow dl-glow-two"></div>

  <div class="container position-relative">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-6">
        <div class="dl-kicker">
          <span><i class="bi bi-cloud-arrow-down-fill"></i></span>
          FlyDayz Download Centre
        </div>

        <h1 class="dl-hero-title">
          Everything You Need.
          <span>Ready to Download.</span>
        </h1>

        <p class="dl-hero-copy">
          Access FlyDayz product catalogues, size guides, business brochures,
          certificates and brand resources from one premium download centre.
        </p>

        <div class="dl-hero-stats">
          <div><strong>4</strong><span>Download Categories</span></div>
          <div><strong>8+</strong><span>Useful Resources</span></div>
          <div><strong>PDF</strong><span>Easy to Share</span></div>
        </div>

        <div class="dl-hero-actions">
          <a href="#downloads" class="dl-btn-primary">
            Browse Downloads <i class="bi bi-arrow-down-short"></i>
          </a>
          <a href="{{ route('contact') }}" class="dl-btn-secondary">
            Need Help?
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="dl-hero-card">
          <div class="dl-card-top">
            <span><i class="bi bi-file-earmark-pdf-fill"></i> Latest Catalogue</span>
            <strong>2026</strong>
          </div>

          <div class="dl-card-stage">
            <div class="dl-ring ring-one"></div>
            <div class="dl-ring ring-two"></div>
            <img src="assets/images/decor/pad-outline-1.png" class="dl-card-bg" alt="">
            <img src="assets/images/products/product1.png" class="dl-card-product" alt="FlyDayz Product Catalogue">

            <span class="dl-float-pill pill-one"><i class="bi bi-images"></i> Product Range</span>
            <span class="dl-float-pill pill-two"><i class="bi bi-rulers"></i> Size Guide</span>
            <span class="dl-float-pill pill-three"><i class="bi bi-briefcase"></i> Business Info</span>
          </div>

          <div class="dl-card-bottom">
            <div><i class="bi bi-filetype-pdf"></i><span>PDF Format</span></div>
            <div><i class="bi bi-share"></i><span>Easy Sharing</span></div>
            <div><i class="bi bi-phone"></i><span>Mobile Ready</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ===================== DOWNLOAD HERO END ===================== -->

<!-- ===================== DOWNLOAD CATEGORY NAV ===================== -->
<section class="dl-category-nav" id="downloads">
  <div class="container">
    <div class="dl-category-wrap">
      <button class="dl-filter-btn active" data-dl-filter="all"><i class="bi bi-grid-3x3-gap"></i> All Downloads</button>
      <button class="dl-filter-btn" data-dl-filter="catalogue"><i class="bi bi-journal-richtext"></i> Catalogues</button>
      <button class="dl-filter-btn" data-dl-filter="product"><i class="bi bi-bag-heart"></i> Product Guides</button>
      <button class="dl-filter-btn" data-dl-filter="business"><i class="bi bi-briefcase"></i> Business</button>
      <button class="dl-filter-btn" data-dl-filter="certificate"><i class="bi bi-patch-check"></i> Certificates</button>
    </div>
  </div>
</section>
<!-- ===================== DOWNLOAD CATEGORY NAV END ===================== -->

<!-- ===================== DOWNLOAD GRID ===================== -->
<section class="section dl-library">
  <div class="container">

    <div class="dl-section-head text-center">
      <div class="dl-kicker">
        <span><i class="bi bi-folder2-open"></i></span>
        Resource Library
      </div>
      <h2>Download by Category</h2>
      <p>Choose the resource you need and download it instantly.</p>
    </div>

    @if(isset($downloadItems) && $downloadItems->count())
    <div class="dl-grid">

        @foreach($downloadItems as $item)
            @php
                $fileUrl = $item->getFirstMediaUrl('download_file');
            @endphp

            <article class="dl-card {{ $item->is_featured ? 'featured' : '' }}"
                     data-dl-category="{{ $item->category }}">

                @if($item->badge_text)
                    <div class="dl-card-badge">
                        {{ $item->badge_text }}
                    </div>
                @endif

                <div class="dl-file-icon">
                    <i class="{{ $item->icon_class ?: 'bi bi-journal-richtext' }}"></i>
                </div>

                @if($item->type)
                    <span class="dl-type">{{ $item->type }}</span>
                @endif

                <h3>{{ $item->title }}</h3>

                @if($item->description)
                    <p>{{ $item->description }}</p>
                @endif

                <div class="dl-meta">
                    <span>
                        <i class="bi bi-filetype-pdf"></i>
                        {{ $item->file_type ?: 'PDF' }}
                    </span>

                    @if($item->file_size)
                        <span>
                            <i class="bi bi-hdd"></i>
                            {{ $item->file_size }}
                        </span>
                    @endif

                    @if($item->meta_text)
                        <span>
                            <i class="{{ $item->meta_icon ?: 'bi bi-calendar3' }}"></i>
                            {{ $item->meta_text }}
                        </span>
                    @endif
                </div>

                @if($fileUrl)
                    <a href="{{ $fileUrl }}"
                       download
                       class="dl-download-btn">
                        <i class="bi bi-download"></i>
                        {{ $item->button_text ?: 'Download' }}
                    </a>
                @else
                    <button type="button"
                            class="dl-download-btn"
                            disabled>
                        <i class="bi bi-x-circle"></i>
                        File Not Available
                    </button>
                @endif

            </article>
        @endforeach

    </div>
@else
    <div class="text-center py-5">
        <p class="mb-0">No downloads available.</p>
    </div>
@endif
  </div>
</section>
<!-- ===================== DOWNLOAD GRID END ===================== -->

<!-- ===================== FEATURED DOWNLOAD ===================== -->
<section class="section dl-featured">
  <div class="container">
    <div class="dl-featured-card">
      <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-6">
          <div class="dl-featured-copy">
            <div class="dl-kicker">
              <span><i class="bi bi-stars"></i></span>
              Featured Resource
            </div>
            <h2>Download the Complete FlyDayz Catalogue</h2>
            <p>
              Get one beautifully designed PDF containing the complete product range,
              protection features, sizes and business information.
            </p>
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Full product range</li>
              <li><i class="bi bi-check-circle-fill"></i> Size and flow guidance</li>
              <li><i class="bi bi-check-circle-fill"></i> Product benefits</li>
              <li><i class="bi bi-check-circle-fill"></i> Distributor information</li>
            </ul>
            <a href="assets/downloads/flydayz-product-catalogue.pdf" download class="dl-btn-primary">
              <i class="bi bi-download"></i> Download Complete Catalogue
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="dl-featured-visual">
            <div class="dl-doc-back"></div>
            <div class="dl-doc-front">
              <div class="dl-doc-brand">
                <img src="assets/images/hero/logo.png" alt="FlyDayz">
              </div>
              <span>Premium Feminine Hygiene</span>
              <h3>Product Catalogue</h3>
              <img src="assets/images/products/product1.png" alt="FlyDayz Catalogue Cover">
              <div class="dl-doc-year">2026 Edition</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ===================== FEATURED DOWNLOAD END ===================== -->

<!-- ===================== HELP CTA ===================== -->
<section class="section dl-help" id="contact">
  <div class="container">
    <div class="dl-help-card">
      <div>
        <div class="dl-help-badge"><i class="bi bi-headset"></i> Need a Custom Document?</div>
        <h2>Can’t Find the Resource You Need?</h2>
        <p>Contact FlyDayz for product details, business documents, bulk enquiries or distributorship support.</p>
      </div>
      <div class="dl-help-actions">
        <a href="tel:7209770033" class="dl-btn-primary"><i class="bi bi-telephone"></i> Call 7209770033</a>
        <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20need%20a%20catalogue%20or%20download%20document." class="dl-whatsapp"><i class="bi bi-whatsapp"></i> WhatsApp</a>
      </div>
    </div>
  </div>
</section>
<!-- ===================== HELP CTA END ===================== -->
@endsection
