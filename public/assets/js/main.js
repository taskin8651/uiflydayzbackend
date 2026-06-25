/* =========================================================
   FLYDAYZ MAIN JS - CLEANED & UPDATED
   Includes:
   - Preloader
   - Footer year
   - Header scroll state
   - Mobile navbar close
   - Hero slider
   - Product size slider
   - Product type slider
   - Reviews slider
   - Reviews page slider
   - FAQ search
   - Contact form WhatsApp redirect
   - Product details page logic
   - Product filter
========================================================= */


/* ===================== PRELOADER ===================== */

window.addEventListener("load", function () {
  const preloader = document.getElementById("flydayzPreloader");

  if (!preloader) return;

  setTimeout(function () {
    preloader.classList.add("is-hidden");

    setTimeout(function () {
      preloader.remove();
    }, 650);
  }, 700);
});


/* ===================== COMMON HELPERS ===================== */

document.addEventListener("DOMContentLoaded", function () {
  initFooterYear();
  initHeaderScroll();
  initMobileNavbarClose();

  initHeroSlider();

  initProductSizeSlider();
  initProductTypeSlider();

  initHomeReviewsSlider();
  initReviewsPageSlider();

  initRevealAnimations();
  initFaqSearch();

  initContactFormToWhatsApp();

  initProductDetailsPage();
  initProductFilter();
});


/* ===================== FOOTER YEAR ===================== */

function initFooterYear() {
  const yearEl = document.getElementById("year");

  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }
}


/* ===================== HEADER SCROLL SHADOW ===================== */

function initHeaderScroll() {
  const header = document.querySelector(".main-header");

  if (!header) return;

  function handleHeaderScroll() {
    if (window.scrollY > 50) {
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  }

  window.addEventListener("scroll", handleHeaderScroll, {
    passive: true
  });

  handleHeaderScroll();
}


/* ===================== CLOSE MOBILE NAVBAR AFTER LINK CLICK ===================== */

function initMobileNavbarClose() {
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
  const navbarCollapse = document.querySelector(".navbar-collapse");

  if (!navLinks.length || !navbarCollapse) return;

  navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      if (!navbarCollapse.classList.contains("show")) return;

      if (typeof bootstrap !== "undefined" && bootstrap.Collapse) {
        const bsCollapse = bootstrap.Collapse.getOrCreateInstance(navbarCollapse);
        bsCollapse.hide();
      }
    });
  });
}


/* ===================== HERO SLIDER ===================== */

function initHeroSlider() {
  const hero = document.querySelector("#home.hero-premium");

  if (!hero) return;

  const sliderTrack = hero.querySelector(".hero-slider-track");
  const slides = hero.querySelectorAll(".hero-slide");
  const prevBtn = hero.querySelector(".hero-prev");
  const nextBtn = hero.querySelector(".hero-next");
  const dotsWrap = hero.querySelector(".hero-slider-dots");

  if (!sliderTrack || !slides.length) return;

  let currentSlide = 0;
  let autoSlide = null;
  const autoDelay = 4200;

  if (dotsWrap && !dotsWrap.children.length) {
    slides.forEach(function (_, index) {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.className = "hero-dot";
      dot.setAttribute("aria-label", `Go to slide ${index + 1}`);
      dot.setAttribute("data-slide", index);
      dotsWrap.appendChild(dot);
    });
  }

  const dots = hero.querySelectorAll(".hero-dot, .hero-slider-dots button");

  function showSlide(index) {
    if (index < 0) {
      currentSlide = slides.length - 1;
    } else if (index >= slides.length) {
      currentSlide = 0;
    } else {
      currentSlide = index;
    }

    sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;

    slides.forEach(function (slide) {
      slide.classList.remove("is-active");
    });

    if (slides[currentSlide]) {
      slides[currentSlide].classList.add("is-active");
    }

    dots.forEach(function (dot) {
      dot.classList.remove("active");
    });

    if (dots[currentSlide]) {
      dots[currentSlide].classList.add("active");
    }
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  function startAutoSlide() {
    stopAutoSlide();
    autoSlide = setInterval(nextSlide, autoDelay);
  }

  function stopAutoSlide() {
    if (autoSlide) {
      clearInterval(autoSlide);
      autoSlide = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      stopAutoSlide();
      nextSlide();
      startAutoSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      stopAutoSlide();
      prevSlide();
      startAutoSlide();
    });
  }

  dots.forEach(function (dot, index) {
    dot.addEventListener("click", function () {
      const slideIndex = Number(dot.getAttribute("data-slide") || index);

      stopAutoSlide();
      showSlide(slideIndex);
      startAutoSlide();
    });
  });

  hero.addEventListener("mouseenter", stopAutoSlide);
  hero.addEventListener("mouseleave", startAutoSlide);
  hero.addEventListener("touchstart", stopAutoSlide, { passive: true });
  hero.addEventListener("touchend", startAutoSlide, { passive: true });

  showSlide(0);
  startAutoSlide();
}


