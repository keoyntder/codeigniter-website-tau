/* ===================== LOADING THROBBER =====================
   Markup:  app/Views/partials/loader.php  (#loaderOverlay)
   Styles:  public/assets/css/loader.css
   ============================================================ */
(function initLoader() {
  var overlay = document.getElementById('loaderOverlay');
  if (!overlay) return;

  // Longer on the first page of a visit, shorter when moving between pages
  var isFirst = true;
  try {
    isFirst = !sessionStorage.getItem('tauLoaderSeen');
    sessionStorage.setItem('tauLoaderSeen', '1');
  } catch (e) {}

  var minShow = isFirst ? 600 : 250;
  var started = performance.now();
  var hidden  = false;

  function hideLoader() {
    if (hidden) return;
    hidden = true;
    overlay.classList.add('hidden');
    setTimeout(function () { overlay.remove(); }, 700);
  }

  function hideAfterMin() {
    var wait = Math.max(0, minShow - (performance.now() - started));
    setTimeout(hideLoader, wait);
  }

  if (document.readyState === 'complete') hideAfterMin();
  else window.addEventListener('load', hideAfterMin);

  setTimeout(hideLoader, 3000); // safety net

  // Back/forward cache: never show a stuck loader
  window.addEventListener('pageshow', function (e) {
    if (e.persisted) overlay.remove();
  });
})();


/* ===================== HEADER: shrink on home only ===================== */
(function () {

    const header = document.getElementById('siteHeader');
    if (!header) return;

    // Home page = the one with the hero video
    const isHome = !!document.querySelector('.hero-video');

    if (!isHome) {
        // Other pages: lock the solid header, never change on scroll
        header.classList.add('is-scrolled');
        return;
    }

    header.classList.add('is-home');

    function updateHeader() {
        if (window.scrollY > 40) {
            header.classList.add('is-scrolled');
        } else {
            header.classList.remove('is-scrolled');
        }
    }
    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();

})();


/* ===================== MEASURE HEADER HEIGHT (for fixed-header layouts) ===================== */
(function measureHeader() {
  var header = document.getElementById('siteHeader');
  if (!header) return;

  function setHeaderHeight() {
    document.documentElement.style.setProperty('--header-h-full', header.offsetHeight + 'px');
  }

  setHeaderHeight();
  window.addEventListener('load', setHeaderHeight);
  window.addEventListener('resize', setHeaderHeight, { passive: true });

  if (window.ResizeObserver) {
    new ResizeObserver(setHeaderHeight).observe(header);
  }
})();


/* ===================== ADMISSIONS: HAND SCROLL TO THE PAGE AT THE END ===================== */
(function admScrollHandoff() {
  var content = document.querySelector('.adm-content');
  if (!content) return;

  content.addEventListener('wheel', function (e) {
    // On phones the content isn't its own scroller
    if (content.scrollHeight <= content.clientHeight && window.innerWidth <= 900) return;

    var delta = e.deltaMode === 1 ? e.deltaY * 16 : e.deltaY;   // Firefox sends lines
    var canScroll = content.scrollHeight > content.clientHeight + 1;
    var atEnd = content.scrollTop + content.clientHeight >= content.scrollHeight - 1;

    var pageTakesOver =
      (delta > 0 && (atEnd || !canScroll)) ||        // reached the end: scroll down to the footer
      (delta < 0 && window.scrollY > 0);             // page is scrolled down: bring the layout back first

    if (pageTakesOver) {
      e.preventDefault();
      window.scrollBy({ top: delta, behavior: 'instant' });
    }
  }, { passive: false });
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
            video.style.transform = `translateY(${scrollY * 0.25}px)`;
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


/* ===================== SEARCH ICON / INLINE EXPAND + RESULTS ===================== */
(function searchInline() {
  const wrap = document.getElementById('searchInline');
  const searchBtn = document.getElementById('searchBtn');
  const input = document.getElementById('searchInput');
  const closeBtn = document.getElementById('searchCloseBtn');

  if (!wrap || !searchBtn || !input || !closeBtn) return;

  const lang = () => window.currentLang || localStorage.getItem('siteLang') || 'en';

  // Quick links to site pages (label per language + extra keywords)
  const PAGES = [
    { en: 'Universitas Agriculturae', tl: 'Universitas Agriculturae', kw: 'about university history mission vision', href: 'about' },
    { en: 'Admissions', tl: 'Pagpasok', kw: 'admission apply enroll enrollment programs courses pagpasok', href: 'admissions' },
    { en: 'Offices', tl: 'Mga Tanggapan', kw: 'office offices registrar tanggapan', href: 'offices' },
    { en: 'Careers', tl: 'Karera', kw: 'careers jobs hiring work karera', href: 'careers' },
    { en: 'Announcements', tl: 'Mga Anunsyo', kw: 'news announcements anunsyo', href: '#announcements' },
    { en: 'Contact', tl: 'Makipag-ugnayan', kw: 'contact email phone address ugnayan', href: '#contact' }
  ];

  const results = document.createElement('div');
  results.className = 'search-results';
  results.hidden = true;
  wrap.appendChild(results);

  function openSearch() {
    wrap.classList.add('active');
    setTimeout(() => input.focus(), 250);
  }

  function closeSearch() {
    wrap.classList.remove('active');
    input.value = '';
    input.blur();
    results.hidden = true;
    results.innerHTML = '';
  }

  function toggleSearch() {
    wrap.classList.contains('active') ? closeSearch() : openSearch();
  }

  function addGroup(title) {
    const h = document.createElement('div');
    h.className = 'search-group';
    h.textContent = title;
    results.appendChild(h);
  }

  function addItem(label, sub, onClick) {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'search-item';
    const t = document.createElement('span');
    t.className = 'search-item-title';
    t.textContent = label;
    btn.appendChild(t);
    if (sub) {
      const s = document.createElement('span');
      s.className = 'search-item-sub';
      s.textContent = sub;
      btn.appendChild(s);
    }
    btn.addEventListener('click', () => {
      closeSearch();
      onClick();
    });
    results.appendChild(btn);
  }

  function snippet(text, idx, len) {
    const start = Math.max(0, idx - 30);
    const end = Math.min(text.length, idx + len + 60);
    return (start > 0 ? '…' : '') + text.slice(start, end).trim() + (end < text.length ? '…' : '');
  }

  function findOnPage(q) {
    const skip = '#siteHeader, #navMenu, .nav-overlay, .search-results, script, style, noscript';
    const found = [];
    const seen = new Set();

    document.querySelectorAll('h1,h2,h3,h4,h5,p,li,figcaption,td,th,blockquote').forEach(el => {
      if (found.length >= 8) return;
      if (el.closest(skip)) return;
      if (el.offsetParent === null) return; // hidden
      if (el.querySelector('h1,h2,h3,h4,h5,p,li')) return; // use the innermost element only

      const text = el.textContent.replace(/\s+/g, ' ').trim();
      const idx = text.toLowerCase().indexOf(q);
      if (idx === -1 || seen.has(text)) return;

      seen.add(text);
      found.push({ el, text, idx });
    });
    return found;
  }

  function goTo(el) {
    el.scrollIntoView({ behavior: 'smooth', block: 'center' });
    el.classList.add('search-hit');
    setTimeout(() => el.classList.remove('search-hit'), 2500);
  }

  function render() {
    const q = input.value.trim().toLowerCase();
    results.innerHTML = '';

    if (q.length < 2) {
      results.hidden = true;
      return;
    }

    const L = lang();

    const pageMatches = PAGES.filter(p =>
      (p.en + ' ' + p.tl + ' ' + p.kw).toLowerCase().includes(q)
    );
    if (pageMatches.length) {
      addGroup(L === 'tl' ? 'Mga Pahina' : 'Pages');
      pageMatches.forEach(p => {
        addItem(p[L], null, () => {
          const link = document.querySelector('a[href$="' + p.href + '"]');
          if (link) window.location.href = link.href;
        });
      });
    }

    const textMatches = findOnPage(q);
    if (textMatches.length) {
      addGroup(L === 'tl' ? 'Sa pahinang ito' : 'On this page');
      textMatches.forEach(m => {
        addItem(snippet(m.text, m.idx, q.length), null, () => goTo(m.el));
      });
    }

    if (!pageMatches.length && !textMatches.length) {
      const empty = document.createElement('div');
      empty.className = 'search-empty';
      empty.textContent = L === 'tl' ? 'Walang nahanap.' : 'No results found.';
      results.appendChild(empty);
    }

    results.hidden = false;
  }

  searchBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    toggleSearch();
  });

  closeBtn.addEventListener('click', closeSearch);
  input.addEventListener('input', render);

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      const first = results.querySelector('.search-item');
      if (first) first.click();
    }
  });

  document.addEventListener('click', (e) => {
    if (!wrap.classList.contains('active')) return;
    if (wrap.contains(e.target)) return;
    closeSearch();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && wrap.classList.contains('active')) closeSearch();
  });

  // Close on scroll only when nothing is typed (so result clicks/scrolls don't fight it)
  window.addEventListener('scroll', () => {
    if (wrap.classList.contains('active') && !input.value.trim()) {
      closeSearch();
    }
  }, { passive: true });
})();


