@extends('frontend.master')

@section('content')
@php
  $categories = [
    'all' => ['All', 'bi-grid'], 'period-care' => ['Period Care', 'bi-heart-pulse'],
    'hygiene' => ['Hygiene', 'bi-shield-check'], 'product-guide' => ['Product Guide', 'bi-bag-check'],
    'lifestyle' => ['Lifestyle', 'bi-stars'], 'brand-news' => ['Brand News', 'bi-megaphone'],
  ];
@endphp

<section class="blog-hero" id="home">
  <div class="blog-hero-grid"></div><div class="blog-glow blog-glow-one"></div><div class="blog-glow blog-glow-two"></div>
  <div class="container position-relative"><div class="row align-items-center g-4 g-lg-5">
    <div class="col-lg-7">
      <div class="blog-kicker"><span><i class="bi bi-journal-richtext"></i></span>FlyDayz Knowledge Hub</div>
      <h1 class="blog-hero-title">Better Care Starts With <span>Better Information.</span></h1>
      <p class="blog-hero-text">Practical, thoughtful guidance on period care, hygiene, product selection and everyday wellness.</p>
      <div class="blog-hero-actions"><a href="#blogLibrary" class="blog-btn-primary">Explore Articles <i class="bi bi-arrow-down-short"></i></a><a href="{{ route('technology') }}" class="blog-btn-secondary">Explore Technology</a></div>
    </div>
    @if($featuredPost)
      <div class="col-lg-5"><article class="blog-featured-card">
        <div class="blog-featured-media"><img src="{{ $featuredPost->image_url }}" alt="{{ $featuredPost->title }}"><span class="blog-featured-tag"><i class="bi bi-stars"></i> Featured</span></div>
        <div class="blog-featured-body"><div class="blog-post-meta"><span><i class="bi bi-calendar3"></i> {{ optional($featuredPost->published_at)->format('d M Y') ?: 'Latest article' }}</span><span><i class="bi bi-clock"></i> {{ $featuredPost->read_time }}</span></div>
        <h2>{{ $featuredPost->title }}</h2><p>{{ $featuredPost->excerpt }}</p><a href="{{ route('blog.show', $featuredPost) }}" class="blog-read-link">Read Featured Article <i class="bi bi-arrow-right"></i></a></div>
      </article></div>
    @endif
  </div></div>
</section>

<section class="blog-trust-strip"><div class="container"><div class="blog-trust-grid">
  <div class="blog-trust-item"><div class="blog-trust-icon"><i class="bi bi-lightbulb"></i></div><div><strong>Practical Guidance</strong><span>Easy-to-understand care tips</span></div></div>
  <div class="blog-trust-item"><div class="blog-trust-icon"><i class="bi bi-shield-check"></i></div><div><strong>Hygiene Focus</strong><span>Helpful everyday habits</span></div></div>
  <div class="blog-trust-item"><div class="blog-trust-icon"><i class="bi bi-person-heart"></i></div><div><strong>Women-Centred</strong><span>Comfort and confidence first</span></div></div>
  <div class="blog-trust-item"><div class="blog-trust-icon"><i class="bi bi-chat-heart"></i></div><div><strong>Support Ready</strong><span>Ask our team for guidance</span></div></div>
</div></div></section>

<section class="section blog-library" id="blogLibrary"><div class="container">
  <div class="blog-library-head"><div><div class="blog-kicker"><span><i class="bi bi-grid-3x3-gap-fill"></i></span>Category-Wise Articles</div><h2>Explore the FlyDayz Blog</h2><p>Find helpful articles built around the questions that matter to you.</p></div><div class="blog-library-count"><strong>{{ $posts->count() }}</strong><span>Helpful Articles</span></div></div>
  <div class="blog-filter-bar" role="group" aria-label="Blog category filters">
    @foreach($categories as $key => [$label, $icon]) <button class="blog-filter-btn {{ $key === 'all' ? 'active' : '' }}" type="button" data-blog-filter="{{ $key }}"><i class="bi {{ $icon }}"></i> {{ $label }}</button> @endforeach
  </div>
  <div class="blog-card-grid">
    @forelse($posts as $post)
      <article class="blog-card {{ $post->is_featured ? 'featured' : '' }}" data-blog-category="{{ $post->category }}"><div class="blog-card-media"><img src="{{ $post->image_url }}" alt="{{ $post->title }}"><span class="blog-card-category">{{ $categories[$post->category][0] ?? ucwords(str_replace('-', ' ', $post->category)) }}</span><span class="blog-card-read"><i class="bi bi-clock"></i> {{ $post->read_time }}</span></div><div class="blog-card-body"><div class="blog-card-meta"><span>{{ optional($post->published_at)->format('d M Y') ?: 'Latest' }}</span><span>{{ $post->author }}</span></div><h3>{{ $post->title }}</h3><p>{{ $post->excerpt }}</p><a href="{{ route('blog.show', $post) }}">Read Article <i class="bi bi-arrow-right"></i></a></div></article>
    @empty
      <div class="blog-no-posts"><i class="bi bi-journal-plus"></i><h3>Fresh articles are on the way.</h3><p>Please check back soon for practical FlyDayz care guides.</p></div>
    @endforelse
  </div>
  <div class="blog-empty-state" id="blogEmptyState"><i class="bi bi-journal-x"></i><h3>No articles found</h3><p>Choose another category to continue exploring.</p></div>
</div></section>

<section class="section blog-cta-section"><div class="container"><div class="blog-cta-card"><div><div class="blog-cta-badge"><i class="bi bi-chat-heart"></i> Need Personal Guidance?</div><h2>Have a Question About Product Selection?</h2><p>Connect with the FlyDayz team for product information, availability and distributorship enquiries.</p></div><div class="blog-cta-actions"><a href="{{ $websiteSettings->phone_url }}" class="blog-btn-primary"><i class="bi bi-telephone"></i> Call {{ $websiteSettings->primary_phone }}</a><a target="_blank" rel="noopener" href="{{ $websiteSettings->whatsappUrl() }}" class="blog-whatsapp-btn"><i class="bi bi-whatsapp"></i> WhatsApp</a></div></div></div></section>
@endsection