/* ===================== GENERIC HORIZONTAL SLIDER HELPER ===================== */

function setupHorizontalSlider(options) {
  const section = document.querySelector(options.sectionSelector);

  if (!section) return;

  const slider = section.querySelector(options.sliderSelector);
  const cards = section.querySelectorAll(options.cardSelector);
  const prevBtn = section.querySelector(options.prevSelector);
  const nextBtn = section.querySelector(options.nextSelector);
  const progressBar = options.progressSelector ? section.querySelector(options.progressSelector) : null;

  if (!slider || !cards.length) return;

  let autoTimer = null;
  const autoDelay = options.autoDelay || 3000;

  function getScrollAmount() {
    const card = slider.querySelector(options.cardSelector);

    if (!card) return options.fallbackAmount || 320;

    const styles = window.getComputedStyle(slider);
    const gap = parseFloat(styles.columnGap || styles.gap || 20);

    return card.offsetWidth + gap;
  }

  function updateProgress() {
    if (!progressBar) return;

    const maxScroll = slider.scrollWidth - slider.clientWidth;
    const percentage = maxScroll <= 0 ? 100 : (slider.scrollLeft / maxScroll) * 100;

    progressBar.style.width = `${Math.max(8, percentage)}%`;
  }

  function goNext() {
    const amount = getScrollAmount();
    const maxScroll = slider.scrollWidth - slider.clientWidth;

    if (slider.scrollLeft >= maxScroll - 10) {
      slider.scrollTo({
        left: 0,
        behavior: "smooth"
      });
    } else {
      slider.scrollBy({
        left: amount,
        behavior: "smooth"
      });
    }
  }

  function goPrev() {
    const amount = getScrollAmount();

    if (slider.scrollLeft <= 10) {
      slider.scrollTo({
        left: slider.scrollWidth,
        behavior: "smooth"
      });
    } else {
      slider.scrollBy({
        left: -amount,
        behavior: "smooth"
      });
    }
  }

  function startAutoSlide() {
    if (!options.auto) return;

    stopAutoSlide();
    autoTimer = setInterval(goNext, autoDelay);
  }

  function stopAutoSlide() {
    if (autoTimer) {
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function (e) {
      e.preventDefault();
      stopAutoSlide();
      goNext();
      startAutoSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function (e) {
      e.preventDefault();
      stopAutoSlide();
      goPrev();
      startAutoSlide();
    });
  }

  if (options.drag) {
    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    slider.addEventListener("mousedown", function (e) {
      isDown = true;
      slider.classList.add(options.dragClass || "dragging");
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
      stopAutoSlide();
    });

    slider.addEventListener("mouseleave", function () {
      isDown = false;
      slider.classList.remove(options.dragClass || "dragging");
      startAutoSlide();
    });

    slider.addEventListener("mouseup", function () {
      isDown = false;
      slider.classList.remove(options.dragClass || "dragging");
      startAutoSlide();
    });

    slider.addEventListener("mousemove", function (e) {
      if (!isDown) return;

      e.preventDefault();

      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 1.2;

      slider.scrollLeft = scrollLeft - walk;
    });
  }

  slider.addEventListener("mouseenter", stopAutoSlide);
  slider.addEventListener("mouseleave", startAutoSlide);
  slider.addEventListener("touchstart", stopAutoSlide, { passive: true });
  slider.addEventListener("touchend", startAutoSlide, { passive: true });
  slider.addEventListener("scroll", updateProgress);

  window.addEventListener("resize", updateProgress);

  updateProgress();
  startAutoSlide();
}


/* ===================== PRODUCT SIZE SLIDER ===================== */

function initProductSizeSlider() {
  setupHorizontalSlider({
    sectionSelector: "#products-size",
    sliderSelector: "#productSlider",
    cardSelector: ".product-card",
    prevSelector: '[data-slide="prev"]',
    nextSelector: '[data-slide="next"]',
    fallbackAmount: 320,
    auto: true,
    autoDelay: 3000,
    drag: true,
    dragClass: "dragging"
  });
}


/* ===================== PRODUCT TYPE SLIDER ===================== */

function initProductTypeSlider() {
  setupHorizontalSlider({
    sectionSelector: "#products-type",
    sliderSelector: "#productSliderType",
    cardSelector: ".product-card-Type",
    prevSelector: '[data-slide="prev"]',
    nextSelector: '[data-slide="next"]',
    fallbackAmount: 320,
    auto: true,
    autoDelay: 3000,
    drag: true,
    dragClass: "dragging"
  });
}


/* ===================== HOME REVIEWS SLIDER ===================== */

function initHomeReviewsSlider() {
  setupHorizontalSlider({
    sectionSelector: "#reviews",
    sliderSelector: "#reviewSlider",
    cardSelector: ".review-card",
    prevSelector: '[data-review-slide="prev"]',
    nextSelector: '[data-review-slide="next"]',
    progressSelector: ".review-slider-progress span",
    fallbackAmount: 340,
    auto: true,
    autoDelay: 3200,
    drag: true,
    dragClass: "dragging"
  });
}


/* ===================== REVIEWS PAGE SLIDER ===================== */

function initReviewsPageSlider() {
  setupHorizontalSlider({
    sectionSelector: "body",
    sliderSelector: "#reviewsPageSlider",
    cardSelector: ".reviews-page-card",
    prevSelector: '[data-reviews-page-slide="prev"]',
    nextSelector: '[data-reviews-page-slide="next"]',
    fallbackAmount: 340,
    auto: false,
    drag: true,
    dragClass: "is-dragging"
  });
}


/* ===================== REVEAL ANIMATIONS ===================== */

function initRevealAnimations() {
  const revealSelectors = [
    ".hero-reveal",
    ".tech-reveal",
    ".why-page-reveal",
    ".reviews-page-reveal",
    ".faqs-page-reveal",
    ".contact-page-reveal"
  ];

  revealSelectors.forEach(function (selector) {
    document.querySelectorAll(selector).forEach(function (el) {
      requestAnimationFrame(function () {
        el.classList.add("show");
      });
    });
  });
}


/* ===================== FAQ SEARCH ===================== */

function initFaqSearch() {
  const searchInput = document.getElementById("faqSearchInput");
  const faqItems = document.querySelectorAll(".faq-search-item");
  const noResult = document.getElementById("faqNoResult");
  const groupTitles = document.querySelectorAll(".faq-group-title");

  if (!searchInput || !faqItems.length) return;

  searchInput.addEventListener("input", function () {
    const query = searchInput.value.trim().toLowerCase();
    let visibleCount = 0;

    faqItems.forEach(function (item) {
      const text = item.innerText.toLowerCase();
      const isMatch = text.includes(query);

      item.style.display = isMatch ? "" : "none";

      if (isMatch) {
        visibleCount++;
      }
    });

    groupTitles.forEach(function (title) {
      if (!query) {
        title.style.display = "";
        return;
      }

      let next = title.nextElementSibling;
      let hasVisibleItem = false;

      while (next && !next.classList.contains("faq-group-title")) {
        if (
          next.classList &&
          next.classList.contains("faq-search-item") &&
          next.style.display !== "none"
        ) {
          hasVisibleItem = true;
          break;
        }

        next = next.nextElementSibling;
      }

      title.style.display = hasVisibleItem ? "" : "none";
    });

    if (noResult) {
      noResult.style.display = visibleCount === 0 ? "block" : "none";
      noResult.classList.toggle("show", visibleCount === 0);
    }
  });
}


/* ===================== CONTACT FORM TO WHATSAPP ===================== */

function initContactFormToWhatsApp() {
  const contactForm = document.getElementById("contactForm");

  if (!contactForm) return;

  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("contactName")?.value.trim() || "";
    const phone = document.getElementById("contactPhone")?.value.trim() || "";
    const type = document.getElementById("contactType")?.value.trim() || "";
    const city = document.getElementById("contactCity")?.value.trim() || "";
    const message = document.getElementById("contactMessage")?.value.trim() || "";

    const whatsappMessage =
      `Hi FlyDayz Team,%0A%0A` +
      `I want to send an enquiry.%0A%0A` +
      `Name: ${encodeURIComponent(name)}%0A` +
      `Phone: ${encodeURIComponent(phone)}%0A` +
      `Enquiry Type: ${encodeURIComponent(type)}%0A` +
      `City / Area: ${encodeURIComponent(city)}%0A` +
      `Message: ${encodeURIComponent(message)}`;

    window.open(`https://wa.me/917209770033?text=${whatsappMessage}`, "_blank");
  });
}