/* ===================== LANGUAGE TOGGLE ===================== */
(function languageToggle() {
  const STORAGE_KEY = 'siteLang';
  const langButtons = document.querySelectorAll('.lang-btn');
  if (!langButtons.length) return;

  let currentLang = localStorage.getItem(STORAGE_KEY) || 'en';

  function translate(root, lang) {
    if (root.nodeType !== 1) return;

    const nodes = root.matches('[data-en][data-tl]') ? [root] : [];
    root.querySelectorAll('[data-en][data-tl]').forEach(el => nodes.push(el));

    nodes.forEach(el => {
      const text = el.getAttribute('data-' + lang);
      if (text !== null) el.textContent = text;
    });

    // Placeholders: data-en-placeholder / data-tl-placeholder
    const phNodes = root.matches('[data-en-placeholder]') ? [root] : [];
    root.querySelectorAll('[data-en-placeholder]').forEach(el => phNodes.push(el));

    phNodes.forEach(el => {
      const ph = el.getAttribute('data-' + lang + '-placeholder');
      if (ph !== null) el.setAttribute('placeholder', ph);
    });
  }

  function setLang(lang) {
    currentLang = lang;
    localStorage.setItem(STORAGE_KEY, lang);
    document.documentElement.lang = lang === 'tl' ? 'fil' : 'en';

    langButtons.forEach(b => b.classList.toggle('active', b.dataset.lang === lang));
    translate(document.body, lang);
    window.currentLang = lang;
  }

  langButtons.forEach(btn => {
    btn.addEventListener('click', () => setLang(btn.dataset.lang));
  });

  // Translate any content added to the page later
  new MutationObserver(mutations => {
    if (currentLang === 'en') return;
    mutations.forEach(m => m.addedNodes.forEach(n => translate(n, currentLang)));
  }).observe(document.body, { childList: true, subtree: true });

  setLang(currentLang);
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


/* ===================== FOOTER SHARE ROW ===================== */
(function () {
  var row = document.querySelector('[data-share-row]');
  if (!row) return;

  var copiedNote = document.querySelector('[data-share-copied]');

  function openPopup(url) {
    var w = 600, h = 500;
    var left = (window.screen.width - w) / 2;
    var top = (window.screen.height - h) / 2;
    window.open(
      url,
      'share',
      'width=' + w + ',height=' + h + ',left=' + left + ',top=' + top + ',noopener,noreferrer'
    );
  }

  function shareLinks(pageUrl, pageTitle) {
    var u = encodeURIComponent(pageUrl);
    var t = encodeURIComponent(pageTitle);
    return {
      facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + u,
      x: 'https://twitter.com/intent/tweet?url=' + u + '&text=' + t,
      linkedin: 'https://www.linkedin.com/sharing/share-offsite/?url=' + u,
      whatsapp: 'https://api.whatsapp.com/send?text=' + t + '%20' + u,
      telegram: 'https://t.me/share/url?url=' + u + '&text=' + t,
      email: 'mailto:?subject=' + t + '&body=' + u
    };
  }

  row.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-share]');
    if (!btn) return;

    var platform = btn.getAttribute('data-share');
    var pageUrl = window.location.href;
    var pageTitle = document.title;

    if (platform === 'copy') {
      navigator.clipboard.writeText(pageUrl).then(function () {
        if (!copiedNote) return;
        copiedNote.hidden = false;
        copiedNote.classList.add('is-visible');
        setTimeout(function () {
          copiedNote.classList.remove('is-visible');
          setTimeout(function () { copiedNote.hidden = true; }, 200);
        }, 1800);
      });
      return;
    }

    var links = shareLinks(pageUrl, pageTitle);
    var target = links[platform];
    if (!target) return;

    if (platform === 'email') {
      window.location.href = target;
    } else {
      openPopup(target);
    }
  });
})();


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
            slide.classList.toggle('is-active', i === current);
        });
    }

    function nextSlide() {
        showSlide((current + 1) % slides.length);
    }

    function stopSlider() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    function startSlider() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        stopSlider();
        timer = setInterval(nextSlide, duration);
    }

    showSlide(0);
    startSlider();

})();


