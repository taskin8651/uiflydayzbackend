@extends('frontend.master')
@section('content')


<!-- ===================== CONTACT HERO ===================== -->
<section class="contact-page-hero" id="home">

  <div class="contact-page-bg"></div>
  <div class="contact-page-noise"></div>

  <img src="assets/img/blob-pink-blue.png" class="contact-page-decor contact-blob-1" alt="">
  <img src="assets/img/blob-soft-pink.png" class="contact-page-decor contact-blob-2" alt="">
  <img src="assets/img/cotton-1.png" class="contact-page-decor contact-cotton-1" alt="">
  <img src="assets/img/cotton-2.png" class="contact-page-decor contact-cotton-2" alt="">
  <img src="assets/img/pad-outline-1.png" class="contact-page-pad-bg" alt="">

  <div class="container position-relative">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="badge-chip mb-3 contact-page-reveal">
          <i class="bi bi-chat-dots"></i> Contact FlyDayz Team
        </div>

        <h1 class="contact-page-title contact-page-reveal" style="--d:.10s">
          Let’s Talk.
          <span class="headline-accent">
            We’re Here to Help
            <span class="headline-shine" aria-hidden="true"></span>
          </span>
        </h1>

        <p class="contact-page-subtitle contact-page-reveal" style="--d:.20s">
          Contact FlyDayz for product details, availability, bulk orders,
          distributorship, retail partnership and customer support.
        </p>

        <div class="d-flex flex-wrap gap-2 contact-page-reveal" style="--d:.30s">
          <a class="btn btn-brand" href="{{ $websiteSettings->phone_url }}">
            <i class="bi bi-telephone me-2"></i>Call {{ $websiteSettings->primary_phone }}
          </a>

          <a class="btn btn-outline-dark" target="_blank"
             href="{{ $websiteSettings->whatsappUrl() }}">
            <i class="bi bi-whatsapp me-2"></i>WhatsApp Now
          </a>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="contact-hero-card glass contact-page-reveal" style="--d:.20s">

          <div class="contact-hero-pills">
            <span><i class="bi bi-telephone"></i> Direct Call</span>
            <span><i class="bi bi-whatsapp"></i> WhatsApp Support</span>
            <span><i class="bi bi-briefcase"></i> Business Enquiry</span>
          </div>

          <div class="contact-pack-stage">
            <img src="assets/images/products/product2.png" class="contact-pack-img" alt="FlyDayz Pack">
            <img src="assets/images/products/product.png " class="contact-outline-img" alt="">
          </div>

          <div class="contact-number-box">
            <div class="contact-number-icon">
              <i class="bi bi-headset"></i>
            </div>
            <div>
              <h6>Quick Support</h6>
              <a href="{{ $websiteSettings->phone_url }}">{{ $websiteSettings->primary_phone }}</a>
              <p>Available for product, bulk order and distributorship enquiries.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!-- ===================== CONTACT HERO END ===================== -->



<!-- ===================== CONTACT OPTIONS ===================== -->
<section class="section contact-options-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="badge-chip mb-3">
        <i class="bi bi-grid-3x3-gap"></i> Contact Options
      </div>

      <h2 class="fw-bold mb-2">
        Choose How You Want to <span class="brand-grad">Connect</span>
      </h2>

      <p class="muted mb-0">
        We’re available for customer support, wholesale enquiry and business partnership.
      </p>
    </div>

    <div class="row g-4">

      <div class="col-md-6 col-lg-3">
        <div class="contact-option-card glass">
          <div class="contact-option-icon">
            <i class="bi bi-telephone"></i>
          </div>
          <h5>Call Us</h5>
          <p>Speak directly with our team for quick assistance.</p>
          <a class="btn btn-brand btn-sm" href="{{ $websiteSettings->phone_url }}">
            Call Now
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="contact-option-card glass">
          <div class="contact-option-icon">
            <i class="bi bi-whatsapp"></i>
          </div>
          <h5>WhatsApp</h5>
          <p>Chat with us for product details and availability.</p>
          <a class="btn btn-brand btn-sm" target="_blank"
             href="{{ $websiteSettings->whatsappUrl() }}">
            Chat Now
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="contact-option-card glass">
          <div class="contact-option-icon">
            <i class="bi bi-bag-heart"></i>
          </div>
          <h5>Product Enquiry</h5>
          <p>Know about Regular, XL, Overnight and Pocket Pack.</p>
          <a class="btn btn-brand btn-sm" target="_blank"
             href="{{ $websiteSettings->whatsappUrl() }}">
            Get Details
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="contact-option-card glass">
          <div class="contact-option-icon">
            <i class="bi bi-briefcase"></i>
          </div>
          <h5>Distributorship</h5>
          <p>Partner with FlyDayz for business and bulk orders.</p>
          <a class="btn btn-brand btn-sm" href="#distributorship">
            Partner Now
          </a>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ===================== CONTACT FORM SECTION ===================== -->