/* ===================== PRODUCT DETAILS PAGE ===================== */

function initProductDetailsPage() {
  const mainProductImage = document.getElementById("mainProductImage");
  const productThumbs = document.querySelectorAll(".pd-thumb");
  const sizeButtons = document.querySelectorAll(".pd-size-list button");

  if (mainProductImage && productThumbs.length) {
    productThumbs.forEach(function (thumb) {
      thumb.addEventListener("click", function () {
        const imagePath = this.getAttribute("data-img");

        if (!imagePath) return;

        productThumbs.forEach(function (item) {
          item.classList.remove("active");
        });

        this.classList.add("active");

        mainProductImage.style.opacity = "0";
        mainProductImage.style.transform = "scale(.96)";

        setTimeout(function () {
          mainProductImage.src = imagePath;
          mainProductImage.style.opacity = "1";
          mainProductImage.style.transform = "scale(1)";
        }, 180);
      });
    });
  }

  if (sizeButtons.length) {
    sizeButtons.forEach(function (btn) {
      btn.addEventListener("click", function () {
        sizeButtons.forEach(function (item) {
          item.classList.remove("active");
        });

        this.classList.add("active");
      });
    });
  }
}


/* ===================== PRODUCT FILTER ===================== */

function initProductFilter() {
  const filterButtons = document.querySelectorAll(".product-filter");
  const productItems = document.querySelectorAll(".product-item");

  if (!filterButtons.length || !productItems.length) return;

  filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const filterValue = this.getAttribute("data-filter");

      filterButtons.forEach(function (btn) {
        btn.classList.remove("active");
      });

      this.classList.add("active");

      productItems.forEach(function (item) {
        const category = item.getAttribute("data-category");

        if (filterValue === "all" || category === filterValue) {
          item.classList.remove("hide");
        } else {
          item.classList.add("hide");
        }
      });
    });
  });
}