/* ===================== ADMISSIONS / CAREERS: SUB-MODALS ===================== */
function wireAdmSubModals(root) {
  function openAdmModal(modal) {
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeAdmModal(modal) {
    modal.classList.remove('is-open');
    if (!document.querySelector('.adm-modal-overlay.is-open')) {
      document.body.style.overflow = '';
    }
  }

  var modals = root.querySelectorAll('.adm-modal-overlay');

  root.querySelectorAll('[data-modal]').forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      var modal = document.getElementById(trigger.getAttribute('data-modal'));
      if (modal) openAdmModal(modal);
    });
  });

  modals.forEach(function (modal) {
    modal.querySelectorAll('[data-modal-close]').forEach(function (closer) {
      closer.addEventListener('click', function () { closeAdmModal(modal); });
    });
    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeAdmModal(modal);
    });
  });
}

document.addEventListener('keydown', function (e) {
  if (e.key !== 'Escape') return;
  var anyClosed = false;
  document.querySelectorAll('.adm-modal-overlay.is-open').forEach(function (modal) {
    modal.classList.remove('is-open');
    anyClosed = true;
  });
  if (anyClosed) document.body.style.overflow = '';
});

document.addEventListener('DOMContentLoaded', function () {
  wireAdmSubModals(document);
});


/* ===================== ENROLLMENT SCHEDULE CALENDAR ===================== */
function wireEnrollmentCalendar(root) {
  var days = root.querySelectorAll('.enr-day.is-enroll');
  if (!days.length) return;

  days.forEach(function (btn) {
    btn.addEventListener('click', function () {
      root.querySelectorAll('.enr-day.is-active, .enr-panel.is-active')
        .forEach(function (el) { el.classList.remove('is-active'); });

      btn.classList.add('is-active');

      var panel = root.querySelector('#enr-panel-' + btn.dataset.day);
      if (panel) panel.classList.add('is-active');
    });
  });
}

document.addEventListener('DOMContentLoaded', function () {
  wireEnrollmentCalendar(document);
});


/* ===================== PROGRAMS BY COLLEGE — ACCORDION ===================== */
function wireCollegeAccordion(root, opts) {
  opts = opts || {};
  var toggles = root.querySelectorAll('.college-toggle');
  if (!toggles.length) return;

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
        root.querySelectorAll('.college-block.is-open').forEach(function (other) {
          if (other !== block) setOpen(other, false);
        });
      }
      setOpen(block, open);
    });
  });

  if (opts.openFromHash) {
    var id = window.location.hash.slice(1);
    if (id) {
      var block = root.querySelector('#' + CSS.escape(id));
      if (block && block.classList.contains('college-block')) {
        setOpen(block, true);
        block.scrollIntoView({ block: 'start' });
      }
    }
    window.addEventListener('hashchange', function () {
      var hid = window.location.hash.slice(1);
      var hblock = hid && root.querySelector('#' + CSS.escape(hid));
      if (hblock && hblock.classList.contains('college-block')) {
        setOpen(hblock, true);
        hblock.scrollIntoView({ block: 'start' });
      }
    });
  }
}

document.addEventListener('DOMContentLoaded', function () {
  wireCollegeAccordion(document, { openFromHash: true });
});


/* ===================== FOOTER: HIGHLIGHT TODAY'S HOURS ===================== */
(function () {
  const rows = document.querySelectorAll('.hours-row');
  const today = new Date().toLocaleDateString('en-US', { weekday: 'long' });
  rows.forEach(row => {
    if (row.querySelector('.hours-day').textContent.trim() === today) {
      row.classList.add('is-today');
    }
  });
})();


/* ===================== ADMISSIONS NAV DROPDOWN (mobile panel switcher) ===================== */
function wireAdmNavSelect(root) {
  var select = root.querySelector('.adm-nav-select');
  if (!select) return;

  var navLinks = root.querySelectorAll('.adm-nav-btn[data-panel]');
  var panels   = root.querySelectorAll('.admissions-panel[data-panel]');
  if (!navLinks.length || !panels.length) return;

  if (select.dataset.wired === 'true') return;
  select.dataset.wired = 'true';

  function showPanel(name) {
    panels.forEach(function (p) {
      p.hidden = p.getAttribute('data-panel') !== name;
    });

    navLinks.forEach(function (a) {
      var isActive = a.getAttribute('data-panel') === name;
      a.classList.toggle('active', isActive);
      if (isActive) {
        a.setAttribute('aria-current', 'page');
      } else {
        a.removeAttribute('aria-current');
      }
    });

    if (window.history && history.replaceState) {
      history.replaceState(null, '', '#' + name);
    }

    var content = root.querySelector('.adm-content');
    if (content) content.scrollTo({ top: 0, behavior: 'auto' });
  }

  select.addEventListener('change', function () {
    showPanel(select.value);
  });

  navLinks.forEach(function (btn) {
    btn.addEventListener('click', function () {
      select.value = btn.dataset.panel;
    });
  });
}

