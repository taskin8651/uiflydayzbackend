@extends('frontend.master')

@section('content')
 <!-- ===================== TERMS HERO ===================== -->
    <section class="tc-hero" id="termsTop">
        <div class="tc-grid-bg"></div>
        <div class="tc-glow tc-glow-one"></div>
        <div class="tc-glow tc-glow-two"></div>

        <div class="container position-relative">
            <div class="row align-items-center g-4 g-lg-5">

                <div class="col-lg-7">
                    <div class="tc-kicker">
                        <span><i class="bi bi-file-earmark-text-fill"></i></span>
                        Terms, Conditions & Website Use
                    </div>

                    <h1 class="tc-hero-title">
                        Clear Terms.
                        <span>Transparent Use.</span>
                    </h1>

                    <p class="tc-hero-copy">
                        These Terms & Conditions explain the rules for using the FlyDayz website,
                        viewing product information, making enquiries and communicating with our team.
                    </p>

                    <div class="tc-hero-points">
                        <div>
                            <i class="bi bi-globe2"></i>
                            <span><strong>Website Use</strong>Rules for accessing content</span>
                        </div>
                        <div>
                            <i class="bi bi-bag-check"></i>
                            <span><strong>Product Information</strong>Availability and descriptions</span>
                        </div>
                        <div>
                            <i class="bi bi-briefcase"></i>
                            <span><strong>Business Enquiries</strong>Retail and distributorship terms</span>
                        </div>
                    </div>

                    <div class="tc-hero-meta">
                        <span><i class="bi bi-calendar3"></i> Last updated: June 17, 2026</span>
                        <span><i class="bi bi-clock-history"></i> Approx. 7 minute read</span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="tc-hero-card">
                        <div class="tc-card-top">
                            <span><i class="bi bi-journal-check"></i> Terms Overview</span>
                            <strong>Legal</strong>
                        </div>

                        <div class="tc-visual-stage">
                            <div class="tc-orbit tc-orbit-one"></div>
                            <div class="tc-orbit tc-orbit-two"></div>

                            <div class="tc-document-seal">
                                <i class="bi bi-file-earmark-check-fill"></i>
                                <strong>FlyDayz</strong>
                                <span>Terms & Conditions</span>
                            </div>

                            <span class="tc-float-chip tc-chip-one"><i class="bi bi-person-check"></i> User
                                Duties</span>
                            <span class="tc-float-chip tc-chip-two"><i class="bi bi-shield-check"></i> Fair Use</span>
                            <span class="tc-float-chip tc-chip-three"><i class="bi bi-chat-dots"></i> Support</span>
                        </div>

                        <div class="tc-card-bottom">
                            <div><i class="bi bi-check2-circle"></i><span>Clear</span></div>
                            <div><i class="bi bi-shield-lock"></i><span>Responsible</span></div>
                            <div><i class="bi bi-people"></i><span>Partner Ready</span></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================== TERMS HERO END ===================== -->


    <!-- ===================== TERMS SUMMARY ===================== -->
    <section class="tc-summary-strip">
        <div class="container">
            <div class="tc-summary-grid">

                <div class="tc-summary-item">
                    <div class="tc-summary-icon"><i class="bi bi-person-check"></i></div>
                    <div>
                        <strong>Acceptance</strong>
                        <span>Using the website means accepting these terms</span>
                    </div>
                </div>

                <div class="tc-summary-item">
                    <div class="tc-summary-icon"><i class="bi bi-bag-heart"></i></div>
                    <div>
                        <strong>Product Information</strong>
                        <span>Details may change based on availability</span>
                    </div>
                </div>

                <div class="tc-summary-item">
                    <div class="tc-summary-icon"><i class="bi bi-c-circle"></i></div>
                    <div>
                        <strong>Intellectual Property</strong>
                        <span>Brand and content remain protected</span>
                    </div>
                </div>

                <div class="tc-summary-item">
                    <div class="tc-summary-icon"><i class="bi bi-headset"></i></div>
                    <div>
                        <strong>Questions</strong>
                        <span>Contact us for clarification and support</span>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================== TERMS SUMMARY END ===================== -->


    <!-- ===================== CATEGORY-WISE TERMS ===================== -->
    @if(false) {{-- Legacy static terms content --}}
    <section class="section tc-policy-section" id="termsLibrary">
        <div class="container">

            <div class="tc-policy-head">
                <div>
                    <div class="tc-kicker">
                        <span><i class="bi bi-grid-3x3-gap-fill"></i></span>
                        Category-Wise Terms
                    </div>

                    <h2>Browse Terms & Conditions by Topic</h2>

                    <p>
                        Select a category to quickly understand the applicable website and business terms.
                    </p>
                </div>

                <div class="tc-policy-count">
                    <strong>9</strong>
                    <span>Terms Categories</span>
                </div>
            </div>

            <div class="tc-policy-layout">

                <aside class="tc-category-panel" aria-label="Terms and conditions categories">

                    <button class="tc-category-btn active" type="button" data-terms-target="acceptance">
                        <span><i class="bi bi-check2-circle"></i></span>
                        <div><strong>Acceptance</strong><small>Agreement to these terms</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="website">
                        <span><i class="bi bi-globe2"></i></span>
                        <div><strong>Website Use</strong><small>Permitted and restricted use</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="products">
                        <span><i class="bi bi-bag-check"></i></span>
                        <div><strong>Products</strong><small>Descriptions and availability</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="enquiries">
                        <span><i class="bi bi-chat-dots"></i></span>
                        <div><strong>Orders & Enquiries</strong><small>Contact and buying requests</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="partners">
                        <span><i class="bi bi-briefcase"></i></span>
                        <div><strong>Business Partners</strong><small>Retail and distributorship</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="intellectual">
                        <span><i class="bi bi-c-circle"></i></span>
                        <div><strong>Intellectual Property</strong><small>Brand and content rights</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="liability">
                        <span><i class="bi bi-shield-exclamation"></i></span>
                        <div><strong>Liability</strong><small>Disclaimers and limitations</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="links">
                        <span><i class="bi bi-link-45deg"></i></span>
                        <div><strong>Third-Party Links</strong><small>External services and sites</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <button class="tc-category-btn" type="button" data-terms-target="law">
                        <span><i class="bi bi-bank"></i></span>
                        <div><strong>Law & Contact</strong><small>Updates, disputes and help</small></div>
                        <i class="bi bi-chevron-right"></i>
                    </button>

                </aside>

                <div class="tc-content-panel">

                    <article class="tc-policy-content active" data-terms-panel="acceptance">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-check2-circle"></i></div>
                            <div>
                                <span>Category 01</span>
                                <h3>Acceptance of Terms</h3>
                            </div>
                        </div>

                        <p>
                            By accessing or using the FlyDayz website, you agree to follow these Terms & Conditions.
                            If you do not agree, please discontinue use of the website.
                        </p>

                        <div class="tc-info-box">
                            <i class="bi bi-info-circle-fill"></i>
                            <div>
                                <strong>Website-ready draft</strong>
                                <span>
                                    These terms should be reviewed against your actual sales, delivery, refund,
                                    distributor and legal practices before publication.
                                </span>
                            </div>
                        </div>

                        <h4>These terms apply to</h4>
                        <ul class="tc-policy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Website visitors and product viewers</li>
                            <li><i class="bi bi-check-circle-fill"></i> Customers submitting product enquiries</li>
                            <li><i class="bi bi-check-circle-fill"></i> Retailers, distributors and business partners
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Job applicants and other website users</li>
                        </ul>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="website">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-globe2"></i></div>
                            <div>
                                <span>Category 02</span>
                                <h3>Permitted Website Use</h3>
                            </div>
                        </div>

                        <p>
                            You may use this website for lawful personal, informational and business-enquiry purposes.
                        </p>

                        <div class="tc-rule-grid">
                            <div class="allowed">
                                <i class="bi bi-check-circle-fill"></i>
                                <h4>Permitted</h4>
                                <p>Viewing products, downloading public materials and contacting FlyDayz.</p>
                            </div>

                            <div class="restricted">
                                <i class="bi bi-x-circle-fill"></i>
                                <h4>Restricted</h4>
                                <p>Misuse, unauthorised access, scraping, malicious code or unlawful activity.</p>
                            </div>
                        </div>

                        <ul class="tc-policy-list mt-3">
                            <li><i class="bi bi-check-circle-fill"></i> Do not disrupt website operation or security.
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Do not impersonate another person or business.
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Do not submit false, abusive or misleading
                                enquiries.</li>
                            <li><i class="bi bi-check-circle-fill"></i> Do not reuse protected content without
                                permission.</li>
                        </ul>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="products">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-bag-check"></i></div>
                            <div>
                                <span>Category 03</span>
                                <h3>Product Information and Availability</h3>
                            </div>
                        </div>

                        <p>
                            FlyDayz aims to present product sizes, features, packaging and usage guidance accurately.
                            However, product details may change or vary by market, batch or availability.
                        </p>

                        <div class="tc-data-grid">
                            <div>
                                <i class="bi bi-images"></i>
                                <h4>Images</h4>
                                <p>Product images are illustrative and packaging may vary.</p>
                            </div>

                            <div>
                                <i class="bi bi-rulers"></i>
                                <h4>Sizes</h4>
                                <p>Sizes and specifications should be checked on the actual pack.</p>
                            </div>

                            <div>
                                <i class="bi bi-shop"></i>
                                <h4>Availability</h4>
                                <p>Availability may differ by location, retailer and distributor.</p>
                            </div>

                            <div>
                                <i class="bi bi-info-square"></i>
                                <h4>Guidance</h4>
                                <p>Website content is general information, not medical advice.</p>
                            </div>
                        </div>

                        <div class="tc-warning-box">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <span>
                                Users should read pack instructions and discontinue use if irritation or discomfort
                                occurs.
                                Seek professional medical advice where appropriate.
                            </span>
                        </div>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="enquiries">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-chat-dots"></i></div>
                            <div>
                                <span>Category 04</span>
                                <h3>Orders, Pricing and Enquiries</h3>
                            </div>
                        </div>

                        <p>
                            Website forms, calls and WhatsApp links are enquiry channels unless a formal online checkout
                            or written order confirmation is provided.
                        </p>

                        <div class="tc-step-list">
                            <div><span>01</span>
                                <p>Submit your product, bulk-order or availability enquiry.</p>
                            </div>
                            <div><span>02</span>
                                <p>FlyDayz or an authorised partner may confirm details and availability.</p>
                            </div>
                            <div><span>03</span>
                                <p>Pricing, taxes, delivery and payment terms may be shared separately.</p>
                            </div>
                            <div><span>04</span>
                                <p>An order becomes binding only after formal confirmation by the relevant seller.</p>
                            </div>
                        </div>

                        <p class="tc-small-note">
                            Prices or offers displayed on the website may be revised, withdrawn or corrected without
                            prior notice.
                        </p>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="partners">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-briefcase"></i></div>
                            <div>
                                <span>Category 05</span>
                                <h3>Retail, Distribution and Business Partnerships</h3>
                            </div>
                        </div>

                        <p>
                            Distributorship or retail partnership is not created merely by submitting an enquiry.
                            All partnerships are subject to review, eligibility and written commercial terms.
                        </p>

                        <div class="tc-partner-grid">
                            <div><i class="bi bi-person-badge"></i><strong>Verification</strong><span>Business identity
                                    and territory may be reviewed.</span></div>
                            <div><i class="bi bi-file-earmark-text"></i><strong>Written Terms</strong><span>Margins,
                                    supply and payment terms require confirmation.</span></div>
                            <div><i class="bi bi-geo-alt"></i><strong>Territory</strong><span>Area rights are not
                                    granted without written approval.</span></div>
                            <div><i class="bi bi-box-seam"></i><strong>Supply</strong><span>Orders remain subject to
                                    stock and operational feasibility.</span></div>
                        </div>

                        <div class="tc-info-box">
                            <i class="bi bi-briefcase-fill"></i>
                            <div>
                                <strong>No automatic appointment</strong>
                                <span>
                                    Use of the FlyDayz name, logo, marketing material or distributor status requires
                                    explicit authorisation.
                                </span>
                            </div>
                        </div>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="intellectual">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-c-circle"></i></div>
                            <div>
                                <span>Category 06</span>
                                <h3>Intellectual Property Rights</h3>
                            </div>
                        </div>

                        <p>
                            Website text, graphics, logos, packaging visuals, photographs, icons, layouts and other
                            brand materials
                            are owned by or licensed to FlyDayz unless otherwise stated.
                        </p>

                        <div class="tc-ip-grid">
                            <div><i class="bi bi-image"></i>
                                <h4>Visual Assets</h4>
                                <p>No unauthorised copying or commercial reuse.</p>
                            </div>
                            <div><i class="bi bi-type"></i>
                                <h4>Written Content</h4>
                                <p>No republication without written permission.</p>
                            </div>
                            <div><i class="bi bi-patch-check"></i>
                                <h4>Brand Identity</h4>
                                <p>No misleading association or imitation.</p>
                            </div>
                        </div>

                        <p class="tc-small-note">
                            Limited sharing of public links is permitted, provided FlyDayz ownership is not
                            misrepresented.
                        </p>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="liability">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-shield-exclamation"></i></div>
                            <div>
                                <span>Category 07</span>
                                <h3>Disclaimers and Limitation of Liability</h3>
                            </div>
                        </div>

                        <p>
                            The website is provided on an “as available” basis. While reasonable efforts are made to
                            keep content
                            accurate and accessible, uninterrupted or error-free operation cannot be guaranteed.
                        </p>

                        <div class="tc-liability-list">
                            <div><i class="bi bi-wifi-off"></i><span>Temporary website interruption or technical
                                    issues</span></div>
                            <div><i class="bi bi-file-earmark-x"></i><span>Outdated, incomplete or corrected website
                                    information</span></div>
                            <div><i class="bi bi-box2"></i><span>Third-party retailer stock, delivery or service
                                    issues</span></div>
                            <div><i class="bi bi-link-45deg"></i><span>Content or conduct on external websites</span>
                            </div>
                        </div>

                        <div class="tc-warning-box">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <span>
                                Nothing in these terms excludes liability that cannot lawfully be excluded under
                                applicable law.
                            </span>
                        </div>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="links">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-link-45deg"></i></div>
                            <div>
                                <span>Category 08</span>
                                <h3>Third-Party Links and Services</h3>
                            </div>
                        </div>

                        <p>
                            The website may link to WhatsApp, social platforms, maps, retailers or other third-party
                            services.
                            These services operate under their own terms and privacy practices.
                        </p>

                        <div class="tc-external-grid">
                            <div><i class="bi bi-whatsapp"></i><strong>WhatsApp</strong><span>Messaging is subject to
                                    WhatsApp terms.</span></div>
                            <div><i class="bi bi-geo-alt"></i><strong>Maps</strong><span>Location tools may use
                                    third-party services.</span></div>
                            <div><i class="bi bi-cart"></i><strong>Retailers</strong><span>External sellers control
                                    their own sales terms.</span></div>
                        </div>

                        <p class="tc-small-note">
                            A link does not automatically mean FlyDayz endorses every statement, product or practice of
                            the external service.
                        </p>
                    </article>

                    <article class="tc-policy-content" data-terms-panel="law">
                        <div class="tc-content-heading">
                            <div class="tc-content-icon"><i class="bi bi-bank"></i></div>
                            <div>
                                <span>Category 09</span>
                                <h3>Changes, Governing Law and Contact</h3>
                            </div>
                        </div>

                        <p>
                            These terms may be updated to reflect changes in website features, products, business
                            practices
                            or legal requirements. The revised date will be displayed on this page.
                        </p>

                        <h4>Disputes and applicable law</h4>
                        <p>
                            These terms should be governed by applicable Indian law. The final jurisdiction clause
                            should be
                            updated with the correct registered business location before publication.
                        </p>

                        <div class="tc-contact-card">
                            <div class="tc-contact-row">
                                <span><i class="bi bi-telephone"></i></span>
                                <div>
                                    <small>Phone</small>
                                    <a href="{{ $websiteSettings->phone_url }}">{{ $websiteSettings->primary_phone }}</a>
                                </div>
                            </div>

                            <div class="tc-contact-row">
                                <span><i class="bi bi-whatsapp"></i></span>
                                <div>
                                    <small>WhatsApp</small>
                                    <a target="_blank"
                                        href="{{ $websiteSettings->whatsappUrl() }}">
                                        Ask about these terms
                                    </a>
                                </div>
                            </div>

                            <div class="tc-contact-row">
                                <span><i class="bi bi-clock"></i></span>
                                <div>
                                    <small>Support Hours</small>
                                    <strong>10:00 AM – 05:00 PM, Monday to Sunday</strong>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>
    <!-- ===================== CATEGORY-WISE TERMS END ===================== -->


    <!-- ===================== USER RESPONSIBILITIES ===================== -->
    <section class="section tc-principles">
        <div class="container">

            <div class="tc-section-head text-center">
                <div class="tc-kicker">
                    <span><i class="bi bi-stars"></i></span>
                    Responsible Website Use
                </div>

                <h2>Four Principles for a Safe Experience</h2>

                <p>
                    Honest communication, lawful use and respect for brand rights help keep the platform reliable.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <article class="tc-principle-card">
                        <span>01</span>
                        <div class="tc-principle-icon"><i class="bi bi-person-check"></i></div>
                        <h3>Be Accurate</h3>
                        <p>Provide correct information when submitting enquiries.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="tc-principle-card featured">
                        <span>02</span>
                        <div class="tc-principle-icon"><i class="bi bi-shield-check"></i></div>
                        <h3>Use Lawfully</h3>
                        <p>Access the website only for legitimate purposes.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="tc-principle-card">
                        <span>03</span>
                        <div class="tc-principle-icon"><i class="bi bi-c-circle"></i></div>
                        <h3>Respect Ownership</h3>
                        <p>Do not misuse FlyDayz content or brand identity.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="tc-principle-card">
                        <span>04</span>
                        <div class="tc-principle-icon"><i class="bi bi-chat-heart"></i></div>
                        <h3>Communicate Fairly</h3>
                        <p>Keep customer and business communication respectful.</p>
                    </article>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================== USER RESPONSIBILITIES END ===================== -->


    <!-- ===================== TERMS CTA ===================== -->
    @endif
    <section class="section tc-policy-section" id="termsLibrary"><div class="container"><div class="tc-policy-head"><div><div class="tc-kicker"><span><i class="bi bi-grid-3x3-gap-fill"></i></span> Category-Wise Terms</div><h2>Browse Terms & Conditions by Topic</h2><p>Select a category to quickly understand the applicable website and business terms.</p></div><div class="tc-policy-count"><strong>{{ $termsSections->count() }}</strong><span>Terms Categories</span></div></div>@if($termsSections->isNotEmpty())<div class="tc-policy-layout"><aside class="tc-category-panel" aria-label="Terms categories">@foreach($termsSections as $index => $section)<button class="tc-category-btn {{ $index === 0 ? 'active' : '' }}" type="button" data-terms-target="{{ $section->slug }}"><span><i class="{{ $section->icon_class }}"></i></span><div><strong>{{ $section->title }}</strong><small>{{ $section->subtitle }}</small></div><i class="bi bi-chevron-right"></i></button>@endforeach</aside><div class="tc-content-panel">@foreach($termsSections as $index => $section)@php($content = str_replace(['{{ $websiteSettings->phone_url }}', '{{ $websiteSettings->primary_phone }}', '{{ $websiteSettings->whatsappUrl() }}'], [$websiteSettings->phone_url, $websiteSettings->primary_phone, $websiteSettings->whatsappUrl()], $section->content))<article class="tc-policy-content {{ $index === 0 ? 'active' : '' }}" data-terms-panel="{{ $section->slug }}">{!! $content !!}</article>@endforeach</div></div>@else<div class="tc-info-box"><i class="bi bi-info-circle-fill"></i><div><strong>Terms content coming soon</strong><span>Add terms sections from the admin panel.</span></div></div>@endif</div></section>
    <section class="section tc-cta-section" id="termsContact">
        <div class="container">

            <div class="tc-cta-card">
                <div>
                    <div class="tc-cta-badge">
                        <i class="bi bi-chat-dots"></i>
                        Terms Support
                    </div>

                    <h2>Need Clarification About These Terms?</h2>

                    <p>
                        Contact FlyDayz for questions about product information, website use,
                        business enquiries or distributorship conditions.
                    </p>
                </div>

                <div class="tc-cta-actions">
                    <a href="{{ $websiteSettings->phone_url }}" class="tc-btn-primary">
                        <i class="bi bi-telephone"></i> Call {{ $websiteSettings->primary_phone }}
                    </a>

                    <a target="_blank"
                        href="{{ $websiteSettings->whatsappUrl() }}"
                        class="tc-whatsapp-btn">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- ===================== TERMS CTA END ===================== -->
@endsection
