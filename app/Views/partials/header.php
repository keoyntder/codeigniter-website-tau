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
      <a href="<?= base_url('about') ?>" data-en="TAU" data-tl="TAU" class="about-modal-trigger">TAU</a>

      <!-- Office of the President dropdown -->
      <div class="nav-dropdown nav-dropdown-op">
        <button type="button" class="nav-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
          <span data-en="Office of the president" data-tl="Tanggapan ng Pangulo">Office of the president</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <ul class="nav-dropdown-menu">
          <li><a href="<?= base_url('office-of-the-president') ?>">The President's Profile</a></li>
          <li><a href="<?= base_url('office-of-the-president/report') ?>">The President's Report</a></li>

          <!-- Offices Under the OP: flyout submenu (3 offices only, old design) -->
          <li class="nav-has-sub">
            <a href="<?= base_url('office-of-the-president/offices') ?>">
              Offices Under the OP
              <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 6 15 12 9 18"></polyline></svg>
            </a>
            <ul class="nav-submenu">
              <li><a href="<?= base_url('office-of-the-president/offices/planning-and-development') ?>">Planning and Development</a></li>
              <li><a href="<?= base_url('office-of-the-president/offices/external-linkage') ?>">Office of External Linkage and International Affairs</a></li>
              <li><a href="<?= base_url('office-of-the-president/offices/alumni-relations') ?>">Office of Alumni Relations</a></li>
            </ul>
          </li>

          <li class="nav-has-sub">
            <a href="<?= base_url('office-of-the-president/publications') ?>">
              Publications
              <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 6 15 12 9 18"></polyline></svg>
            </a>
            <ul class="nav-submenu">
              <li><a href="<?= base_url('office-of-the-president/publications/tau-code') ?>">TAU Code</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/strategic-plans') ?>">Strategic Plans</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/master-development-plan') ?>">Master Development Plan</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/annual-reports') ?>">Annual Reports</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/tau-development-updates') ?>">TAU Development Updates</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/resource-mobilization-plan') ?>">Resource Mobilization Plan</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/tau-radicle') ?>">TAU Radicle</a></li>
              <li><a href="<?= base_url('office-of-the-president/publications/2025-2035') ?>">2025-2035</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <a href="<?= base_url('admissions') ?>" data-en="Admissions" data-tl="Pagpasok" class="admissions-modal-trigger">Admissions</a>
      <a href="<?= base_url('offices') ?>" data-en="Offices" data-tl="Mga Tanggapan">Offices</a>

      <!-- Online Services dropdown -->
      <div class="nav-dropdown">
        <button type="button" class="nav-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
          <span data-en="Online Services" data-tl="Mga Online na Serbisyo">Online Services</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <ul class="nav-dropdown-menu">
          <li><a href="http://tau.edu.ph:8082/employeeportal/" target="_blank" rel="noopener">Employee Portal</a></li>
          <li><a href="http://tau.edu.ph:8090/StudentPortalv2/" target="_blank" rel="noopener">Student Portal</a></li>
          <li><a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" target="_blank" rel="noopener">Online Admission</a></li>
          <li><a href="http://tau.edu.ph:8000/login" target="_blank" rel="noopener">Learning Management System</a></li>
          <li><a href="http://tau.edu.ph:8084/TPESV2/#" target="_blank" rel="noopener">Teaching Performance Evaluation System</a></li>
          <li><a href="http://tau.edu.ph:8085/pjast/index.php/pjast" target="_blank" rel="noopener">PJAST</a></li>
          <li><a href="http://tau.edu.ph:8081/DocTrax/" target="_blank" rel="noopener">DocTrax</a></li>
        </ul>
      </div>

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
    <li><a href="<?= base_url('about') ?>" class="about-modal-trigger">TAU</a></li>

    <li class="drawer-dropdown">
      <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
        Office of the president <span class="drawer-chevron">▾</span>
      </button>
      <ul class="drawer-submenu">
        <li><a href="<?= base_url('office-of-the-president') ?>">The President's Profile</a></li>
        <li><a href="<?= base_url('office-of-the-president/report') ?>">The President's Report</a></li>

        <!-- Offices Under the OP: nested submenu (3 offices only) -->
        <li class="drawer-dropdown">
          <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
            Offices Under the OP <span class="drawer-chevron">▾</span>
          </button>
          <ul class="drawer-submenu">
            <li><a href="<?= base_url('office-of-the-president/offices/planning-and-development') ?>">Planning and Development</a></li>
            <li><a href="<?= base_url('office-of-the-president/offices/external-linkage') ?>">Office of External Linkage and International Affairs</a></li>
            <li><a href="<?= base_url('office-of-the-president/offices/alumni-relations') ?>">Office of Alumni Relations</a></li>
          </ul>
        </li>

        <li class="drawer-dropdown">
          <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
            Publications <span class="drawer-chevron">▾</span>
          </button>
          <ul class="drawer-submenu">
            <li><a href="<?= base_url('office-of-the-president/publications/tau-code') ?>">TAU Code</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/strategic-plans') ?>">Strategic Plans</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/master-development-plan') ?>">Master Development Plan</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/annual-reports') ?>">Annual Reports</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/tau-development-updates') ?>">TAU Development Updates</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/resource-mobilization-plan') ?>">Resource Mobilization Plan</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/tau-radicle') ?>">TAU Radicle</a></li>
            <li><a href="<?= base_url('office-of-the-president/publications/2025-2035') ?>">2025-2035</a></li>
          </ul>
        </li>
      </ul>
    </li>

    <li><a href="<?= base_url('admissions') ?>" class="admissions-modal-trigger">Admissions</a></li>
    <li><a href="<?= base_url('offices') ?>">Offices</a></li>
    <li><a href="<?= base_url('careers') ?>" class="careers-modal-trigger">Careers</a></li>
    <li class="drawer-dropdown">
      <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
        Online Services <span class="drawer-chevron">▾</span>
      </button>
      <ul class="drawer-submenu">
        <li><a href="http://tau.edu.ph:8082/employeeportal/" target="_blank" rel="noopener">Employee Portal</a></li>
        <li><a href="http://tau.edu.ph:8090/StudentPortalv2/" target="_blank" rel="noopener">Student Portal</a></li>
        <li><a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" target="_blank" rel="noopener">Online Admission</a></li>
        <li><a href="http://tau.edu.ph:8000/login" target="_blank" rel="noopener">Learning Management System</a></li>
        <li><a href="http://tau.edu.ph:8084/TPESV2/#" target="_blank" rel="noopener">Teaching Performance Evaluation System</a></li>
        <li><a href="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl?fbclid=IwAR3fv-Oplc0-EItDS5OB6TNaivWiCodBuPU25Czs4ljWwBRYtHPA_4QBOAI" target="_blank" rel="noopener">University Library</a></li>
        <li><a href="http://tau.edu.ph:8085/pjast/index.php/pjast" target="_blank" rel="noopener">PJAST</a></li>
        <li><a href="http://tau.edu.ph:8081/DocTrax/" target="_blank" rel="noopener">DocTrax</a></li>
      </ul>
    </li>
  </ul>
</nav>
<div class="nav-overlay" id="navOverlay"></div>