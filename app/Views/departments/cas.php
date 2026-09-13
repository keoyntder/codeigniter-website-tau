<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CAS - Tarlac Agricultural University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/department.css') ?>">
</head>
<body>

<!-- ===================== LOADING THROBBER ===================== -->
<div class="loader-overlay" id="loaderOverlay">
  <div class="loader-ring">
    <div class="orbit-wrap">
      <img src="<?= base_url('assets/Images/orbit-icon.png') ?>" class="orbit-image" alt="">
    </div>
    <img src="<?= base_url('assets/Images/taulogo.png') ?>" alt="Loading" class="loader-logo">
  </div>
</div>

<!-- ===================== HEADER ===================== -->
<header class="site-header" id="siteHeader">
  <div class="header-inner">

    <div class="brand-group">
      <a href="<?= base_url() ?>">
        <img src="<?= base_url('assets/Images/taulogo.png') ?>" alt="TAU Logo" class="logo-placeholder">
      </a>

      <div class="brand-text">
        <span class="brand-name">Tarlac Agricultural University</span>
        <div class="badges">
          <a href="<?= base_url('departments/cet') ?>" class="badge-link" aria-label="College of Engineering and Technology">
            <img src="<?= base_url('assets/Images/cetlogo.png') ?>" alt="" class="badge-placeholder">
          </a>
          <a href="<?= base_url('departments/cas') ?>" class="badge-link" aria-label="College of Arts and Sciences">
            <img src="<?= base_url('assets/Images/cas2.png') ?>" alt="" class="badge-placeholder">
          </a>
          <a href="<?= base_url('departments/caf') ?>" class="badge-link" aria-label="College of Agriculture and Forestry">
            <img src="<?= base_url('assets/Images/caf.png') ?>" alt="" class="badge-placeholder">
          </a>
          <a href="<?= base_url('departments/cbm') ?>" class="badge-link" aria-label="College of Business Management">
            <img src="<?= base_url('assets/Images/cbm2.png') ?>" alt="" class="badge-placeholder">
          </a>
          <a href="<?= base_url('departments/cvm') ?>" class="badge-link" aria-label="College of Veterinary Medicine">
            <img src="<?= base_url('assets/Images/cvm.png') ?>" alt="" class="badge-placeholder">
          </a>
          <a href="<?= base_url('departments/coed') ?>" class="badge-link" aria-label="College of Education">
            <img src="<?= base_url('assets/Images/coed.png') ?>" alt="" class="badge-placeholder">
          </a>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- ===================== NAV DRAWER ===================== -->
<nav class="nav-drawer" id="navMenu">
  <ul>
    <li><a href="<?= base_url() ?>#home">Home</a></li>
    <li><a href="<?= base_url() ?>#about">About</a></li>
    <li><a href="<?= base_url() ?>#academics">Academics</a></li>
    <li><a href="<?= base_url() ?>#admissions">Admissions</a></li>
    <li><a href="<?= base_url() ?>#announcements">Announcements</a></li>
    <li><a href="<?= base_url() ?>#contact">Contact</a></li>
  </ul>
</nav>
<div class="nav-overlay" id="navOverlay"></div>

<!-- ===================== DEPARTMENT HERO ===================== -->
<section class="dept-hero">
  <div class="dept-hero-inner">
    <img src="<?= base_url('assets/Images/cas2.png') ?>" alt="College of Arts and Sciences logo" class="dept-hero-logo">
    <div class="dept-hero-text">
      <span class="dept-hero-abbr">CAS</span>
      <h1 class="dept-hero-title">College of Arts and Sciences</h1>
    </div>
  </div>
</section>

<!-- ===================== DEPARTMENT CONTENT ===================== -->
<main class="dept-main">
  <section class="dept-section" id="dept-about">
    <h2>About CAS</h2>
    <p>The College of Arts and Sciences (CAS) offers a strong foundation in the humanities, natural sciences, and social sciences, shaping well-rounded graduates equipped for further study and community service.</p>
  </section>

  <section class="dept-section" id="dept-programs">
    <h2>Programs Offered</h2>
    <p class="dept-placeholder-note">Placeholder — list the degree programs offered by CAS here.</p>
  </section>

  <section class="dept-section" id="dept-faculty">
    <h2>Faculty &amp; Staff</h2>
    <p class="dept-placeholder-note">Placeholder — add faculty profiles or a directory link here.</p>
  </section>

  <section class="dept-section" id="dept-announcements">
    <h2>Announcements</h2>
    <p class="dept-placeholder-note">Placeholder — department-specific news and announcements go here.</p>
  </section>

</main>

<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
  <div class="footer-inner">

    <div class="footer-brand-col">
      <div class="footer-brand-row">
        <div class="footer-logo-placeholder" aria-label="TAU Logo placeholder"></div>
        <div class="footer-brand-text">
          <h3 class="footer-univ-name">Tarlac Agricultural University</h3>
          <p class="footer-univ-loc">Malacama, Camiling</p>
        </div>
      </div>
      <p class="footer-contact">
        +63 (045) 123 4567 &nbsp;|&nbsp; +63 912 345 6789
      </p>
      <div class="footer-social">
        <span class="social-placeholder" title="Facebook"></span>
        <span class="social-placeholder" title="Instagram"></span>
        <span class="social-placeholder" title="LinkedIn"></span>
        <span class="social-placeholder" title="YouTube"></span>
      </div>
    </div>

    <div class="footer-nav-grid">
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Colleges</h4>
        <ul>
          <li><a href="<?= base_url('departments/cet') ?>">CET</a></li>
          <li><a href="<?= base_url('departments/cas') ?>">CAS</a></li>
          <li><a href="<?= base_url('departments/caf') ?>">CAF</a></li>
          <li><a href="<?= base_url('departments/cbm') ?>">CBM</a></li>
          <li><a href="<?= base_url('departments/cvm') ?>">CVM</a></li>
          <li><a href="<?= base_url('departments/coed') ?>">COED</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Contact Us</h4>
        <ul>
          <li><a href="<?= base_url() ?>#contact">Admissions</a></li>
          <li><a href="<?= base_url() ?>#contact">Registrar</a></li>
          <li><a href="<?= base_url() ?>#contact">Help Desk</a></li>
          <li><a href="<?= base_url() ?>#contact">Support</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">About TAU</h4>
        <ul>
          <li><a href="<?= base_url() ?>#about">History</a></li>
          <li><a href="<?= base_url() ?>#about">Administration</a></li>
          <li><a href="<?= base_url() ?>#about">Board of Regents</a></li>
          <li><a href="<?= base_url() ?>#about">Quality Policy</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Offices</h4>
        <ul>
          <li><a href="<?= base_url() ?>#about">HR</a></li>
          <li><a href="<?= base_url() ?>#about">Finance</a></li>
          <li><a href="<?= base_url() ?>#about">Research</a></li>
          <li><a href="<?= base_url() ?>#about">Extension</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Mission</h4>
        <ul>
          <li><a href="<?= base_url() ?>#about">Core Values</a></li>
          <li><a href="<?= base_url() ?>#about">Goals</a></li>
          <li><a href="<?= base_url() ?>#about">Strategic Plan</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Vision</h4>
        <ul>
          <li><a href="<?= base_url() ?>#about">2028 Vision</a></li>
          <li><a href="<?= base_url() ?>#about">Development</a></li>
          <li><a href="<?= base_url() ?>#about">Sustainability</a></li>
        </ul>
      </div>
    </div>

  </div>
</footer>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>