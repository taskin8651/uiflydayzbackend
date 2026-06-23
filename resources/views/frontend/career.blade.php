@extends('frontend.master')
@section('content')

<!-- ===================== CAREER HERO ===================== -->
<section class="career-hero" id="home">
  <div class="career-grid-bg"></div>
  <div class="career-glow career-glow-one"></div>
  <div class="career-glow career-glow-two"></div>

  <div class="container position-relative">
    <div class="row align-items-center g-4 g-lg-5">

      <div class="col-lg-7">
        <div class="career-kicker">
          <span><i class="bi bi-briefcase-fill"></i></span>
          Build Your Future With FlyDayz
        </div>

        <h1 class="career-hero-title">
          Grow With Purpose.
          <span>Make an Impact.</span>
        </h1>

        <p class="career-hero-text">
          Join a growing feminine hygiene brand focused on comfort, quality, awareness
          and better everyday care for women across India.
        </p>

        <div class="career-hero-points">
          <div>
            <i class="bi bi-people-fill"></i>
            <span><strong>Collaborative Team</strong>Learn and grow together</span>
          </div>
          <div>
            <i class="bi bi-graph-up-arrow"></i>
            <span><strong>Career Growth</strong>Roles with real ownership</span>
          </div>
          <div>
            <i class="bi bi-heart-pulse-fill"></i>
            <span><strong>Meaningful Work</strong>Impact women’s wellness</span>
          </div>
        </div>

        <div class="career-hero-actions">
          <a href="#openings" class="career-btn-primary">
            View Open Positions <i class="bi bi-arrow-down-short"></i>
          </a>
          <a href="#careerContact" class="career-btn-secondary">Send Your Profile</a>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="career-hero-card">
          <div class="career-card-top">
            <span><i class="bi bi-stars"></i> Life at FlyDayz</span>
            <strong>We’re Growing</strong>
          </div>

          <div class="career-visual-stage">
            <div class="career-orbit career-orbit-one"></div>
            <div class="career-orbit career-orbit-two"></div>

            <div class="career-main-badge">
              <i class="bi bi-person-workspace"></i>
              <strong>Join FlyDayz</strong>
              <span>Grow • Learn • Lead</span>
            </div>

            <span class="career-float-chip chip-one"><i class="bi bi-lightbulb"></i> Ideas</span>
            <span class="career-float-chip chip-two"><i class="bi bi-rocket-takeoff"></i> Growth</span>
            <span class="career-float-chip chip-three"><i class="bi bi-award"></i> Excellence</span>
          </div>

          <div class="career-card-bottom">
            <div><i class="bi bi-people"></i><span>Teamwork</span></div>
            <div><i class="bi bi-stars"></i><span>Innovation</span></div>
            <div><i class="bi bi-emoji-smile"></i><span>Positive Culture</span></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- ===================== CAREER HERO END ===================== -->


<!-- ===================== CAREER TRUST STRIP ===================== -->
<section class="career-trust-strip">
  <div class="container">
    <div class="career-trust-grid">

      <div class="career-trust-item">
        <div class="career-trust-icon"><i class="bi bi-mortarboard-fill"></i></div>
        <div><strong>Learning Culture</strong><span>Continuous skill development</span></div>
      </div>

      <div class="career-trust-item">
        <div class="career-trust-icon"><i class="bi bi-diagram-3-fill"></i></div>
        <div><strong>Cross-Functional Exposure</strong><span>Work across teams and markets</span></div>
      </div>

      <div class="career-trust-item">
        <div class="career-trust-icon"><i class="bi bi-bar-chart-fill"></i></div>
        <div><strong>Growth Opportunities</strong><span>Performance-driven progression</span></div>
      </div>

      <div class="career-trust-item">
        <div class="career-trust-icon"><i class="bi bi-heart-fill"></i></div>
        <div><strong>Purpose-Led Brand</strong><span>Work that improves everyday care</span></div>
      </div>

    </div>
  </div>
</section>
<!-- ===================== CAREER TRUST STRIP END ===================== -->


