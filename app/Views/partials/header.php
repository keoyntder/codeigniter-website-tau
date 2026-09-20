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
      <a href="<?= base_url('') ?>" data-en="Home" data-tl="Tahanan">Home</a>
      <a href="<?= base_url('admissions') ?>" data-en="Admissions" data-tl="Pagpasok">Admissions</a>
      <a href="<?= base_url('academic-affairs') ?>" data-en="Academic Affairs" data-tl="Pang-akademikong Sangay">Academic Affairs</a>
      <a href="<?= base_url('research') ?>" data-en="Research and Development" data-tl="Pananaliksik at Pagpapaunlad">Research and Development</a>
      <a href="<?= base_url('offices') ?>" data-en="Offices" data-tl="Mga Tanggapan">Offices</a>
      <a href="<?= base_url('careers') ?>" data-en="Careers" data-tl="Karera">Careers</a>
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
    <li><a href="<?= base_url('admissions') ?>">Admissions</a></li>
    <li><a href="<?= base_url('academic-affairs') ?>">Academic Affairs</a></li>
    <li><a href="<?= base_url('research') ?>">Research and Development</a></li>
    <li><a href="<?= base_url('offices') ?>">Offices</a></li>
    <li><a href="<?= base_url('careers') ?>">Careers</a></li>
    <li><a href="<?= base_url('#announcements') ?>">Announcements</a></li>
    <li><a href="<?= base_url('#contact') ?>">Contact</a></li>
  </ul>
</nav>
<div class="nav-overlay" id="navOverlay"></div>