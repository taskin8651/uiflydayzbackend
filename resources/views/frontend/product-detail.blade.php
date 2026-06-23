@extends('frontend.master')

@section('content')

@php
    $mainImage = $product->getFirstMediaUrl('product_main_image')
        ?: asset('assets/images/products/product.png');

    $galleryImages = $product->getMedia('product_gallery');

    $features = array_filter([
        $product->feature_one,
        $product->feature_two,
        $product->feature_three,
        $product->feature_four,
    ]);

    $rating = (float) $product->rating;
@endphp

<main>

    <!-- ===================== PRODUCT DETAIL SECTION ===================== -->
    <section class="pdx-detail-section" id="productDetail">

        <div class="pdx-bg-grid"></div>
        <div class="pdx-glow pdx-glow-one"></div>
        <div class="pdx-glow pdx-glow-two"></div>

        <div class="container position-relative">

          

            <div class="row align-items-center g-4 g-lg-5">

                <!-- LEFT IMAGE GALLERY -->
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
                                <span>{{ $product->float_one_text ?: 'Comfort Absorption' }}</span>
                            </div>

                            <div class="pdx-float-card pdx-float-two">
                                <i class="bi bi-shield-check"></i>
                                <span>{{ $product->float_two_text ?: 'Leak Guard' }}</span>
                            </div>

                        </div>

                        <!-- THUMBNAILS -->
                        <div class="pdx-thumb-row">

                            <button type="button"
                                    class="pdx-thumb active"
                                    data-image="{{ $mainImage }}">
                                <img src="{{ $mainImage }}" alt="{{ $product->name }}">
                            </button>

                            @foreach($galleryImages as $image)
                                <button type="button"
                                        class="pdx-thumb"
                                        data-image="{{ $image->getUrl() }}">
                                    <img src="{{ $image->getUrl() }}" alt="{{ $product->name }}">
                                </button>
                            @endforeach

                        </div>

                    </div>
                </div>

                <!-- RIGHT DETAILS -->
                <div class="col-lg-6">
                    <div class="pdx-detail-content">

                        <div class="pdx-kicker">
                            <span>
                                <i class="bi bi-bag-heart-fill"></i>
                            </span>
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

                            <span>
                                {{ $product->rating_text ?: number_format($rating, 1) . '/5 customer rating' }}
                            </span>

                        </div>

                        <div class="pdx-info-grid">

                            <div class="pdx-info-box">
                                <small>Size</small>
                                <strong>
                                    {{ $product->size_text ?: optional($product->sizeCategory)->size_label ?: '—' }}
                                </strong>
                            </div>

                            <div class="pdx-info-box">
                                <small>Flow</small>
                                <strong>
                                    {{ $product->flow_text ?: optional($product->sizeCategory)->flow_label ?: '—' }}
                                </strong>
                            </div>

                            <div class="pdx-info-box">
                                <small>Pack</small>
                                <strong>{{ $product->pack_text ?: '—' }}</strong>
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

                            <a href="{{ route('contact') }}" class="pdx-btn pdx-btn-primary">
                                Buy / Enquire
                                <i class="bi bi-arrow-right-short"></i>
                            </a>

                            <a target="_blank"
                               rel="noopener"
                               href="{{ $websiteSettings->whatsappUrl('Hi ' . $websiteSettings->website_name . ' Team, I want details about ' . $product->name . '.') }}"
                               class="pdx-btn pdx-btn-whatsapp">
                                <i class="bi bi-whatsapp"></i>
                                WhatsApp
                            </a>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- ===================== PRODUCT DESCRIPTION SECTION ===================== -->
    <section class="pdx-description-section">
        <div class="container">

            <div class="pdx-description-card">

                <div class="row g-4 g-lg-5">

                    <div class="col-lg-7">

                        <div class="pdx-section-kicker">
                            <span>
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                            Product Description
                        </div>

                        <h2 class="pdx-section-title">
                            Comfort, Coverage & Confidence in Every Pack
                        </h2>

                        @if($product->short_description)
                            <p class="pdx-description-text">
                                {{ $product->short_description }}
                            </p>
                        @endif

                        <div class="pdx-description-icons">

                            <div>
                                <i class="bi bi-cloud-check-fill"></i>
                                <strong>Soft Feel</strong>
                                <span>Comfort-first protection</span>
                            </div>

                            <div>
                                <i class="bi bi-droplet-half"></i>
                                <strong>Absorbent Care</strong>
                                <span>{{ $product->absorption_type ?: 'Reliable absorption' }}</span>
                            </div>

                            <div>
                                <i class="bi bi-shield-lock-fill"></i>
                                <strong>Leak Guard</strong>
                                <span>Secure protection</span>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-5">

                        <div class="pdx-spec-card">

                            <div class="pdx-spec-head">
                                <i class="bi bi-list-check"></i>
                                <h3>Product Specification</h3>
                            </div>

                            <div class="pdx-spec-list">

                                <div class="pdx-spec-row">
                                    <span>Product Name</span>
                                    <strong>{{ $product->name }}</strong>
                                </div>

                                <div class="pdx-spec-row">
                                    <span>Size</span>
                                    <strong>
                                        {{ $product->size_text ?: optional($product->sizeCategory)->size_label ?: '—' }}
                                    </strong>
                                </div>

                                <div class="pdx-spec-row">
                                    <span>Flow Type</span>
                                    <strong>
                                        {{ $product->flow_text ?: optional($product->sizeCategory)->flow_label ?: '—' }}
                                    </strong>
                                </div>

                                <div class="pdx-spec-row">
                                    <span>Pack Size</span>
                                    <strong>{{ $product->pack_text ?: '—' }}</strong>
                                </div>

                                <div class="pdx-spec-row">
                                    <span>Protection</span>
                                    <strong>
                                        {{ optional($product->protectionType)->title ?: 'Premium Care' }}
                                    </strong>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- ===================== RELATED PRODUCTS SECTION ===================== -->
    @if($relatedProducts->isNotEmpty())
        <section class="pdx-related-section">
            <div class="container">

                <div class="pdx-related-head text-center">

                    <div class="pdx-section-kicker mx-auto">
                        <span>
                            <i class="bi bi-box-seam-fill"></i>
                        </span>
                        Related Products
                    </div>

                    <h2 class="pdx-section-title">
                        Explore More Products
                    </h2>

                    <p class="pdx-section-subtitle">
                        Choose the right product according to flow, size and comfort need.
                    </p>

                </div>

                <div class="row g-4">

                    @foreach($relatedProducts as $related)

                        @php
                            $relatedImage = $related->getFirstMediaUrl('product_main_image')
                                ?: asset('assets/images/products/product.png');
                        @endphp

                        <div class="col-md-6 col-lg-4">
                            <article class="pdx-related-card">

                                <div class="pdx-related-tag">
                                    {{ $related->flow_text ?: optional($related->sizeCategory)->flow_label ?: 'Premium Care' }}
                                </div>

                                <div class="pdx-related-img">
                                    <img src="{{ $relatedImage }}" alt="{{ $related->name }}">
                                </div>

                                <div class="pdx-related-body">

                                    <h3>{{ $related->name }}</h3>

                                    @if($related->short_description)
                                        <p>{{ $related->short_description }}</p>
                                    @endif

                                    <div class="pdx-related-meta">

                                        <span>
                                            <i class="bi bi-rulers"></i>
                                            {{ $related->size_text ?: optional($related->sizeCategory)->name }}
                                        </span>

                                        <span>
                                            <i class="bi bi-shield-check"></i>
                                            {{ optional($related->protectionType)->title ?: 'Comfort Care' }}
                                        </span>

                                    </div>

                                    <a href="{{ route('products.show', $related->slug) }}"
                                       class="pdx-related-btn">
                                        View Details
                                        <i class="bi bi-arrow-right-short"></i>
                                    </a>

                                </div>

                            </article>
                        </div>

                    @endforeach

                </div>

            </div>
        </section>
    @endif

</main>

@endsection

@section('scripts')
@parent

<script>
document.querySelectorAll('.pdx-thumb').forEach(function (thumb) {
    thumb.addEventListener('click', function () {
        const mainImage = document.getElementById('pdxMainImage');
        const imageUrl = this.getAttribute('data-image');

        if (mainImage && imageUrl) {
            mainImage.setAttribute('src', imageUrl);
        }

        document.querySelectorAll('.pdx-thumb').forEach(function (item) {
            item.classList.remove('active');
        });

        this.classList.add('active');
    });
});
</script>

@endsection