document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.product-filter-btn');
  const cards = document.querySelectorAll('.catalog-card');

  buttons.forEach(btn => {
    btn.addEventListener('click', function () {
      const filter = this.getAttribute('data-filter');
      buttons.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      cards.forEach(card => {
        const cats = card.getAttribute('data-category') || '';
        const show = filter === 'all' || cats.split(' ').includes(filter);
        card.classList.toggle('is-hidden', !show);
      });
    });
  });

  const year = document.getElementById('year');
  if (year) { year.textContent = new Date().getFullYear(); }
});







/* =========================================================
   TECHNOLOGY PRODUCT CATEGORY FILTER
========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll(".tech-filter-btn");
  const productCards = document.querySelectorAll(
    ".tech-product-card[data-tech-category]"
  );
  const emptyState = document.getElementById("techProductsEmpty");

  if (!filterButtons.length || !productCards.length) {
    return;
  }

  filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const selectedCategory =
        button.getAttribute("data-tech-filter") || "all";

      let visibleProductCount = 0;

      filterButtons.forEach(function (item) {
        item.classList.remove("active");
      });

      button.classList.add("active");

      productCards.forEach(function (card) {
        const productCategory =
          card.getAttribute("data-tech-category");

        const shouldShow =
          selectedCategory === "all" ||
          selectedCategory === productCategory;

        card.classList.toggle("is-hidden", !shouldShow);

        if (shouldShow) {
          visibleProductCount += 1;
        }
      });

      if (emptyState) {
        emptyState.hidden = visibleProductCount !== 0;
      }
    });
  });
});





document.addEventListener('DOMContentLoaded',
  () => { const b = document.querySelectorAll('[data-why-filter]'), c = document.querySelectorAll('[data-why-category]'); if (!b.length || !c.length) return; b.forEach(x => x.addEventListener('click', () => { const f = x.dataset.whyFilter || 'all'; b.forEach(i => i.classList.remove('active')); x.classList.add('active'); c.forEach(card => card.classList.toggle('is-hidden', !(f === 'all' || card.dataset.whyCategory === f))); })); });




// DOWNLOAD //


document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll("[data-dl-filter]");
  const cards = document.querySelectorAll("[data-dl-category]");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.dataset.dlFilter || "all";

      buttons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      cards.forEach((card) => {
        const shouldShow =
          filter === "all" || card.dataset.dlCategory === filter;
        card.classList.toggle("is-hidden", !shouldShow);
      });
    });
  });
});



/* ===================== BACK TO TOP BUTTON ===================== */