<!-- ===================== OPEN POSITIONS ===================== -->
<section class="section career-openings" id="openings">
  <div class="container">

    <div class="career-openings-head">
      <div>
        <div class="career-kicker">
          <span><i class="bi bi-grid-3x3-gap-fill"></i></span>
          Category-Wise Opportunities
        </div>

        <h2>Explore Open Career Opportunities</h2>

        <p>
          Browse roles across sales, marketing, operations, quality and corporate support.
        </p>
      </div>

      <div class="career-openings-count">
        <strong>8</strong>
        <span>Open Roles</span>
      </div>
    </div>

    <div class="career-filter-bar" role="group" aria-label="Career category filters">
    <button class="career-filter-btn active" type="button" data-career-filter="all">
        <i class="bi bi-grid"></i> All Roles
    </button>

    <button class="career-filter-btn" type="button" data-career-filter="sales">
        <i class="bi bi-graph-up-arrow"></i> Sales
    </button>

    <button class="career-filter-btn" type="button" data-career-filter="marketing">
        <i class="bi bi-megaphone"></i> Marketing
    </button>

    <button class="career-filter-btn" type="button" data-career-filter="operations">
        <i class="bi bi-gear-wide-connected"></i> Operations
    </button>

    <button class="career-filter-btn" type="button" data-career-filter="quality">
        <i class="bi bi-patch-check"></i> Quality
    </button>

    <button class="career-filter-btn" type="button" data-career-filter="support">
        <i class="bi bi-headset"></i> Support
    </button>
</div>