document.addEventListener('DOMContentLoaded', function () {
  var root = document.querySelector('.admissions-page');
  if (root) wireAdmNavSelect(root);
});


/* ===================== ABOUT — SIDEBAR PANEL SWITCHING ===================== */
function wireAboutLayout(layout) {
  const links    = layout.querySelectorAll('.side-nav a[data-panel]');
  const panels   = layout.querySelectorAll('.about-panel');
  const hashSync = layout.dataset.hashSync === 'true';
  const select   = layout.querySelector('.about-nav-select');

  if (!links.length || !panels.length) return;

  // Build the mobile dropdown's options from the same links already in the
  // DOM, so the two never fall out of sync.
  if (select && select.dataset.built !== 'true') {
    select.dataset.built = 'true';
    links.forEach(function (link) {
      var opt = document.createElement('option');
      opt.value = link.dataset.panel;
      opt.textContent = link.textContent.trim();
      select.appendChild(opt);
    });
  }

  function show(id) {
    let found = false;

    panels.forEach(panel => {
      const match = panel.dataset.panel === id;
      panel.hidden = !match;
      if (match) found = true;
    });

    if (!found) {
      id = panels[0].dataset.panel;
      panels[0].hidden = false;
    }

    links.forEach(link => {
      const on = link.dataset.panel === id;
      link.classList.toggle('active', on);
      if (on) link.setAttribute('aria-current', 'page');
      else link.removeAttribute('aria-current');
    });

    if (select) select.value = id;
  }

  links.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const id = link.dataset.panel;

      if (hashSync) {
        history.replaceState(null, '', '#' + id);
      }

      show(id);

      if (window.innerWidth <= 900) {
        layout.querySelector('.about-content').scrollIntoView({ behavior: 'smooth' });
      }
    });
  });

  if (select) {
    select.addEventListener('change', function () {
      const id = select.value;

      if (hashSync) {
        history.replaceState(null, '', '#' + id);
      }

      show(id);
      layout.querySelector('.about-content').scrollIntoView({ behavior: 'smooth' });
    });
  }

  show(hashSync ? (location.hash.slice(1) || panels[0].dataset.panel) : panels[0].dataset.panel);
}

document.querySelectorAll('.about-layout').forEach(wireAboutLayout);


/* ===================== ABOUT SF TABS ===================== */
function wireSfTabs(root) {
  root.querySelectorAll('.sf-tabs').forEach(function (tabBar) {
    var tabs = tabBar.querySelectorAll('.sf-tab');
    var scope = tabBar.closest('.about-panel');

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var target = tab.getAttribute('data-sf-tab');

        tabs.forEach(function (t) {
          var isActive = t === tab;
          t.classList.toggle('active', isActive);
          t.setAttribute('aria-selected', isActive ? 'true' : 'false');
          t.tabIndex = isActive ? 0 : -1;
        });

        scope.querySelectorAll('.sf-panel').forEach(function (panel) {
          panel.hidden = panel.getAttribute('data-sf-panel') !== target;
        });
      });
    });
  });
}

document.querySelectorAll('.about-layout').forEach(wireSfTabs);


/* =========================================================
   ADMISSIONS — PANEL SWITCHER
========================================================= */
function admissionsPanels(root) {
  root = root || document.querySelector('.admissions-page');
  if (!root) return;

  if (root.dataset.panelsBound === 'true') return;

  var navLinks = root.querySelectorAll('.adm-nav-btn[data-panel]');
  var panels   = root.querySelectorAll('.admissions-panel[data-panel]');
  var select   = root.querySelector('.adm-nav-select');

  if (!navLinks.length || !panels.length) return;

  root.dataset.panelsBound = 'true';

  function showPanel(name, updateHash) {
    panels.forEach(function (p) {
      p.hidden = p.getAttribute('data-panel') !== name;
    });
    navLinks.forEach(function (a) {
      var isActive = a.getAttribute('data-panel') === name;
      a.classList.toggle('active', isActive);
      if (isActive) {
        a.setAttribute('aria-current', 'page');
      } else {
        a.removeAttribute('aria-current');
      }
    });

    // keep the mobile dropdown in sync
    if (select) select.value = name;

    if (updateHash && window.history && history.replaceState) {
      history.replaceState(null, '', '#' + name);
    }

    var content = root.querySelector('.adm-content');
    if (content) content.scrollTo({ top: 0, behavior: 'auto' });
  }

  navLinks.forEach(function (a) {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      showPanel(a.getAttribute('data-panel'), true);
    });
  });

  var initial = (location.hash || '').replace('#', '');
  var hasPanel = Array.prototype.some.call(panels, function (p) {
    return p.getAttribute('data-panel') === initial;
  });
  if (initial && hasPanel) {
    showPanel(initial, false);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  admissionsPanels();
});



/* =====================================================================
   ONLINE SERVICES DROPDOWN
===================================================================== */
(function () {
  var dropdowns = document.querySelectorAll('.nav-dropdown');

  function setOpen(d, open) {
    d.classList.toggle('open', open);
    d.querySelector('.nav-dropdown-toggle')
      .setAttribute('aria-expanded', open ? 'true' : 'false');
  }

  dropdowns.forEach(function (d) {
    var btn = d.querySelector('.nav-dropdown-toggle');

    // Click opens or closes the dropdown
    btn.addEventListener('click', function () {
      setOpen(d, !d.classList.contains('open'));
    });
  });
})();


/* =====================================================================
   ONLINE SERVICES in the mobile drawer (expand and collapse on click)
===================================================================== */
document.querySelectorAll('.drawer-dropdown-toggle').forEach(function (btn) {
  btn.addEventListener('click', function () {
    var open = btn.closest('.drawer-dropdown').classList.toggle('open');
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
  });
});