document.addEventListener("DOMContentLoaded", function () {
  const backToTopButton = document.getElementById("backToTop");

  if (!backToTopButton) return;

  function toggleBackToTopButton() {
    if (window.scrollY > 350) {
      backToTopButton.classList.add("show");
    } else {
      backToTopButton.classList.remove("show");
    }
  }

  window.addEventListener("scroll", toggleBackToTopButton, {
    passive: true
  });

  toggleBackToTopButton();

  backToTopButton.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });
});

/* ===================== BACK TO TOP BUTTON END ===================== */

/* ===================== PRIVACY-POLICY ===================== */


document.addEventListener("DOMContentLoaded", () => { const b = [...document.querySelectorAll("[data-privacy-target]")], p = [...document.querySelectorAll("[data-privacy-panel]")]; b.forEach(x => x.addEventListener("click", () => { b.forEach(i => i.classList.remove("active")); p.forEach(i => i.classList.remove("active")); x.classList.add("active"); const t = document.querySelector(`[data-privacy-panel="${x.dataset.privacyTarget}"]`); if (t) { t.classList.add("active"); if (innerWidth < 992) t.scrollIntoView({ behavior: "smooth", block: "start" }) } })) });



// T&C

document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll("[data-terms-target]");
  const panels = document.querySelectorAll("[data-terms-panel]");

  if (!buttons.length || !panels.length) return;

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const target = this.dataset.termsTarget;

      buttons.forEach((item) => item.classList.remove("active"));
      panels.forEach((panel) => panel.classList.remove("active"));

      this.classList.add("active");

      const selected = document.querySelector(`[data-terms-panel="${target}"]`);

      if (selected) {
        selected.classList.add("active");

        if (window.innerWidth < 992) {
          selected.scrollIntoView({
            behavior: "smooth",
            block: "start"
          });
        }
      }
    });
  });
});



// CERTIFICATION



document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll("[data-cert-filter]");
  const certificationCards = document.querySelectorAll("[data-cert-category]");
  const emptyState = document.getElementById("cfEmptyState");

  if (!filterButtons.length || !certificationCards.length) return;

  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const filter = this.dataset.certFilter || "all";
      let visibleCount = 0;

      filterButtons.forEach((item) => item.classList.remove("active"));
      this.classList.add("active");

      certificationCards.forEach((card) => {
        const shouldShow =
          filter === "all" || card.dataset.certCategory === filter;

        card.classList.toggle("is-hidden", !shouldShow);

        if (shouldShow) visibleCount += 1;
      });

      if (emptyState) {
        emptyState.hidden = visibleCount > 0;
      }
    });
  });
});






// BLOG

document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll("[data-blog-filter]");
  const blogCards = document.querySelectorAll("[data-blog-category]");
  const emptyState = document.getElementById("blogEmptyState");
  const jumpLinks = document.querySelectorAll("[data-jump-filter]");

  function applyFilter(filter) {
    let visibleCount = 0;

    filterButtons.forEach((button) => {
      button.classList.toggle("active", button.dataset.blogFilter === filter);
    });

    blogCards.forEach((card) => {
      const show = filter === "all" || card.dataset.blogCategory === filter;
      card.classList.toggle("is-hidden", !show);
      if (show) visibleCount++;
    });

    if (emptyState) {
      emptyState.classList.toggle("show", visibleCount === 0);
    }
  }

  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      applyFilter(this.dataset.blogFilter || "all");
    });
  });

  jumpLinks.forEach((link) => {
    link.addEventListener("click", function () {
      const filter = this.dataset.jumpFilter || "all";
      applyFilter(filter);
    });
  });
});