<section class="section bg-soft contact-form-section">
  <div class="container">

    <div class="row g-5 align-items-center">

      <div class="col-lg-6">
        <div class="contact-form-info">
          <div class="badge-chip mb-3">
            <i class="bi bi-envelope-paper"></i> Send Enquiry
          </div>

          <h2 class="fw-bold mb-3">
            Have a Question? Send Your Details
          </h2>

          <p class="muted mb-4">
            Fill the form and our team will contact you. You can also directly call
            or WhatsApp us for faster response.
          </p>

          <div class="contact-info-list">

            <div class="contact-info-item glass">
              <div class="contact-info-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div>
                <h6>Phone</h6>
                <a href="{{ $websiteSettings->phone_url }}">{{ $websiteSettings->primary_phone }}</a>
              </div>
            </div>

            <div class="contact-info-item glass">
              <div class="contact-info-icon">
                <i class="bi bi-whatsapp"></i>
              </div>
              <div>
                <h6>WhatsApp</h6>
                <a target="_blank" href="{{ $websiteSettings->whatsappUrl() }}">Chat with {{ $websiteSettings->website_name }}</a>
              </div>
            </div>

            <div class="contact-info-item glass">
              <div class="contact-info-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div>
                <h6>Response</h6>
                <span>Quick support for product & business enquiries</span>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <form class="contact-form-card glass"
      
      method="POST"
      action="{{ route('contact-enquiry.store') }}">
    @csrf

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text"
                   class="form-control contact-input"
                   id="contactName"
                   name="full_name"
                   value="{{ old('full_name') }}"
                   placeholder="Enter your name"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Phone Number</label>
            <input type="tel"
                   class="form-control contact-input"
                   id="contactPhone"
                   name="phone"
                   value="{{ old('phone') }}"
                   placeholder="Enter phone number"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Enquiry Type</label>
            <select class="form-select contact-input"
                    id="contactType"
                    name="enquiry_type"
                    required>
                <option value="">Select enquiry</option>
                <option value="Product Enquiry" {{ old('enquiry_type') == 'Product Enquiry' ? 'selected' : '' }}>Product Enquiry</option>
                <option value="Bulk Order" {{ old('enquiry_type') == 'Bulk Order' ? 'selected' : '' }}>Bulk Order</option>
                <option value="Distributorship" {{ old('enquiry_type') == 'Distributorship' ? 'selected' : '' }}>Distributorship</option>
                <option value="Retail Partnership" {{ old('enquiry_type') == 'Retail Partnership' ? 'selected' : '' }}>Retail Partnership</option>
                <option value="Customer Support" {{ old('enquiry_type') == 'Customer Support' ? 'selected' : '' }}>Customer Support</option>
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label">City / Area</label>
            <input type="text"
                   class="form-control contact-input"
                   id="contactCity"
                   name="city"
                   value="{{ old('city') }}"
                   placeholder="Enter city">
        </div>

        <div class="col-12">
            <label class="form-label">Message</label>
            <textarea class="form-control contact-input"
                      id="contactMessage"
                      name="message"
                      rows="5"
                      placeholder="Write your message..."
                      required>{{ old('message') }}</textarea>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-brand w-100">
                <i class="bi bi-send me-2"></i>
                Submit Enquiry
            </button>
        </div>

    </div>