/* Offices Under the OP / Publications: click to expand, stays open until clicked again */
(function inlineSubmenus() {
  document.querySelectorAll('.nav-has-sub > a').forEach(function (link) {
    link.setAttribute('aria-expanded', 'false');
    link.addEventListener('click', function (e) {
      e.preventDefault();
      var open = link.parentElement.classList.toggle('open');
      link.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

  // collapse the submenus when their parent dropdown closes
  document.querySelectorAll('.nav-dropdown').forEach(function (dd) {
    new MutationObserver(function () {
      if (dd.classList.contains('open')) return;
      dd.querySelectorAll('.nav-has-sub.open').forEach(function (item) {
        item.classList.remove('open');
        item.firstElementChild.setAttribute('aria-expanded', 'false');
      });
    }).observe(dd, { attributes: true, attributeFilter: ['class'] });
  });
})();


/* =====================================================================
   AUTO-HIDE HEADER MENUS ON SCROLL (all pages)
   Closes: Online Services dropdown, its submenus, the mobile drawer
   dropdowns, and the burger drawer.
   Works for the page scroll AND inner scrollers (like .adm-content),
   because scroll events are caught in the capture phase.
===================================================================== */
(function autoHideHeaderMenus() {
  var THRESHOLD = 8;           // px of scrolling before menus close (ignores phantom events)
  var lastTop   = new WeakMap();
  var travelled = 0;
  var lastEvt   = 0;

  // Scrolling INSIDE a menu must not close it
  var MENU_SELECTOR = '#navMenu, .nav-dropdown, .drawer-dropdown, .search-results';

  function isMenuOpen() {
    return !!document.querySelector(
      '.nav-dropdown.open, .nav-has-sub.open, .drawer-dropdown.open, .has-sub.open, #navMenu.open'
    );
  }

  function closeHeaderMenus() {
    // Desktop dropdown (Online Services)
    document.querySelectorAll('.nav-dropdown.open').forEach(function (dd) {
      dd.classList.remove('open');
      var t = dd.querySelector('.nav-dropdown-toggle');
      if (t) t.setAttribute('aria-expanded', 'false');
    });

    // Its submenus (Offices Under the OP, Publications)
    document.querySelectorAll('.nav-has-sub.open').forEach(function (item) {
      item.classList.remove('open');
      if (item.firstElementChild) item.firstElementChild.setAttribute('aria-expanded', 'false');
    });

    // Drawer dropdowns
    document.querySelectorAll('.drawer-dropdown.open').forEach(function (dd) {
      dd.classList.remove('open');
      var t = dd.querySelector('.drawer-dropdown-toggle');
      if (t) t.setAttribute('aria-expanded', 'false');
    });

    document.querySelectorAll('.has-sub.open').forEach(function (item) {
      item.classList.remove('open');
      var t = item.querySelector('.sub-toggle');
      if (t) t.setAttribute('aria-expanded', 'false');
    });

    // Burger drawer itself
    var navMenu    = document.getElementById('navMenu');
    var navOverlay = document.getElementById('navOverlay');
    var burgerBtn  = document.getElementById('burgerBtn');
    if (navMenu && navMenu.classList.contains('open')) {
      navMenu.classList.remove('open');
      if (navOverlay) navOverlay.classList.remove('visible');
      if (burgerBtn) burgerBtn.setAttribute('aria-expanded', 'false');
    }
  }

  function register(distance, target) {
    if (!isMenuOpen()) { travelled = 0; return; }

    // ignore scrolling that happens inside the menus themselves
    if (target && target.nodeType === 1 && target.closest(MENU_SELECTOR)) return;

    var now = Date.now();
    if (now - lastEvt > 400) travelled = 0;   // a new scroll gesture starts fresh
    lastEvt = now;

    travelled += distance;
    if (travelled > THRESHOLD) {
      travelled = 0;
      closeHeaderMenus();
    }
  }

  // Any scroller: the window, .adm-content, modal bodies, etc.
  document.addEventListener('scroll', function (e) {
    var t   = e.target;
    var top = (t === document || t === document.documentElement || t === document.body)
      ? window.pageYOffset
      : t.scrollTop;

    var prev = lastTop.has(t) ? lastTop.get(t) : top;
    lastTop.set(t, top);

    register(Math.abs(top - prev), t);
  }, { capture: true, passive: true });

  // Wheel/trackpad over the page also counts, even when nothing can scroll
  // (for example at the very end of the content)
  document.addEventListener('wheel', function (e) {
    register(Math.abs(e.deltaY), e.target);
  }, { passive: true });
})();


/* =====================================================================
   ALL ANNOUNCEMENTS MODAL ("View All Announcements")
   Opens from [data-ann-open]; closes with the X, the dark backdrop,
   or the Escape key.
===================================================================== */
(function announcementsModal() {
  var modal   = document.getElementById('announcementsModal');
  var openers = document.querySelectorAll('[data-ann-open]');
  if (!modal || !openers.length) return;

  var body      = modal.querySelector('.ann-modal-body');
  var closeBtn  = modal.querySelector('.ann-modal-close');
  var lastFocus = null;

  function openModal(e) {
    if (e) e.preventDefault();
    lastFocus = document.activeElement;

    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    if (body) body.scrollTop = 0;
    if (closeBtn) closeBtn.focus();
  }

  function closeModal() {
    if (!modal.classList.contains('is-open')) return;

    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    if (lastFocus && lastFocus.focus) lastFocus.focus();
  }

  openers.forEach(function (btn) {
    btn.addEventListener('click', openModal);
  });

  modal.querySelectorAll('[data-ann-close]').forEach(function (el) {
    el.addEventListener('click', closeModal);
  });

  document.addEventListener('keydown', function (e) {
    if (!modal.classList.contains('is-open')) return;

    if (e.key === 'Escape') {
      closeModal();
      return;
    }

    // keep keyboard focus inside the modal
    if (e.key === 'Tab') {
      var focusable = modal.querySelectorAll('a[href], button');
      if (!focusable.length) return;
      var first = focusable[0];
      var last  = focusable[focusable.length - 1];

      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }
  });
})();

/* Pubmat slider: auto-advances every 6s, dots to jump,
   pauses on hover, respects reduced-motion. Does nothing with one slide. */
(function () {
  var track  = document.querySelector('.pubmat-track');
  var slides = document.querySelectorAll('.pubmat-slide');
  var dots   = document.querySelectorAll('.pubmat-dot');
  if (!track || slides.length < 2 || dots.length !== slides.length) return;

  var cur = 0, timer = null;

  function go(n) {
    slides[cur].classList.remove('is-active');
    dots[cur].classList.remove('is-active');
    cur = (n + slides.length) % slides.length;
    slides[cur].classList.add('is-active');
    dots[cur].classList.add('is-active');
  }

  function stop() { clearInterval(timer); }

  function start() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    stop();
    timer = setInterval(function () { go(cur + 1); }, 6000);
  }

  dots.forEach(function (d, i) {
    d.addEventListener('click', function () { go(i); start(); });
  });

  track.addEventListener('mouseenter', stop);
  track.addEventListener('mouseleave', start);

  start();
})();


(function () {
  // [code, name]. The letter prefix decides the category.
  var CATS = {
    A: 'Administration & Support Services',
    B: 'Auxiliary & Production Facilities',
    C: 'Academic Buildings',
    D: 'Research, Extension & Training',
    E: 'Housing Facilities',
    F: 'Sports & Recreational Facilities',
    G: 'Utilities',
    H: 'Other Structures'
  };

  var DATA = [
    ['A1','New Administration Building (under construction)'],
    ['A2','University Library / Admin. Building'],
    ['A3','Security Outpost'],
    ['A4','Security Services Office'],
    ['A5','Alumni Center'],
    ['A6','ROTC Unit HQ'],
    ['A7','Agri-Ecotourism Center / ELIA Office'],
    ['A8','Procurement Office / Records Office'],
    ['A9','Medical & Dental Clinic'],
    ['A10','General Services Office / Supply & Property Mgt. Office'],
    ['A11','Motorpool'],
    ['A12','Farm Machinery Shed'],

    ['B1','University Canteen'],
    ['B2','Agribusiness Center'],
    ['B3','Continuing Education Center (CEC)'],
    ['B4','Bamboo Training Center'],
    ['B5','Agritourism Hostel'],
    ['B6','Function Hall'],
    ['B7','Piggery Houses'],
    ['B8','Feedmill Building'],
    ['B9','Ricemill Building'],
    ['B10','Biomass Flatbed Dryer Shed'],
    ['B11','Palay Shed'],
    ['B12','Goat Shed'],
    ['B13','Native Chicken House'],
    ['B14','Native Pig Pen'],
    ['B15','Material Recovery Facility'],
    ['B16','Organic Composting Shed'],
    ['B17','Vermiculture Shed'],
    ['B18','Free Range Chicken House'],
    ['B19','Poultry Houses'],
    ['B20','Quail Shed'],
    ['B21','Piggery (Brood Sow) House'],
    ['B22','Duck Shed'],
    ['B23','Cattle Shed'],
    ['B24','Palayamanan House'],

    ['C1','College of Business and Management Annex Building'],
    ['C2','CBM Main Building'],
    ['C3','College of Arts and Sciences (CAS) Building'],
    ['C4','College of Veterinary Medicine (CVM) Building'],
    ['C5','CVM Veterinary Hospital'],
    ['C6','College of Agriculture & Forestry (CAF) Main Building'],
    ['C7','CAF Laboratory Rooms'],
    ['C8','CAF Student Center'],
    ['C9','CAF Building Annex (under construction)'],
    ['C10','Old Admin Building (Jose Milla Hall)'],
    ['C11','College of Engineering and Technology (CET) Main Bldg.'],
    ['C12','CET Annex Building 1'],
    ['C13','CET Annex Building 2 (under construction)'],
    ['C14','CET Farmshop'],
    ['C15','CET Information Technology Center'],
    ['C16','CET Student Center'],
    ['C17','Technology and Livelihood Education Building'],
    ['C18','Laboratory School Science and Technology Building'],
    ['C19','College of Education (CEd) Educational Technology Building'],
    ['C20','CEd Main Building (under construction)'],
    ['C21','CEd Home Technology Building'],
    ['C22','Laboratory School Agriculture & Homemaking Bldg.'],
    ['C23','Integrated Science Laboratory Building'],

    ['D1','Research & Development Complex'],
    ['D2','Food Processing (DTI-Shared Service Facility)'],
    ['D3','Rootcrops Research and Training Center'],
    ['D4','Tissue Culture and Disease Indexing Laboratory'],
    ['D5','Farmers Training Center'],
    ['D6','Green Houses and Net Houses'],
    ['D7','Mushroom Laboratory'],
    ['D8','PAGASA Agromet Building'],
    ['D9','Bamboo Nursery'],
    ['D10','Clonal Nursery'],

    ['E1','Staff Houses'],
    ['E2','Guest House'],
    ['E3','Ladies\' Dormitory'],
    ['E4','Men\'s Dormitory'],
    ['E5','Executive House'],
    ['E6','6-Door Apartment'],

    ['F1','G.O. Teodoro Multipurpose Center'],
    ['F2','Athletic Oval'],
    ['F3','Tennis Court'],
    ['F4','Sports and Sociocultural Development Office'],
    ['F5','Covered Court'],
    ['F6','Sepak Takraw Court'],
    ['F7','Volleyball Court'],
    ['F8','Basketball Court'],
    ['F9','Saturnino Tolentino Grandstand'],
    ['F10','Beach Volleyball Court'],
    ['F11','Swimming Pool'],

    ['G1','Power Supply Generator'],
    ['G2','Elevated Water Tank'],
    ['G3','Dugwell with Submersible Pump'],
    ['G4','Dugwell with Solar-Powered Pump'],
    ['G5','Windmill'],

    ['H1','TAU-CCU Office (under MOA)'],
    ['H2','Gas Station (under lease contract)'],
    ['H3','DENR CENRO Camiling (under MOA)']
  ];

  // Extra words people might type, so "similar" searches still land
  var SYNONYMS = {
    A2:  'library books admin administration',
    A1:  'admin administration president office registrar',
    A9:  'clinic nurse doctor dentist health hospital',
    A3:  'guard gate entrance security',
    A4:  'guard security',
    B1:  'cafeteria food eat canteen',
    B6:  'hall events gymnasium',
    C5:  'animal vet hospital clinic',
    C4:  'vet veterinary cvm',
    C11: 'engineering cet',
    C15: 'computer lab it ict',
    C3:  'cas arts sciences',
    C2:  'cbm business management',
    C6:  'caf agriculture forestry',
    C19: 'education ced',
    C20: 'education ced',
    C21: 'education ced',
    D3:  'rootcrop root crop',
    E3:  'dorm dormitory girls female',
    E4:  'dorm dormitory boys male',
    F1:  'gym gymnasium',
    F2:  'track oval running field',
    F5:  'gym court',
    F9:  'bleachers',
    F11: 'pool swim',
    G2:  'water tower',
    H2:  'gasoline fuel'
  };

  // Codes that have a photo in assets/Images/buildings/ (e.g. C11.jpg)
  var PHOTOS = { /* C11: 1, A2: 1 */ };

  // Building positions on map.jpg as [x%, y%] from the top-left corner.
  var HOTSPOTS = {
    A1: [23.5, 64.0],  A2: [25.7, 66.6],  A3: [24.1, 70.0],  A4: [19.1, 70.8],
    A5: [5.9, 74.6],   A6: [11.1, 91.6],  A7: [23.3, 54.8],  A8: [41.9, 47.8],
    A9: [37.1, 42.3],  A10: [47.9, 24.6], A11: [55.1, 25.7], A12: [55.5, 27.9],

    B1: [18.4, 82.7],  B2: [18.3, 62.3],  B3: [15.8, 44.3],  B4: [18.9, 40.6],
    B5: [21.2, 38.7],  B6: [18.5, 36.2],  B7: [20.3, 23.5],  B8: [24.0, 9.7],
    B9: [22.1, 7.0],   B10: [20.4, 8.5],  B11: [21.0, 10.8], B12: [19.9, 6.7],
    B13: [37.9, 14.0], B14: [41.8, 14.2], B15: [45.8, 15.1], B16: [45.5, 16.9],
    B17: [45.2, 18.9], B18: [49.2, 18.3], B19: [54.1, 19.4], B20: [51.7, 22.0],
    B21: [58.2, 15.3], B22: [64.3, 16.3], B23: [67.5, 16.8], B24: [72.5, 46.2],

    C1: [21.6, 87.1],  C2: [21.2, 81.3],  C3: [15.6, 73.7],  C4: [28.9, 77.0],
    C5: [28.0, 72.7],  C6: [33.3, 66.6],  C7: [34.4, 67.9],  C8: [35.4, 69.1],
    C9: [36.7, 64.1],  C10: [44.3, 38.3], C11: [51.8, 38.1], C12: [51.7, 32.6],
    C13: [49.6, 34.7], C14: [54.1, 29.8], C15: [49.8, 29.5], C16: [56.7, 36.3],
    C17: [55.8, 33.8], C18: [60.8, 30.1], C19: [61.8, 26.9], C20: [60.5, 23.9],
    C21: [64.5, 23.1], C22: [65.5, 26.6], C23: [66.8, 31.7],

    D1: [39.0, 51.4],  D2: [39.4, 47.6],  D3: [36.2, 47.3],  D4: [37.2, 45.3],
    D5: [39.8, 61.3],  D6: [43.7, 23.2],  D7: [35.1, 72.0],  D8: [27.9, 53.3],
    D9: [70.4, 29.3],  D10: [81.2, 39.6],

    E1: [50.6, 46.1],  E2: [74.5, 36.3],  E3: [77.4, 41.2],  E4: [77.4, 46.5],
    E5: [84.2, 50.5],  E6: [87.9, 54.2],

    F1: [17.9, 77.8],  F2: [13.3, 82.9],  F3: [17.9, 90.8],  F4: [19.1, 92.7],
    F5: [16.0, 93.6],  F6: [8.0, 84.3],   F7: [9.3, 86.1],   F8: [11.1, 88.3],
    F9: [10.2, 89.6],  F10: [4.3, 78.9],  F11: [6.9, 76.1],

    G1: [46.2, 36.0],  G2: [15.5, 98.1],  G3: [40.8, 16.3],  G4: [24.3, 24.3],
    G5: [39.0, 19.6],

    H1: [21.6, 62.2],  H2: [14.7, 59.1],  H3: [14.2, 54.5]
  };

  function init() {
    var input    = document.getElementById('cmapInput');
    var results  = document.getElementById('cmapResults');
    var clearBtn = document.getElementById('cmapClear');
    var goBtn    = document.getElementById('cmapGo');
    var stage    = document.getElementById('cmapStage');
    var scroller = document.getElementById('cmapScroll');
    var note     = document.getElementById('cmapNote');
    if (!input || !results) return;

    var photoBase = results.getAttribute('data-photo-base') || '';
    var pin = null, activeLi = null, current = null;
    var calibrating = location.search.indexOf('calibrate') > -1;
    var picked = {};

    var items = DATA.map(function (d) {
      var letter = d[0].charAt(0);
      var hay = (d[0] + ' ' + d[1] + ' ' + CATS[letter] + ' ' + (SYNONYMS[d[0]] || '')).toLowerCase();
      return { code: d[0], name: d[1], letter: letter, cat: CATS[letter], hay: hay, nameLc: d[1].toLowerCase() };
    });

    function norm(s) {
      return s.toLowerCase().replace(/[^a-z0-9\s]/g, ' ').replace(/\s+/g, ' ').trim();
    }

    function score(item, tokens) {
      var s = 0, matched = 0;
      tokens.forEach(function (t) {
        if (item.code.toLowerCase() === t) { s += 100; matched++; return; }
        if (item.nameLc.indexOf(t) === 0) { s += 20; matched++; return; }
        if (item.nameLc.indexOf(t) > -1) { s += 10; matched++; return; }
        if (item.hay.indexOf(t) > -1) { s += 4; matched++; return; }
      });
      if (matched === 0) return 0;
      if (matched === tokens.length) s += 50; // every word matched
      return s;
    }

    /* ---------- Map pin ---------- */

    function showNote(msg) {
      if (!note) return;
      note.textContent = msg || '';
      note.hidden = !msg;
    }

    function clearPin() {
      if (pin) { pin.remove(); pin = null; }
      if (activeLi) { activeLi.classList.remove('is-active'); activeLi = null; }
      current = null;
      showNote('');
    }

    function scrollToMap() {
      var box = scroller || stage;
      if (box) box.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function placePin(it, pos) {
      if (!stage) return;
      if (pin) pin.remove();
      pin = document.createElement('span');
      pin.className = 'cmap-pin cat-' + it.letter;
      pin.style.left = pos[0] + '%';
      pin.style.top = pos[1] + '%';
      pin.innerHTML =
        '<svg class="cmap-pin-icon" viewBox="0 0 24 32" aria-hidden="true">' +
        '<path d="M12 0C5.4 0 0 5.2 0 11.7 0 19.7 12 32 12 32s12-12.3 12-20.3C24 5.2 18.6 0 12 0z" fill="currentColor"/>' +
        '<path d="M12 32s12-12.3 12-20.3c0-1.2-.1-2.3-.4-3.4C20.8 20.5 12 32 12 32z" fill="#000" opacity=".18"/>' +
        '<path d="M3.6 10.5C3.9 6.6 7.2 3.4 11 2.9" fill="none" stroke="#fff" stroke-width="1.6" stroke-linecap="round" opacity=".45"/>' +
        '<circle cx="12" cy="11.5" r="4.8" fill="#fff"/></svg>';
      var label = document.createElement('span');
      label.className = 'cmap-pin-label';
      label.textContent = it.code;
      pin.appendChild(label);
      stage.appendChild(pin);
      scrollToMap();
    }

    function selectItem(it, li) {
      if (activeLi) activeLi.classList.remove('is-active');
      activeLi = li;
      li.classList.add('is-active');
      current = it;

      if (calibrating) {
        showNote('Calibrate mode: click ' + it.code + ' on the map.');
        scrollToMap();
        return;
      }

      var pos = HOTSPOTS[it.code];
      if (!pos) {
        if (pin) { pin.remove(); pin = null; }
        showNote(it.code + ' is not marked on the map yet.');
        scrollToMap();
        return;
      }
      showNote('');
      placePin(it, pos);
    }

    if (calibrating && stage) {
      stage.addEventListener('click', function (e) {
        if (!current) return;
        var r = stage.getBoundingClientRect();
        var pos = [
          Math.round((e.clientX - r.left) / r.width * 1000) / 10,
          Math.round((e.clientY - r.top) / r.height * 1000) / 10
        ];
        picked[current.code] = pos;
        placePin(current, pos);
        showNote(current.code + ': [' + pos[0] + ', ' + pos[1] + '] saved. All picks are in the console.');
        console.log(Object.keys(picked).map(function (k) {
          return '    ' + k + ': [' + picked[k][0] + ', ' + picked[k][1] + '],';
        }).join('\n'));
      });
    }

    /* ---------- Results ---------- */

    function render(list, q) {
      clearPin();
      results.innerHTML = '';
      if (!q) return;

      if (!list.length) {
        var li = document.createElement('li');
        li.className = 'cmap-empty';
        li.textContent = 'No facility found for "' + q + '". Try a shorter or different word.';
        results.appendChild(li);
        return;
      }

      list.slice(0, 12).forEach(function (it) {
        var li = document.createElement('li');
        li.className = 'cmap-item cat-' + it.letter;
        li.tabIndex = 0;
        li.setAttribute('role', 'button');
        li.setAttribute('aria-label', 'Show ' + it.name + ' on the map');
        li.addEventListener('click', function () { selectItem(it, li); });
        li.addEventListener('keydown', function (e) {
          if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); selectItem(it, li); }
        });

        var photo = document.createElement('div');
        photo.className = 'cmap-photo';
        if (PHOTOS[it.code]) {
          var img = document.createElement('img');
          img.src = photoBase + it.code + '.jpg';
          img.alt = it.name;
          img.loading = 'lazy';
          photo.appendChild(img);
        } else {
          photo.classList.add('no-photo');
        }

        var code = document.createElement('span');
        code.className = 'cmap-code';
        code.textContent = it.code;
        photo.appendChild(code);

        var txt = document.createElement('span');
        txt.className = 'cmap-text';
        var n = document.createElement('strong');
        n.textContent = it.name;
        var c = document.createElement('small');
        c.textContent = 'Group ' + it.letter + ' · ' + it.cat;
        txt.appendChild(n);
        txt.appendChild(c);

        li.appendChild(photo);
        li.appendChild(txt);
        results.appendChild(li);
      });
    }

    function search() {
      // The clear button only shows while there is text
      if (clearBtn) clearBtn.hidden = !input.value;

      var q = norm(input.value);
      if (!q) { render([], ''); return; }
      var tokens = q.split(' ');
      var list = items
        .map(function (it) { return { it: it, s: score(it, tokens) }; })
        .filter(function (r) { return r.s > 0; })
        .sort(function (a, b) { return b.s - a.s; })
        .map(function (r) { return r.it; });
      render(list, input.value.trim());
    }

    function clearSearch() {
      input.value = '';
      search();
      input.focus();
    }

    input.addEventListener('input', search);
    input.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') clearSearch();
    });

    if (clearBtn) clearBtn.addEventListener('click', clearSearch);

    if (goBtn) {
      goBtn.addEventListener('click', function () {
        if (!norm(input.value)) { input.focus(); return; }
        search();
        results.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      });
    }
  }

  // Run after the HTML exists, even if the script is loaded in <head>
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();