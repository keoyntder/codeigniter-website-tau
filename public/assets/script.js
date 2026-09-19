/* ===================== HEADER SHRINK ON SCROLL ===================== */
const header = document.getElementById('siteHeader');
const SCROLL_THRESHOLD = 60;

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

    // Set correct state on page load
    updateHeader();

})();

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
function updateHeaderState() {
  if (!header) return;
  if (window.scrollY > SCROLL_THRESHOLD) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
}

window.addEventListener('scroll', updateHeaderState, { passive: true });
updateHeaderState();

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

/* ===================== WHY TAU MASONRY (fixed) ===================== */
function layoutWhyTauMasonry() {
  const container = document.getElementById('whyTauCards');
  if (!container) return;

  const NUM_COLUMNS = 4;
  const cards = Array.from(container.querySelectorAll('.why-tau-card'));
  if (cards.length === 0) return;

  const cardHeights = cards.map(card => card.offsetHeight);

  const columns = [];
  for (let i = 0; i < NUM_COLUMNS; i++) {
    const col = document.createElement('div');
    col.className = 'why-tau-col-gen' + (i % 2 === 1 ? ' offset' : '');
    columns.push(col);
  }

  const heights = columns.map((col, i) => (i % 2 === 1 ? 90 : 0));

  cards.forEach((card, idx) => {
    let shortest = 0;
    for (let i = 1; i < heights.length; i++) {
      if (heights[i] < heights[shortest]) shortest = i;
    }
    columns[shortest].appendChild(card);
    heights[shortest] += cardHeights[idx] + 14;
  });

  container.innerHTML = '';
  columns.forEach(col => container.appendChild(col));
}

document.addEventListener('DOMContentLoaded', layoutWhyTauMasonry);
window.addEventListener('resize', layoutWhyTauMasonry);

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