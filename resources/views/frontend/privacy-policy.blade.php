@extends('frontend.master')

@section('content')
<!-- ===================== MYFLYDAYZ PREMIUM HEADER END ===================== -->
    <section class="pp-hero" id="privacyTop">
        <div class="pp-hero-grid"></div>
        <div class="pp-glow one"></div>
        <div class="pp-glow two"></div>
        <div class="container position-relative">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-7">
                    <div class="pp-kicker"><span><i class="bi bi-shield-lock-fill"></i></span> Privacy, Transparency &
                        Trust</div>
                    <h1 class="pp-hero-title">Your Privacy Matters.<span>Your Trust Comes First.</span></h1>
                    <p class="pp-hero-copy">This Privacy Policy explains how FlyDayz may collect, use, protect and
                        manage information shared through our website, enquiry forms, calls and WhatsApp interactions.
                    </p>
                    <div class="pp-hero-points">
                        <div><i class="bi bi-eye-slash"></i><span><strong>Respectful Collection</strong>Only relevant
                                information</span></div>
                        <div><i class="bi bi-shield-check"></i><span><strong>Responsible Use</strong>For support and
                                service</span></div>
                        <div><i class="bi bi-person-check"></i><span><strong>Your Choices</strong>Access and correction
                                requests</span></div>
                    </div>
                    <div class="pp-hero-meta"><span><i class="bi bi-calendar3"></i> Last updated: June 17,
                            2026</span><span><i class="bi bi-clock-history"></i> Approx. 6 minute read</span></div>
                </div>
                <div class="col-lg-5">
                    <div class="pp-hero-card">
                        <div class="pp-card-top"><span><i class="bi bi-file-earmark-lock-fill"></i> Privacy
                                Overview</span><strong>Policy</strong></div>
                        <div class="pp-shield-stage">
                            <div class="pp-orbit o1"></div>
                            <div class="pp-orbit o2"></div>
                            <div class="pp-master-shield"><i
                                    class="bi bi-shield-lock-fill"></i><strong>FlyDayz</strong><span>Privacy
                                    First</span></div><span class="pp-float-chip c1"><i class="bi bi-person"></i>
                                Personal Data</span><span class="pp-float-chip c2"><i class="bi bi-cookie"></i>
                                Cookies</span><span class="pp-float-chip c3"><i class="bi bi-trash3"></i> Data
                                Requests</span>
                        </div>
                        <div class="pp-card-bottom">
                            <div><i class="bi bi-lock"></i><span>Protected</span></div>
                            <div><i class="bi bi-check2-circle"></i><span>Transparent</span></div>
                            <div><i class="bi bi-chat-heart"></i><span>Support Ready</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pp-summary-strip">
        <div class="container">
            <div class="pp-summary-grid">
                <div class="pp-summary-item">
                    <div class="pp-summary-icon"><i class="bi bi-person-vcard"></i></div>
                    <div><strong>Information We Collect</strong><span>Contact and enquiry details you provide</span>
                    </div>
                </div>
                <div class="pp-summary-item">
                    <div class="pp-summary-icon"><i class="bi bi-gear"></i></div>
                    <div><strong>How We Use It</strong><span>Support, communication and service improvement</span></div>
                </div>
                <div class="pp-summary-item">
                    <div class="pp-summary-icon"><i class="bi bi-share"></i></div>
                    <div><strong>Sharing</strong><span>Only when needed for operations or law</span></div>
                </div>
                <div class="pp-summary-item">
                    <div class="pp-summary-icon"><i class="bi bi-person-gear"></i></div>
                    <div><strong>Your Rights</strong><span>Request access, correction or deletion</span></div>
                </div>
            </div>
        </div>
    </section>
    @if(false) {{-- Legacy static policy content --}}
    <section class="section pp-policy-section" id="privacyPolicy">
        <div class="container">
            <div class="pp-policy-head">
                <div>
                    <div class="pp-kicker"><span><i class="bi bi-grid-3x3-gap-fill"></i></span> Category-Wise Policy
                    </div>
                    <h2>Browse the Privacy Policy by Topic</h2>
                    <p>Select a category to quickly understand how information is handled.</p>
                </div>
                <div class="pp-policy-count"><strong>8</strong><span>Policy Categories</span></div>
            </div>
            <div class="pp-policy-layout">
                <aside class="pp-category-panel">
                    <button class="pp-category-btn active" data-privacy-target="overview"><span><i
                                class="bi bi-file-text"></i></span>
                        <div><strong>Overview</strong><small>Scope and purpose</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="collection"><span><i
                                class="bi bi-person-vcard"></i></span>
                        <div><strong>Information Collected</strong><small>Data you may provide</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="usage"><span><i
                                class="bi bi-gear-wide-connected"></i></span>
                        <div><strong>How We Use Data</strong><small>Purposes of processing</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="cookies"><span><i
                                class="bi bi-cookie"></i></span>
                        <div><strong>Cookies & Analytics</strong><small>Website technologies</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="sharing"><span><i
                                class="bi bi-share"></i></span>
                        <div><strong>Sharing & Disclosure</strong><small>When data may be shared</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="security"><span><i
                                class="bi bi-shield-lock"></i></span>
                        <div><strong>Security & Retention</strong><small>Protection and storage</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="rights"><span><i
                                class="bi bi-person-check"></i></span>
                        <div><strong>Your Rights</strong><small>Access and requests</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                    <button class="pp-category-btn" data-privacy-target="contact"><span><i
                                class="bi bi-chat-dots"></i></span>
                        <div><strong>Contact & Updates</strong><small>Questions and policy changes</small></div><i
                            class="bi bi-chevron-right"></i>
                    </button>
                </aside>
                <div class="pp-content-panel">
                    <article class="pp-policy-content active" data-privacy-panel="overview">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-file-text"></i></div>
                            <div><span>Category 01</span>
                                <h3>Overview and Scope</h3>
                            </div>
                        </div>
                        <p>This Privacy Policy applies to information collected through the FlyDayz website and through
                            direct interactions initiated from the website, including enquiry forms, telephone calls and
                            WhatsApp messages.</p>
                        <div class="pp-info-box"><i class="bi bi-info-circle-fill"></i>
                            <div><strong>Important note</strong><span>This page is a website-ready policy draft. Review
                                    it against your actual business practices and applicable legal requirements before
                                    publication.</span></div>
                        </div>
                        <h4>Who this policy applies to</h4>
                        <ul class="pp-policy-list">
                            <li><i class="bi bi-check-circle-fill"></i> Website visitors and prospective customers</li>
                            <li><i class="bi bi-check-circle-fill"></i> Retailers, distributors and business partners
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> People submitting product or support enquiries
                            </li>
                            <li><i class="bi bi-check-circle-fill"></i> Job applicants communicating through the website
                            </li>
                        </ul>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="collection">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-person-vcard"></i></div>
                            <div><span>Category 02</span>
                                <h3>Information We May Collect</h3>
                            </div>
                        </div>
                        <p>We may collect information that you voluntarily provide and limited technical information
                            generated when you use the website.</p>
                        <div class="pp-data-grid">
                            <div class="pp-data-card"><i class="bi bi-person"></i>
                                <h4>Contact Information</h4>
                                <p>Name, mobile number, email address, city or area.</p>
                            </div>
                            <div class="pp-data-card"><i class="bi bi-chat-left-text"></i>
                                <h4>Enquiry Details</h4>
                                <p>Product, bulk-order, distributorship or support messages.</p>
                            </div>
                            <div class="pp-data-card"><i class="bi bi-briefcase"></i>
                                <h4>Business Information</h4>
                                <p>Organisation, retail or distribution details where relevant.</p>
                            </div>
                            <div class="pp-data-card"><i class="bi bi-laptop"></i>
                                <h4>Technical Information</h4>
                                <p>Browser, device, IP address and basic usage information.</p>
                            </div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="usage">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-gear-wide-connected"></i></div>
                            <div><span>Category 03</span>
                                <h3>How We May Use Information</h3>
                            </div>
                        </div>
                        <p>Information may be used only for legitimate business, communication and service purposes.</p>
                        <div class="pp-purpose-list">
                            <div><span>01</span>
                                <p>Respond to product, availability, support and distributorship enquiries.</p>
                            </div>
                            <div><span>02</span>
                                <p>Provide requested catalogues, documents or business information.</p>
                            </div>
                            <div><span>03</span>
                                <p>Manage customer, retailer and distributor communications.</p>
                            </div>
                            <div><span>04</span>
                                <p>Improve website usability, content and visitor experience.</p>
                            </div>
                            <div><span>05</span>
                                <p>Protect the website from misuse, fraud or security threats.</p>
                            </div>
                            <div><span>06</span>
                                <p>Comply with legal or record-keeping obligations.</p>
                            </div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="cookies">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-cookie"></i></div>
                            <div><span>Category 04</span>
                                <h3>Cookies and Website Analytics</h3>
                            </div>
                        </div>
                        <p>The website may use cookies or similar technologies to support essential functionality,
                            understand website performance and improve user experience.</p>
                        <div class="pp-cookie-table">
                            <div class="pp-cookie-row pp-cookie-head">
                                <span>Category</span><span>Purpose</span><span>Control</span></div>
                            <div class="pp-cookie-row"><strong>Essential</strong><span>Basic website operation and
                                    security</span><em>Usually required</em></div>
                            <div class="pp-cookie-row"><strong>Analytics</strong><span>Understand traffic and page
                                    performance</span><em>Browser controls</em></div>
                            <div class="pp-cookie-row"><strong>Preference</strong><span>Remember selected website
                                    choices</span><em>Browser controls</em></div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="sharing">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-share"></i></div>
                            <div><span>Category 05</span>
                                <h3>Sharing and Disclosure</h3>
                            </div>
                        </div>
                        <p>FlyDayz does not sell personal information. Information may be shared only where reasonably
                            necessary for business operations, service delivery or legal compliance.</p>
                        <div class="pp-share-grid">
                            <div><i class="bi bi-cloud-check"></i>
                                <h4>Service Providers</h4>
                                <p>Hosting, communication, analytics or technical support providers.</p>
                            </div>
                            <div><i class="bi bi-truck"></i>
                                <h4>Business Operations</h4>
                                <p>Relevant distribution or support partners when needed to fulfil an enquiry.</p>
                            </div>
                            <div><i class="bi bi-bank"></i>
                                <h4>Legal Requirements</h4>
                                <p>Authorities where legally required.</p>
                            </div>
                            <div><i class="bi bi-arrow-left-right"></i>
                                <h4>Business Changes</h4>
                                <p>Legitimate restructuring or transfer, subject to safeguards.</p>
                            </div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="security">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-shield-lock"></i></div>
                            <div><span>Category 06</span>
                                <h3>Security and Data Retention</h3>
                            </div>
                        </div>
                        <p>Reasonable administrative, technical and organisational safeguards should be used to protect
                            information from unauthorised access, loss, misuse or disclosure.</p>
                        <div class="pp-security-grid">
                            <div><span><i class="bi bi-lock-fill"></i></span>
                                <h4>Access Control</h4>
                                <p>Information access should be limited to authorised persons.</p>
                            </div>
                            <div><span><i class="bi bi-shield-check"></i></span>
                                <h4>Secure Handling</h4>
                                <p>Reasonable practices should be used for storage and transmission.</p>
                            </div>
                            <div><span><i class="bi bi-clock-history"></i></span>
                                <h4>Limited Retention</h4>
                                <p>Information should be retained only as long as needed.</p>
                            </div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="rights">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-person-check"></i></div>
                            <div><span>Category 07</span>
                                <h3>Your Privacy Choices and Rights</h3>
                            </div>
                        </div>
                        <p>Subject to applicable law and verification, you may request assistance regarding information
                            associated with you.</p>
                        <div class="pp-rights-grid">
                            <div><i class="bi bi-eye"></i><strong>Access</strong><span>Ask what information may be
                                    held.</span></div>
                            <div><i class="bi bi-pencil-square"></i><strong>Correction</strong><span>Request inaccurate
                                    details to be updated.</span></div>
                            <div><i class="bi bi-trash3"></i><strong>Deletion</strong><span>Request deletion where
                                    legally permitted.</span></div>
                            <div><i class="bi bi-x-circle"></i><strong>Opt Out</strong><span>Stop non-essential
                                    promotional communication.</span></div>
                        </div>
                    </article>
                    <article class="pp-policy-content" data-privacy-panel="contact">
                        <div class="pp-content-heading">
                            <div class="pp-content-icon"><i class="bi bi-chat-dots"></i></div>
                            <div><span>Category 08</span>
                                <h3>Contact, Complaints and Policy Updates</h3>
                            </div>
                        </div>
                        <p>Contact FlyDayz if you have a privacy question, correction request or complaint.</p>
                        <div class="pp-contact-card">
                            <div class="pp-contact-row"><span><i class="bi bi-telephone"></i></span>
                                <div><small>Phone</small><a href="{{ $websiteSettings->phone_url }}">{{ $websiteSettings->primary_phone }}</a></div>
                            </div>
                            <div class="pp-contact-row"><span><i class="bi bi-whatsapp"></i></span>
                                <div><small>WhatsApp</small><a target="_blank"
                                        href="{{ $websiteSettings->whatsappUrl() }}">Send
                                        a privacy enquiry</a></div>
                            </div>
                            <div class="pp-contact-row"><span><i class="bi bi-clock"></i></span>
                                <div><small>Support Hours</small><strong>10:00 AM – 05:00 PM, Monday to Sunday</strong>
                                </div>
                            </div>
                        </div>
                        <h4>Policy updates</h4>
                        <p>This Privacy Policy may be updated periodically. The revised date will be shown at the top of
                            the page.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    
    <section class="section pp-principles">
        <div class="container">
            <div class="pp-section-head text-center">
                <div class="pp-kicker"><span><i class="bi bi-stars"></i></span> Our Privacy Principles</div>
                <h2>Simple Principles Behind Responsible Data Use</h2>
                <p>Clear collection, limited use and respectful communication support long-term trust.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <article class="pp-principle-card"><span>01</span>
                        <div class="pp-principle-icon"><i class="bi bi-bullseye"></i></div>
                        <h3>Purpose Limited</h3>
                        <p>Use information only for clear and relevant purposes.</p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-3">
                    <article class="pp-principle-card featured"><span>02</span>
                        <div class="pp-principle-icon"><i class="bi bi-database-check"></i></div>
                        <h3>Data Minimal</h3>
                        <p>Collect only information reasonably needed for the interaction.</p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-3">
                    <article class="pp-principle-card"><span>03</span>
                        <div class="pp-principle-icon"><i class="bi bi-lock"></i></div>
                        <h3>Security Focused</h3>
                        <p>Apply reasonable safeguards and controlled access practices.</p>
                    </article>
                </div>
                <div class="col-md-6 col-lg-3">
                    <article class="pp-principle-card"><span>04</span>
                        <div class="pp-principle-icon"><i class="bi bi-person-heart"></i></div>
                        <h3>User Respectful</h3>
                        <p>Support access, correction and communication preferences.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="section pp-policy-section" id="privacyPolicy">
        <div class="container">
            <div class="pp-policy-head"><div><div class="pp-kicker"><span><i class="bi bi-grid-3x3-gap-fill"></i></span> Category-Wise Policy</div><h2>Browse the Privacy Policy by Topic</h2><p>Select a category to quickly understand how information is handled.</p></div><div class="pp-policy-count"><strong>{{ $privacySections->count() }}</strong><span>Policy Categories</span></div></div>
            @if($privacySections->isNotEmpty())
            <div class="pp-policy-layout"><aside class="pp-category-panel">@foreach($privacySections as $index => $section)<button class="pp-category-btn {{ $index === 0 ? 'active' : '' }}" data-privacy-target="{{ $section->slug }}"><span><i class="{{ $section->icon_class }}"></i></span><div><strong>{{ $section->title }}</strong><small>{{ $section->subtitle }}</small></div><i class="bi bi-chevron-right"></i></button>@endforeach</aside><div class="pp-content-panel">@foreach($privacySections as $index => $section)@php($content = str_replace(['{{ $websiteSettings->phone_url }}', '{{ $websiteSettings->primary_phone }}', '{{ $websiteSettings->whatsappUrl() }}'], [$websiteSettings->phone_url, $websiteSettings->primary_phone, $websiteSettings->whatsappUrl()], $section->content))<article class="pp-policy-content {{ $index === 0 ? 'active' : '' }}" data-privacy-panel="{{ $section->slug }}">{!! $content !!}</article>@endforeach</div></div>
            @else <div class="pp-info-box"><i class="bi bi-info-circle-fill"></i><div><strong>Policy content coming soon</strong><span>Add privacy policy sections from the admin panel.</span></div></div> @endif
        </div>
    </section>
    <section class="section pp-cta-section">
        <div class="container">
            <div class="pp-cta-card">
                <div>
                    <div class="pp-cta-badge"><i class="bi bi-chat-heart"></i> Privacy Support</div>
                    <h2>Have a Question About Your Information?</h2>
                    <p>Contact the FlyDayz team for privacy questions, correction requests, communication preferences or
                        data-related assistance.</p>
                </div>
                <div class="pp-cta-actions"><a href="{{ $websiteSettings->phone_url }}" class="pp-btn-primary"><i
                            class="bi bi-telephone"></i> Call {{ $websiteSettings->primary_phone }}</a><a target="_blank"
                        href="{{ $websiteSettings->whatsappUrl() }}"
                        class="pp-whatsapp-btn"><i class="bi bi-whatsapp"></i> WhatsApp</a></div>
            </div>
        </div>
    </section>
@endsection
