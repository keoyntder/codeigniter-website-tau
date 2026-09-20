/* ===================== HEADER SHRINK ON SCROLL ===================== */
(function () {

    const header = document.getElementById('siteHeader');

    if (!header) return;

    function updateHeader() {
        if (window.scrollY > 40) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }
    window.addEventListener('scroll', updateHeader, {
        passive: true
    });
    updateHeader();

})();


/* ===================== HERO PARALLAX ===================== */
(function () {

    const hero = document.querySelector('.hero');
    const video = document.querySelector('.hero-video');

    if (!hero || !video) return;

    let ticking = false;

    function updateParallax() {

        const scrollY = window.scrollY;

        const heroHeight = hero.offsetHeight;

        if (scrollY <= heroHeight) {

            video.style.transform =
                `translateY(${scrollY * 0.25}px)`;

        }

        ticking = false;

    }

    window.addEventListener('scroll', function () {

        if (!ticking) {

            window.requestAnimationFrame(updateParallax);

            ticking = true;

        }

    }, { passive: true });

})();


/* ===================== LOADING THROBBER ===================== */
(function initLoader() {
  const overlay = document.getElementById('loaderOverlay');
  if (!overlay) return;

  function hideLoader() {
    overlay.classList.add('hidden');
    setTimeout(() => {
      if (overlay.parentNode) overlay.remove();
    }, 700);
  }

  if (document.readyState === 'complete') {
    setTimeout(hideLoader, 400);
  } else {
    window.addEventListener('load', hideLoader);
    setTimeout(hideLoader, 5000);
  }
})();


/* ===================== NAV DRAWER DROPDOWNS ===================== */
(function drawerDropdowns() {
    document.querySelectorAll('.sub-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const item   = btn.closest('.has-sub');
            const isOpen = item.classList.contains('open');

            // close any other open dropdown first
            document.querySelectorAll('.has-sub.open').forEach(other => {
                other.classList.remove('open');
                other.querySelector('.sub-toggle').setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                item.classList.add('open');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();


/* ===================== BURGER / NAV DRAWER ===================== */
(function navDrawer() {
  const burgerBtn = document.getElementById('burgerBtn');
  const navMenu = document.getElementById('navMenu');
  const navOverlay = document.getElementById('navOverlay');

  if (!burgerBtn || !navMenu || !navOverlay) return;

  function openMenu() {
    navMenu.classList.add('open');
    navOverlay.classList.add('visible');
    burgerBtn.setAttribute('aria-expanded', 'true');
  }

  function closeMenu() {
    navMenu.classList.remove('open');
    navOverlay.classList.remove('visible');
    burgerBtn.setAttribute('aria-expanded', 'false');
  }

  function toggleMenu() {
    const isOpen = navMenu.classList.contains('open');
    isOpen ? closeMenu() : openMenu();
  }

  burgerBtn.addEventListener('click', toggleMenu);
  navOverlay.addEventListener('click', closeMenu);

  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMenu();
  });
})();


/* ===================== SEARCH ICON / INLINE EXPAND ===================== */
(function searchInline() {
  const wrap = document.getElementById('searchInline');
  const searchBtn = document.getElementById('searchBtn');
  const input = document.getElementById('searchInput');
  const closeBtn = document.getElementById('searchCloseBtn');

  if (!wrap || !searchBtn || !input || !closeBtn) return;

  function openSearch() {
    wrap.classList.add('active');
    setTimeout(() => input.focus(), 250);
  }

  function closeSearch() {
    wrap.classList.remove('active');
    input.value = '';
    input.blur();
  }

  function toggleSearch() {
    wrap.classList.contains('active') ? closeSearch() : openSearch();
  }

  searchBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleSearch();
  });

  closeBtn.addEventListener('click', closeSearch);

  document.addEventListener('click', (e) => {
    if (!wrap.classList.contains('active')) return;
    if (wrap.contains(e.target)) return;
    closeSearch();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && wrap.classList.contains('active')) closeSearch();
  });

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      const query = input.value.trim();
      if (!query) return;
      console.log('Search submitted:', query);
    }
  });

  window.addEventListener('scroll', () => {
    if (wrap.classList.contains('active') && !input.value.trim()) {
      closeSearch();
    }
  }, { passive: true });
})();


/* ===================== LANGUAGE TOGGLE ===================== */
(function languageToggle() {
  const langButtons = document.querySelectorAll('.lang-btn');
  if (!langButtons.length) return;

  langButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      langButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });
})();


/* ===================== HEADER DROPDOWN (Admissions) ===================== */
/* Hover is handled in CSS; this adds click / tap / keyboard support */
(function headerDropdown() {
  const dropdowns = document.querySelectorAll('.nav-dropdown');
  if (!dropdowns.length) return;

  function setOpen(dd, open) {
    dd.classList.toggle('open', open);
    const toggle = dd.querySelector('.nav-dropdown-toggle');
    if (toggle) toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  dropdowns.forEach(dd => {
    const toggle = dd.querySelector('.nav-dropdown-toggle');
    if (!toggle) return;

    // Click / tap / Enter on "Admissions" opens the menu instead of navigating.
    // (The first item in the menu, "Admissions Overview", links to the page.)
    toggle.addEventListener('click', (e) => {
      e.preventDefault();
      setOpen(dd, !dd.classList.contains('open'));
    });

    // Pointer leaves: release the click-opened state
    dd.addEventListener('mouseleave', () => setOpen(dd, false));
  });

  // Click anywhere outside closes it
  document.addEventListener('click', (e) => {
    dropdowns.forEach(dd => {
      if (!dd.contains(e.target)) setOpen(dd, false);
    });
  });

  // Escape closes it
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') dropdowns.forEach(dd => setOpen(dd, false));
  });
})();