</form>
      </div>

    </div>

  </div>
</section>

<!-- ===================== DISTRIBUTORSHIP SECTION ===================== -->
<section class="section distributorship-section" id="distributorship">
  <div class="container">

    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <div class="distributor-card glass">

          <div class="distributor-card-top">
            <span><i class="bi bi-briefcase"></i> Business Opportunity</span>
            <span><i class="bi bi-graph-up-arrow"></i> Growth Ready</span>
          </div>

          <div class="distributor-pack-stage">
            <img src="assets/images/products/product.png" class="distributor-pack-img" alt="FlyDayz XL Pack">
            <img src="assets/images/products/product2.png" class="distributor-outline-img" alt="">
          </div>

          <div class="distributor-stats">
            <div>
              <b>Retail</b>
              <span>Friendly Brand</span>
            </div>
            <div>
              <b>Bulk</b>
              <span>Order Support</span>
            </div>
            <div>
              <b>Quick</b>
              <span>Onboarding</span>
            </div>
          </div>

        </div>
      </div>

      <div class="col-lg-6">
        <div class="badge-chip mb-3">
          <i class="bi bi-shop"></i> Partner With Us
        </div>

        <h2 class="fw-bold mb-3">
          Become a FlyDayz Distributor or Retail Partner
        </h2>

        <p class="muted mb-4">
          FlyDayz is expanding and looking for reliable distributors and retail partners.
          Connect with us for margins, availability, product range and onboarding details.
        </p>

        <ul class="distributor-points">
          <li><i class="bi bi-check-circle-fill"></i> Premium sanitary pad brand</li>
          <li><i class="bi bi-check-circle-fill"></i> Attractive product presentation</li>
          <li><i class="bi bi-check-circle-fill"></i> Bulk order and retail support</li>
          <li><i class="bi bi-check-circle-fill"></i> Quick WhatsApp response</li>
        </ul>

        <div class="d-flex flex-wrap gap-2 mt-4">
          <a class="btn btn-brand" target="_blank"
             href="{{ $websiteSettings->whatsappUrl() }}">
            <i class="bi bi-whatsapp me-2"></i>Get Distributorship Details
          </a>

          <a class="btn btn-outline-dark" href="{{ $websiteSettings->phone_url }}">
            <i class="bi bi-telephone me-2"></i>Call Now
          </a>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ===================== MAP / LOCATION SECTION ===================== -->
<section class="section bg-soft contact-location-section">
  <div class="container">

    <div class="text-center mb-5">
      <div class="badge-chip mb-3">
        <i class="bi bi-geo-alt"></i> Location & Support
      </div>

      <h2 class="fw-bold mb-2">Reach FlyDayz Team</h2>
      <p class="muted mb-0">
        Contact us for product availability in your city or area.
      </p>
    </div>

    <div class="contact-location-card glass">
      <div class="row g-4 align-items-center">

        <div class="col-lg-5">
          <div class="location-info">
            <h4>FlyDayz Premium Pads</h4>
            <p class="muted">
              For product availability, distributorship and bulk order enquiry,
              please contact our team directly.
            </p>

            <div class="location-row">
              <div class="location-icon"><i class="bi bi-telephone"></i></div>
              <div>
                <h6>Phone</h6>
                <a href="{{ $websiteSettings->phone_url }}">{{ $websiteSettings->primary_phone }}</a>
              </div>
            </div>

            <div class="location-row">
              <div class="location-icon"><i class="bi bi-whatsapp"></i></div>
              <div>
                <h6>WhatsApp</h6>
                <a target="_blank" href="{{ $websiteSettings->whatsappUrl() }}">Chat with us</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="map-placeholder">
            <div>
              <i class="bi bi-geo-alt-fill"></i>
              <h5>Map Placeholder</h5>
              <p>Add your Google Map iframe here when location is ready.</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


@endsection