// CAREER 



document.addEventListener("DOMContentLoaded", function () {
  const filterButtons = document.querySelectorAll("[data-career-filter]");
  const jobCards = document.querySelectorAll("[data-career-category]");
  const emptyState = document.getElementById("careerEmptyState");

  function applyCareerFilter(filter) {
    let visible = 0;

    filterButtons.forEach((button) => {
      button.classList.toggle("active", button.dataset.careerFilter === filter);
    });

    jobCards.forEach((card) => {
      const show = filter === "all" || card.dataset.careerCategory === filter;
      card.classList.toggle("is-hidden", !show);
      if (show) visible++;
    });

    if (emptyState) {
      emptyState.classList.toggle("show", visible === 0);
    }
  }

  filterButtons.forEach((button) => {
    button.addEventListener("click", function () {
      applyCareerFilter(this.dataset.careerFilter || "all");
    });
  });
});







document.addEventListener("DOMContentLoaded", function () {
  const topicButtons = document.querySelectorAll("[data-faq-target]");
  const collapseElements = document.querySelectorAll("#faqExecutiveAccordion .accordion-collapse");

  topicButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const targetSelector = this.dataset.faqTarget;
      const target = document.querySelector(targetSelector);

      if (!target) return;

      const instance = bootstrap.Collapse.getOrCreateInstance(target, {
        toggle: false
      });

      instance.show();

      topicButtons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      target.scrollIntoView({
        behavior: "smooth",
        block: "center"
      });
    });
  });

  collapseElements.forEach((collapse) => {
    collapse.addEventListener("shown.bs.collapse", function () {
      const selector = "#" + this.id;

      topicButtons.forEach((button) => {
        button.classList.toggle(
          "active",
          button.dataset.faqTarget === selector
        );
      });
    });
  });
});






// Visitor Counter

/* =========================================================
   FOOTER YEAR AND VISITOR COUNTER
========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  const visitorCountElement =
    document.getElementById("visitorCount");

  const footerYearElement =
    document.getElementById("footerYear");

  /*
   * Current year automatically show karega.
   */
  if (footerYearElement) {
    footerYearElement.textContent =
      new Date().getFullYear();
  }

  /*
   * Visitor element na mile to code stop hoga.
   */
  if (!visitorCountElement) {
    return;
  }

  const visitorCount =
    Number.parseInt(
      visitorCountElement.dataset.count ||
        visitorCountElement.textContent.replace(/\D/g, ""),
      10
    );

  if (!Number.isFinite(visitorCount)) {
    return;
  }

  animateFooterVisitorCount(
    visitorCountElement,
    visitorCount
  );
});


function animateFooterVisitorCount(
  element,
  finalCount
) {
  const animationDuration = 2600;

  const startingValue =
    Math.max(
      0,
      finalCount - 40
    );

  const startTime =
    performance.now();

  function updateCounter(currentTime) {
    const elapsedTime =
      currentTime - startTime;

    const progress =
      Math.min(
        elapsedTime / animationDuration,
        1
      );

    const easedProgress =
      1 -
      Math.pow(
        1 - progress,
        3
      );

    const currentValue =
      Math.floor(
        startingValue +
        (
          finalCount -
          startingValue
        ) *
        easedProgress
      );

    element.textContent =
      String(currentValue).padStart(
        6,
        "0"
      );

    if (progress < 1) {
      requestAnimationFrame(
        updateCounter
      );
    } else {
      element.textContent =
        String(finalCount).padStart(
          6,
          "0"
        );
    }
  }

  requestAnimationFrame(updateCounter);
}

/* ===================== VISITOR COUNTER END ===================== */

