@if(isset($careerJobs) && $careerJobs->count())
    <div class="career-job-grid">

        @foreach($careerJobs as $job)
            @php
                $categoryIcons = [
                    'sales' => 'bi bi-person-badge-fill',
                    'marketing' => 'bi bi-megaphone-fill',
                    'operations' => 'bi bi-box-seam-fill',
                    'quality' => 'bi bi-clipboard2-check-fill',
                    'support' => 'bi bi-headset',
                ];

                $statusIcons = [
                    'urgent' => 'bi bi-lightning-charge-fill',
                    'open' => 'bi bi-check-circle-fill',
                    'intern' => 'bi bi-mortarboard-fill',
                ];

                $jobIcon = $categoryIcons[$job->category] ?? 'bi bi-briefcase-fill';
                $statusIcon = $statusIcons[$job->status_type] ?? 'bi bi-check-circle-fill';

                $requirements = array_filter([
                    $job->requirement_one,
                    $job->requirement_two,
                    $job->requirement_three,
                ]);
            @endphp

            <article class="career-job-card {{ $job->is_featured ? 'featured' : '' }}"
                     data-career-category="{{ $job->category }}">

                <div class="career-job-top">
                    <span class="career-job-category">
                        {{ $job->category_label ?: ucfirst($job->category) }}
                    </span>

                    <span class="career-job-status {{ $job->status_type === 'intern' ? 'intern' : '' }}">
                        <i class="{{ $statusIcon }}"></i>
                        {{ $job->status_label ?: 'Open' }}
                    </span>
                </div>

                <div class="career-job-icon">
                    <i class="{{ $jobIcon }}"></i>
                </div>

                <h3>{{ $job->title }}</h3>

                <div class="career-job-meta">
                    @if($job->location)
                        <span>
                            <i class="bi bi-geo-alt"></i>
                            {{ $job->location }}
                        </span>
                    @endif

                    @if($job->experience)
                        <span>
                            <i class="bi bi-briefcase"></i>
                            {{ $job->experience }}
                        </span>
                    @endif

                    @if($job->job_type)
                        <span>
                            <i class="bi bi-clock"></i>
                            {{ $job->job_type }}
                        </span>
                    @endif
                </div>

                @if($job->description)
                    <p>{{ $job->description }}</p>
                @endif

                @if(count($requirements))
                    <ul>
                        @foreach($requirements as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                @endif

                <a href="#careerContact" class="career-apply-btn">
                    Apply Now
                    <i class="bi bi-arrow-right"></i>
                </a>

            </article>
        @endforeach

    </div>
@else
    <div class="text-center py-5">
        <p class="mb-0">No career openings available.</p>
    </div>
@endif


  </div>
</section>
<!-- ===================== OPEN POSITIONS END ===================== -->


<!-- ===================== WHY WORK WITH US ===================== -->
<section class="section career-culture-section">
  <div class="container">

    <div class="career-section-head text-center">
      <div class="career-kicker">
        <span><i class="bi bi-stars"></i></span>
        Why Work With Us
      </div>
      <h2>A Workplace Built for Growth</h2>
      <p>We value ownership, empathy, learning and practical execution.</p>
    </div>

    <div class="career-culture-grid">
      <article class="career-culture-card">
        <span>01</span>
        <div class="career-culture-icon"><i class="bi bi-lightbulb-fill"></i></div>
        <h3>Ideas Are Welcome</h3>
        <p>Share practical ideas and take ownership of improvements.</p>
      </article>

      <article class="career-culture-card featured">
        <span>02</span>
        <div class="career-culture-icon"><i class="bi bi-rocket-takeoff-fill"></i></div>
        <h3>Grow With the Brand</h3>
        <p>Build your career while helping an emerging brand scale.</p>
      </article>

      <article class="career-culture-card">
        <span>03</span>
        <div class="career-culture-icon"><i class="bi bi-people-fill"></i></div>
        <h3>Work as One Team</h3>
        <p>Collaborate across sales, operations, quality and marketing.</p>
      </article>

      <article class="career-culture-card">
        <span>04</span>
        <div class="career-culture-icon"><i class="bi bi-heart-fill"></i></div>
        <h3>Meaningful Impact</h3>
        <p>Help make better feminine hygiene care more accessible.</p>
      </article>
    </div>

  </div>
</section>
<!-- ===================== WHY WORK WITH US END ===================== -->


<!-- ===================== APPLICATION PROCESS ===================== -->
<section class="section career-process-section">
  <div class="container">

    <div class="career-section-head text-center">
      <div class="career-kicker">
        <span><i class="bi bi-diagram-3-fill"></i></span>
        Simple Hiring Process
      </div>
      <h2>Your Journey to FlyDayz</h2>
      <p>A clear process designed to understand your experience, strengths and potential.</p>
    </div>

    <div class="career-process-grid">
      <div class="career-process-step">
        <span>01</span>
        <div class="career-process-icon"><i class="bi bi-send-check-fill"></i></div>
        <h3>Apply</h3>
        <p>Submit your profile and preferred role.</p>
      </div>

      <div class="career-process-line"></div>

      <div class="career-process-step">
        <span>02</span>
        <div class="career-process-icon"><i class="bi bi-file-earmark-person-fill"></i></div>
        <h3>Profile Review</h3>
        <p>Our team reviews your skills and experience.</p>
      </div>

      <div class="career-process-line"></div>

      <div class="career-process-step">
        <span>03</span>
        <div class="career-process-icon"><i class="bi bi-camera-video-fill"></i></div>
        <h3>Discussion</h3>
        <p>Attend role-based interview rounds.</p>
      </div>

      <div class="career-process-line"></div>

      <div class="career-process-step">
        <span>04</span>
        <div class="career-process-icon"><i class="bi bi-patch-check-fill"></i></div>
        <h3>Offer & Onboarding</h3>
        <p>Complete documentation and join the team.</p>
      </div>
    </div>

  </div>
</section>
<!-- ===================== APPLICATION PROCESS END ===================== -->


<!-- ===================== CAREER APPLICATION CTA ===================== -->
<section class="section career-apply-section" id="careerContact">
  <div class="container">

    <div class="career-apply-card">
      <div class="row align-items-center g-4 g-lg-5">

        <div class="col-lg-7">
          <div class="career-kicker">
            <span><i class="bi bi-envelope-paper-fill"></i></span>
            Send Your Profile
          </div>

          <h2>Didn’t Find the Perfect Role?</h2>

          <p>
            Share your resume and preferred department. We may contact you when
            a suitable opportunity becomes available.
          </p>

          <div class="career-apply-points">
            <span><i class="bi bi-check-circle-fill"></i> Mention preferred role</span>
            <span><i class="bi bi-check-circle-fill"></i> Add current city</span>
            <span><i class="bi bi-check-circle-fill"></i> Share total experience</span>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="career-contact-box">
            <div class="career-contact-icon"><i class="bi bi-whatsapp"></i></div>
            <h3>Apply on WhatsApp</h3>
            <p>Send your name, role, city, experience and resume.</p>

            <a target="_blank"
               href="{{ $websiteSettings->whatsappUrl() }}"
               class="career-whatsapp-btn">
              <i class="bi bi-whatsapp"></i> Send Profile
            </a>

            <a href="{{ $websiteSettings->phone_url }}" class="career-call-link">
              <i class="bi bi-telephone"></i> Call {{ $websiteSettings->primary_phone }}
            </a>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- ===================== CAREER APPLICATION CTA END ===================== -->


@endsection