/* ===================== CAMPUS HIGHLIGHTS SLIDER ===================== */
(function campusSlider() {
  const track = document.getElementById('campusSliderTrack');
  const prevBtn = document.getElementById('campusPrevBtn');
  const nextBtn = document.getElementById('campusNextBtn');

  if (!track || !prevBtn || !nextBtn) return;

  const viewport = track.parentElement;
  const slides = Array.from(track.children);
  if (!slides.length) return;

  let activeIndex = Math.min(2, slides.length - 1);

  function update() {
    slides.forEach((slide, i) => {
      slide.classList.toggle('is-active', i === activeIndex);
    });

    const activeSlide = slides[activeIndex];
    const viewportWidth = viewport.offsetWidth;
    const slideCenter = activeSlide.offsetLeft + activeSlide.offsetWidth / 2;
    const offset = viewportWidth / 2 - slideCenter;

    track.style.transform = `translateX(${offset}px)`;

    prevBtn.disabled = activeIndex === 0;
    nextBtn.disabled = activeIndex === slides.length - 1;
  }

  prevBtn.addEventListener('click', () => {
    if (activeIndex > 0) {
      activeIndex--;
      update();
    }
  });

  nextBtn.addEventListener('click', () => {
    if (activeIndex < slides.length - 1) {
      activeIndex++;
      update();
    }
  });

  window.addEventListener('resize', update, { passive: true });
  window.addEventListener('load', update);

  update();
})();


/* ===================== ADMIN MODAL MANAGER ===================== */
function openModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'block';
  }
}

function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
  }
}

document.addEventListener('click', (e) => {
  if (e.target.classList.contains('custom-modal')) {
    e.target.style.display = 'none';
  }
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    document.querySelectorAll('.custom-modal').forEach(modal => {
      modal.style.display = 'none';
    });
  }
});


/* ===================== HERO RANK SWITCHER ===================== */
(function heroAutoSlider() {

    const hero = document.querySelector('.hero');
    const slides = [...document.querySelectorAll('.hero-slide')];

    if (!hero || !slides.length) return;

    let current = 0;
    let timer = null;

    const duration = 4000;

    function showSlide(index) {

        current = index;

        slides.forEach((slide, i) => {
            slide.classList.toggle(
                'is-active',
                i === current
            );
        });
    }

    function nextSlide() {

        const next = (current + 1) % slides.length;

        showSlide(next);
    }

    function startSlider() {

        if (
            window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            ).matches
        ) {
            return;
        }

        stopSlider();

        timer = setInterval(
            nextSlide,
            duration
        );
    }

    function stopSlider() {

        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    // Make sure the first slide is visible
    showSlide(0);

    // Start automatic rotation
    startSlider();

})();


/* ===================== ADMISSIONS MODALS ===================== */
document.addEventListener('DOMContentLoaded', function () {

  function openAdmModal(modal) {
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeAdmModal(modal) {
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('[data-modal]').forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      var modal = document.getElementById(trigger.getAttribute('data-modal'));
      if (modal) openAdmModal(modal);
    });
  });

  document.querySelectorAll('[data-modal-close]').forEach(function (closer) {
    closer.addEventListener('click', function () {
      var modal = closer.closest('.adm-modal-overlay');
      if (modal) closeAdmModal(modal);
    });
  });

  document.querySelectorAll('.adm-modal-overlay').forEach(function (overlay) {
    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) closeAdmModal(overlay);
    });
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.adm-modal-overlay.is-open').forEach(closeAdmModal);
    }
  });
});

/* ===================== ENROLLMENT SCHEDULE CALENDAR ===================== */
document.addEventListener('DOMContentLoaded', function () {
  var days = document.querySelectorAll('.enr-day.is-enroll');
  if (!days.length) return;

  days.forEach(function (btn) {
    btn.addEventListener('click', function () {
      document
        .querySelectorAll('.enr-day.is-active, .enr-panel.is-active')
        .forEach(function (el) { el.classList.remove('is-active'); });

      btn.classList.add('is-active');

      var panel = document.getElementById('enr-panel-' + btn.dataset.day);
      if (panel) panel.classList.add('is-active');
    });
  });
});

/* ===================== PROGRAMS BY COLLEGE — ACCORDION ===================== */
(function () {
  var toggles = document.querySelectorAll('.college-toggle');
  if (!toggles.length) return;

  // Set to true if only one college should stay open at a time
  var singleOpen = false;

  function setOpen(block, open) {
    var btn = block.querySelector('.college-toggle');
    block.classList.toggle('is-open', open);
    if (btn) btn.setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  toggles.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var block = btn.closest('.college-block');
      var open  = !block.classList.contains('is-open');

      if (singleOpen && open) {
        document.querySelectorAll('.college-block.is-open').forEach(function (other) {
          if (other !== block) setOpen(other, false);
        });
      }
      setOpen(block, open);
    });
  });

  // Open the right college when the page is reached by #cet, #coed, etc.
  function openFromHash() {
    var id = window.location.hash.slice(1);
    if (!id) return;
    var block = document.getElementById(id);
    if (block && block.classList.contains('college-block')) {
      setOpen(block, true);
      block.scrollIntoView({ block: 'start' });
    }
  }

  openFromHash();
  window.addEventListener('hashchange', openFromHash);
})();