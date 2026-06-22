@extesnds('frontend.master')
@section('content')


<main class="products-page">

  <!-- ===================== PRODUCTS PAGE HERO ===================== -->
  <section class="product-page-hero">
    <div class="product-page-glow one"></div>
    <div class="product-page-glow two"></div>

    <div class="container position-relative">
      <div class="row align-items-center g-4 g-lg-5">
        <div class="col-lg-6">
          <div class="product-page-kicker">
            <span><i class="bi bi-bag-heart"></i></span>
            FlyDayz Premium Products
          </div>

          <h1 class="product-page-title">
            Choose Comfort by <span>Flow, Size & Care</span>
          </h1>

          <p class="product-page-text">
            Discover FlyDayz sanitary pads category-wise — from daily comfort to heavy flow and night-care protection. Each product is crafted for softness, freshness, and dependable hygiene care.
          </p>

          <div class="product-hero-actions">
            <a href="#product-catalog" class="fd-btn-primary">
              View Products <i class="bi bi-arrow-right-short ms-1"></i>
            </a>
            <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20need%20help%20choosing%20the%20right%20pad." class="fd-btn-secondary">
              <i class="bi bi-whatsapp me-2"></i>Ask on WhatsApp
            </a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="product-hero-visual">
            <img src="assets/images/products/product2.png" class="product-hero-pack" alt="FlyDayz premium product pack">
            <div class="hero-mini-card a"><i class="bi bi-feather"></i> Soft Touch</div>
            <div class="hero-mini-card b"><i class="bi bi-droplet-fill"></i> Gel Lock</div>
            <div class="hero-mini-card c"><i class="bi bi-shield-check"></i> Leak Guard</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== PRODUCTS PAGE HERO END ===================== -->

  <!-- ===================== CATEGORY WISE PRODUCTS ===================== -->
  <section id="product-catalog" class="product-category-section">
    <div class="container">
      <div class="category-shell">
        <div class="category-header">
          <div>
            <div class="category-kicker"><i class="bi bi-grid-3x3-gap-fill"></i> Category Wise Collection</div>
            <h2 class="category-title">Premium Product Range</h2>
            <p class="category-subtitle">Filter products by usage and flow type. Keep the images in the same assets folder and update product names/details whenever required.</p>
          </div>

          <div class="category-tabs" aria-label="Product filters">
            <button class="product-filter-btn active" data-filter="all" type="button">All</button>
            <button class="product-filter-btn" data-filter="daily" type="button">Daily Care</button>
            <button class="product-filter-btn" data-filter="heavy" type="button">Heavy Flow</button>
            <button class="product-filter-btn" data-filter="night" type="button">Night Care</button>
            <button class="product-filter-btn" data-filter="type" type="button">Product Type</button>
          </div>
        </div>

        <div class="product-catalog-grid">

          <article class="catalog-card" data-category="daily">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-sun"></i> Daily Care</span>
              <span class="catalog-size">L • 240mm</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product.png" alt="FlyDayz Regular L 240mm">
            </div>
            <div class="catalog-body">
              <h3>FlyDayz Regular</h3>
              <p>Soft everyday protection for normal flow with fresh and comfortable feel.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Size</small><strong>L-240mm</strong></div>
                <div class="catalog-spec"><small>Flow</small><strong>Normal</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20Regular%20L%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

          <article class="catalog-card" data-category="heavy">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-droplet-half"></i> Heavy Flow</span>
              <span class="catalog-size">XL • 280mm</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product.png" alt="FlyDayz Heavy Flow XL 280mm">
            </div>
            <div class="catalog-body">
              <h3>FlyDayz Heavy Flow</h3>
              <p>Extra confidence for heavy flow days with comfort-first absorbent care.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Size</small><strong>XL-280mm</strong></div>
                <div class="catalog-spec"><small>Flow</small><strong>Heavy</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20XL%20280mm%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

          <article class="catalog-card" data-category="night heavy">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-moon-stars"></i> Night Care</span>
              <span class="catalog-size">XXL • 330mm</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product2.png" alt="FlyDayz Very Heavy Flow XXL 330mm">
            </div>
            <div class="catalog-body">
              <h3>FlyDayz Overnight XXL</h3>
              <p>Longer coverage support for very heavy flow and peaceful night-care protection.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Size</small><strong>XXL-330mm</strong></div>
                <div class="catalog-spec"><small>Flow</small><strong>Very Heavy</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20XXL%20330mm%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

          <article class="catalog-card" data-category="type daily">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-shield-check"></i> Product Type</span>
              <span class="catalog-size">Straight Pads</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product.png" alt="FlyDayz Straight Pads">
            </div>
            <div class="catalog-body">
              <h3>Straight Pads</h3>
              <p>Classic comfort and dependable protection for daily feminine hygiene needs.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Type</small><strong>Straight</strong></div>
                <div class="catalog-spec"><small>Use</small><strong>Everyday</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20Straight%20Pads%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

          <article class="catalog-card" data-category="type heavy night">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-feather"></i> Product Type</span>
              <span class="catalog-size">Ultra Thin</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product2.png" alt="FlyDayz Ultra Thin Napkins">
            </div>
            <div class="catalog-body">
              <h3>Ultra Thin Napkins</h3>
              <p>Slim, light, premium protection designed for fresh comfort and easy movement.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Type</small><strong>Ultra Thin</strong></div>
                <div class="catalog-spec"><small>Feel</small><strong>Lightweight</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%20Ultra%20Thin%20Napkins%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

          <article class="catalog-card" data-category="daily heavy night">
            <div class="catalog-card-top">
              <span class="catalog-badge"><i class="bi bi-stars"></i> 5 in 1</span>
              <span class="catalog-size">Premium Care</span>
            </div>
            <div class="catalog-media">
              <img src="assets/images/products/product1.png" alt="FlyDayz 5 in 1 Protection">
            </div>
            <div class="catalog-body">
              <h3>5 in 1 Protection Pack</h3>
              <p>Premium care with fragrance-free comfort, wider wings, absorption and freshness support.</p>
              <div class="catalog-specs">
                <div class="catalog-spec"><small>Care</small><strong>5 in 1</strong></div>
                <div class="catalog-spec"><small>Use</small><strong>All Day</strong></div>
              </div>
              <div class="catalog-actions">
                <a href="product-detail.html" class="catalog-btn primary">View More</a>
                <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20I%20want%205%20in%201%20Protection%20Pack%20details." class="catalog-btn whatsapp"><i class="bi bi-whatsapp"></i></a>
              </div>
            </div>
          </article>

        </div>

        <div class="product-compare-strip">
          <div>
            <h3>Need help choosing the right FlyDayz pad?</h3>
            <p>Tell us your flow type, usage time, and comfort preference. Our team will guide you.</p>
          </div>
          <a target="_blank" href="https://wa.me/917209770033?text=Hi%20FlyDayz%20Team%2C%20please%20help%20me%20choose%20the%20right%20pad." class="fd-btn-primary">
            <i class="bi bi-whatsapp me-2"></i>Get Guidance
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== CATEGORY WISE PRODUCTS END ===================== -->

</main>

@endsection