document.addEventListener('DOMContentLoaded', () => { const f = document.getElementById('distributorForm'); if (!f) return; f.addEventListener('submit', e => { e.preventDefault(); if (!f.checkValidity()) { f.reportValidity(); return; } const v = id => document.getElementById(id).value.trim(); const text = ['Hi FlyDayz Team, I want to apply for distributorship.', '', `Name: ${v('distName')}`, `Phone: ${v('distPhone')}`, `Business/Firm: ${v('distBusiness') || 'Not provided'}`, `City/District: ${v('distCity')}`, `State: ${v('distState')}`, `Partnership Category: ${v('distCategory')}`, `Business Experience: ${v('distExperience') || 'Not provided'}`, `Current Network: ${v('distNetwork') || 'Not provided'}`, `Additional Details: ${v('distMessage') || 'Not provided'}`].join('\n'); window.open('https://wa.me/917209770033?text=' + encodeURIComponent(text), '_blank', 'noopener'); }); });









document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".pd-category-btn");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const target = document.querySelector(this.dataset.target);

      if (!target) return;

      buttons.forEach((btn) => btn.classList.remove("active"));
      this.classList.add("active");

      target.scrollIntoView({
        behavior: "smooth",
        block: "start"
      });
    });
  });

  const sections = document.querySelectorAll(
    "#overview, #features, #technology, #usage, #variants, #enquiry"
  );

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const selector = "#" + entry.target.id;

        buttons.forEach((button) => {
          button.classList.toggle(
            "active",
            button.dataset.target === selector
          );
        });
      });
    },
    {
      rootMargin: "-35% 0px -55% 0px",
      threshold: 0
    }
  );

  sections.forEach((section) => observer.observe(section));
});









document.addEventListener("DOMContentLoaded", function () {
  const categoryButtons = document.querySelectorAll(".bd-category-btn");
  const tocLinks = document.querySelectorAll(".bd-toc a");
  const sections = document.querySelectorAll(
    "#articleIntro, #flowGuide, #sizeGuide, #skinComfort, #nightCare, #relatedArticles"
  );

  categoryButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const target = document.querySelector(this.dataset.target);
      if (!target) return;

      target.scrollIntoView({
        behavior: "smooth",
        block: "start"
      });
    });
  });

  tocLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      const target = document.querySelector(this.getAttribute("href"));
      if (!target) return;

      event.preventDefault();

      target.scrollIntoView({
        behavior: "smooth",
        block: "start"
      });
    });
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const selector = "#" + entry.target.id;

        categoryButtons.forEach((button) => {
          button.classList.toggle(
            "active",
            button.dataset.target === selector
          );
        });

        tocLinks.forEach((link) => {
          link.classList.toggle(
            "active",
            link.getAttribute("href") === selector
          );
        });
      });
    },
    {
      rootMargin: "-30% 0px -60% 0px",
      threshold: 0
    }
  );

  sections.forEach((section) => observer.observe(section));

  const shareButtons = document.querySelectorAll("[data-share]");

  shareButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      const pageUrl = encodeURIComponent(window.location.href);
      const pageTitle = encodeURIComponent(document.title);
      const network = this.dataset.share;
      let shareUrl = "";

      if (network === "facebook") {
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;
      }

      if (network === "twitter") {
        shareUrl = `https://twitter.com/intent/tweet?url=${pageUrl}&text=${pageTitle}`;
      }

      if (network === "linkedin") {
        shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}`;
      }

      if (network === "whatsapp") {
        shareUrl = `https://wa.me/?text=${pageTitle}%20${pageUrl}`;
      }

      if (shareUrl) {
        window.open(shareUrl, "_blank", "noopener,noreferrer,width=700,height=600");
      }
    });
  });

  const helpfulButtons = document.querySelectorAll("[data-helpful]");

  helpfulButtons.forEach((button) => {
    button.addEventListener("click", function () {
      helpfulButtons.forEach((item) => item.classList.remove("active"));
      this.classList.add("active");
    });
  });

  const newsletterForm = document.getElementById("bdNewsletterForm");
  const newsletterMessage = document.getElementById("bdNewsletterMessage");

  if (newsletterForm && newsletterMessage) {
    newsletterForm.addEventListener("submit", function (event) {
      event.preventDefault();

      const email = document.getElementById("bdNewsletterEmail").value.trim();

      if (!email) return;

      newsletterMessage.textContent =
        "Thank you! Your subscription request has been received.";

      newsletterForm.reset();
    });
  }
});
