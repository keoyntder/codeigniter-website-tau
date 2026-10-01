<link rel="stylesheet" href="<?= base_url('assets/css/about.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admissions.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/careers.css') ?>">

<!-- TAU logo watermark for the About modal (file name must match assets/Images exactly) -->
<style>
  :root { --about-watermark: url('<?= base_url('assets/Images/taulogo.png') ?>'); }
</style>


<!-- ===================== HEADER ===================== -->
<header class="header site-header" id="siteHeader">
  <div class="header-inner">

    <div class="brand-group">
      <img src="<?= base_url('assets/Images/taulogo.png') ?>" alt="TAU Logo" class="logo-placeholder">
      <div class="brand-text">
        <span class="brand-name">Tarlac Agricultural University</span>
        <span class="brand-subtitle">Malacama, Camiling</span>
      </div>
    </div>

    <nav class="header-nav-main">
      <a href="<?= base_url('') ?>" data-en="Home" data-tl="Tahanan">explore</a>
      <a href="<?= base_url('about') ?>" data-en="Universitas Agriculturae" data-tl="Universitas Agriculturae" class="about-modal-trigger">About TAU</a>
      <a href="<?= base_url('admissions') ?>" data-en="Admissions" data-tl="Pagpasok" class="admissions-modal-trigger">Admissions</a>
      <a href="<?= base_url('offices') ?>" data-en="Offices" data-tl="Mga Tanggapan">Offices</a>
      <a href="<?= base_url('careers') ?>" data-en="Careers" data-tl="Karera" class="careers-modal-trigger">Careers</a>
    </nav>

    <div class="header-icons">
      <div class="lang-toggle" role="group" aria-label="Language selection">
        <button type="button" class="lang-btn active" id="langEN" data-lang="en">EN</button>
        <span class="lang-divider" aria-hidden="true">|</span>
        <button type="button" class="lang-btn" id="langTL" data-lang="tl">TL</button>
      </div>

      <div class="search-inline" id="searchInline">
        <button class="icon-btn search-icon-btn" aria-label="Search" id="searchBtn">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
        <input type="text" class="search-inline-input" id="searchInput" placeholder="Search" aria-label="Search">
        <button type="button" class="search-inline-close" id="searchCloseBtn" aria-label="Close search">&times;</button>
      </div>

      <button class="burger" id="burgerBtn" aria-label="Open menu" aria-expanded="false" aria-controls="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

  </div>
</header>

<!-- ===================== NAV DRAWER ===================== -->
<nav class="nav-drawer" id="navMenu">
  <ul>
    <li><a href="<?= base_url('') ?>">Home</a></li>
    <li><a href="<?= base_url('about') ?>" class="about-modal-trigger">about tau</a></li>
    <li><a href="<?= base_url('admissions') ?>" class="admissions-modal-trigger">Admissions</a></li>
    <li><a href="<?= base_url('offices') ?>">Offices</a></li>
    <li><a href="<?= base_url('careers') ?>" class="careers-modal-trigger">Careers</a></li>
    <li><a href="<?= base_url('#announcements') ?>">Announcements</a></li>
    <li><a href="<?= base_url('#contact') ?>">Contact</a></li>
  </ul>
</nav>
<div class="nav-overlay" id="navOverlay"></div>

<!-- ===================== UNIVERSITAS AGRICULTURAE MODAL ===================== -->
<div class="about-modal-overlay" id="aboutModalOverlay" data-about-url="<?= base_url('about') ?>">
  <div class="about-modal-box" role="dialog" aria-modal="true">
    <div class="about-modal-head">
      <div class="about-modal-head-actions">
        <button type="button" class="about-modal-close" id="aboutModalClose" aria-label="Close">&times;</button>
      </div>
    </div>
    <div class="about-modal-body" id="aboutModalBody">
      <p class="about-modal-status">Loading&hellip;</p>
    </div>
  </div>
</div>

<!-- ===================== ADMISSIONS MODAL ===================== -->
<div class="about-modal-overlay" id="admissionsModalOverlay" data-about-url="<?= base_url('admissions') ?>">
  <div class="about-modal-box" role="dialog" aria-modal="true">
    <div class="about-modal-head">
      <div class="about-modal-head-actions">
        <button type="button" class="about-modal-close" id="admissionsModalClose" aria-label="Close">&times;</button>
      </div>
    </div>
    <div class="about-modal-body" id="admissionsModalBody">
      <p class="about-modal-status">Loading&hellip;</p>
    </div>
  </div>
</div>

<!-- ===================== CAREERS MODAL ===================== -->
<div class="about-modal-overlay" id="careersModalOverlay" data-about-url="<?= base_url('careers') ?>">
  <div class="about-modal-box" role="dialog" aria-modal="true">
    <div class="about-modal-head">
      <div class="about-modal-head-actions">
        <button type="button" class="about-modal-close" id="careersModalClose" aria-label="Close">&times;</button>
      </div>
    </div>
    <div class="about-modal-body" id="careersModalBody">
      <p class="about-modal-status">Loading&hellip;</p>
    </div>
  </div>
</div>