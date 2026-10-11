<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tarlac Agricultural University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>?v=<?= filemtime(FCPATH . 'assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/loader.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">


</head>
<body>

<?= $this->include('partials/loader') ?>

<!-- ===================== HEADER (inlined for index only) ===================== -->
<header class="header site-header" id="siteHeader">
  <div class="header-inner">

    <div class="brand-group">
      <img src="<?= base_url('assets/Images/taulogo.png') ?>" alt="TAU Logo" class="logo-placeholder">
      <div class="brand-text">
        <span class="brand-name">Tarlac Agricultural University</span>
        <span class="brand-subtitle">Malacampa, Camiling</span>
      </div>
    </div>

    <nav class="header-nav-main">
      <a href="<?= base_url('') ?>" class="is-current" aria-current="page" data-en="Home" data-tl="Tahanan">Home</a>
      <a href="<?= base_url('about') ?>" data-en="TAU" data-tl="TAU">TAU</a>

      <!-- Office of the President dropdown -->
      <div class="nav-dropdown nav-dropdown-op">
        <button type="button" class="nav-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
          <span data-en="Office of the president" data-tl="Tanggapan ng Pangulo">Office of the president</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <ul class="nav-dropdown-menu">
          <li><a href="<?= base_url('office-of-the-president') ?>">The President's Profile</a></li>
          <li><a href="<?= base_url('office-of-the-president/report') ?>">The President's Report</a></li>
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

      <!-- Academics dropdown -->
      <div class="nav-dropdown">
        <button type="button" class="nav-dropdown-toggle" aria-haspopup="true" aria-expanded="false">
          <span data-en="Academics" data-tl="Akademiko">Academics</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <ul class="nav-dropdown-menu">
          <li><a href="<?= base_url('academics/colleges') ?>" data-en="Colleges" data-tl="Mga Kolehiyo">Colleges</a></li>
          <li><a href="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl" target="_blank" rel="noopener" data-en="University Library" data-tl="Aklatan ng Unibersidad">University Library</a></li>
        </ul>
      </div>

      <a href="<?= base_url('admissions') ?>" data-en="Admissions" data-tl="Pagpasok">Admissions</a>
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
          <li><a href="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl?fbclid=IwAR3fv-Oplc0-EItDS5OB6TNaivWiCodBuPU25Czs4ljWwBRYtHPA_4QBOAI" target="_blank" rel="noopener">University Library</a></li>
          <li><a href="http://tau.edu.ph:8085/pjast/index.php/pjast" target="_blank" rel="noopener">PJAST</a></li>
          <li><a href="http://tau.edu.ph:8081/DocTrax/" target="_blank" rel="noopener">DocTrax</a></li>
        </ul>
      </div>

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
    <li><a href="<?= base_url('about') ?>">TAU</a></li>

    <li class="drawer-dropdown">
      <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
        Office of the president <span class="drawer-chevron">▾</span>
      </button>
      <ul class="drawer-submenu">
        <li><a href="<?= base_url('office-of-the-president') ?>">The President's Profile</a></li>
        <li><a href="<?= base_url('office-of-the-president/report') ?>">The President's Report</a></li>
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

    <li class="drawer-dropdown">
      <button type="button" class="drawer-dropdown-toggle" aria-expanded="false">
        Academics <span class="drawer-chevron">▾</span>
      </button>
      <ul class="drawer-submenu">
        <li><a href="<?= base_url('academics/colleges') ?>">Colleges</a></li>
        <li><a href="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl" target="_blank" rel="noopener">University Library</a></li>
      </ul>
    </li>

    <li><a href="<?= base_url('admissions') ?>">Admissions</a></li>
    <li><a href="<?= base_url('offices') ?>">Offices</a></li>
    <li><a href="<?= base_url('careers') ?>">Careers</a></li>
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
        <li><a href="http://tau.edu.ph:8085/pjast/index.php/pjast" target="_blank" rel="noopener">PJAST</a></li>
        <li><a href="http://tau.edu.ph:8081/DocTrax/" target="_blank" rel="noopener">DocTrax</a></li>
      </ul>
    </li>
  </ul>
</nav>
<div class="nav-overlay" id="navOverlay"></div>

<!-- ===================== HERO ===================== -->
<section class="hero" id="home">

    <video
        class="hero-video"
        autoplay
        muted
        loop
        playsinline
        poster="<?= base_url('assets/Images/hero-bg.jpg') ?>"
    >
        <source src="<?= base_url('assets/Images/hero.mp4') ?>" type="video/mp4">
    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <?php if (!empty($heroRanks)): ?>

            <?php foreach ($heroRanks as $index => $rank): ?>

                <article class="hero-slide <?= $index === 0 ? 'is-active' : '' ?>">

                    <?php if (!empty($rank['badge'])): ?>
                        <div class="hero-badge">
                            <?= esc($rank['badge']) ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="hero-title">
                        <?= esc($rank['title']) ?>
                    </h1>

                    <?php if (!empty($rank['text'])): ?>
                        <p class="hero-text">
                            <?= esc($rank['text']) ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($rank['url'])): ?>
                        <a
                            href="<?= esc($rank['url']) ?>"
                            class="hero-link"
                        >
                            <span>→</span>
                        </a>
                    <?php endif; ?>

                </article>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>
<main>

<!-- ===================== PUBMATS ===================== -->
<section class="pubmat" id="pubmats" aria-label="Featured pubmats">
  <div class="pubmat-inner">
    <div class="pubmat-track">

      <div class="pubmat-slide is-active">
        <img src="<?= base_url('assets/Images/pubmats/1.jpg') ?>" alt="Pubmat 1">
      </div>

      <div class="pubmat-slide">
        <img src="<?= base_url('assets/Images/pubmats/2.jpg') ?>" alt="Pubmat 2">
      </div>

      

      <div class="pubmat-dots">
        <button type="button" class="pubmat-dot is-active" aria-label="Pubmat 1"></button>
        <button type="button" class="pubmat-dot" aria-label="Pubmat 2"></button>
      </div>

    </div>
  </div>
</section>


  <!-- ===================== UNIVERSITY BULLETIN ===================== -->
<section class="bulletin" id="bulletin">
  <div class="bulletin-inner">

    <!-- HEADER -->
    <div class="bulletin-header">
      <div class="bulletin-header-left">
        <span class="bulletin-eyebrow">News &amp; Updates</span>
        <h2 class="bulletin-heading">University Bulletin</h2>
      </div>

      <div class="bulletin-header-right">
        <a href="#announcementsModal" class="bulletin-view-all" data-ann-open aria-haspopup="dialog">
          View All Announcements
          <span class="bulletin-view-all-circle" aria-hidden="true">→</span>
        </a>
      </div>
    </div>

    <!-- BULLETIN LAYOUT -->
    <div class="bulletin-grid">

      <!-- =========================
          LEFT / MAIN FEATURED STORY
      ========================== -->
      <a href="https://www.facebook.com/photo?fbid=1515958020558492" class="bulletin-featured-card">
        <div class="bulletin-featured-media">
          <img src="<?= base_url('assets/Images/bulletin/bulletin2.jpg') ?>" alt="Official List of Accredited Student Organizations" class="bulletin-featured-img" />
          <span class="bulletin-badge badge-gold">Latest Announcement</span>
        </div>

        <div class="bulletin-featured-body">
          <h3 class="bulletin-featured-title">
           𝐈𝐧𝐯𝐞𝐬𝐭𝐢𝐭𝐮𝐫𝐞 𝐨𝐟 𝐓𝐒𝐔’𝐬 𝐒𝐞𝐯𝐞𝐧𝐭𝐡 𝐏𝐫𝐞𝐬𝐢𝐝𝐞𝐧𝐭
          </h3>
          <p class="bulletin-featured-text">
            Tarlac Agricultural University (TAU) President Dr. Silverio Ramon DC. Salunson, together with the University's four Vice Presidents, joins the academic community and distinguished guests in the investiture of Prof. Jasper Jay Nievera Mendoza, PhD, DDM, as the seventh President of Tarlac State University (TSU). 
          </p>
          
          <div class="bulletin-card-footer">
            <span class="bulletin-meta">October 6, 2026 &middot; OSSD Admin</span>
            <span class="bulletin-read-more">Read Full Story <span class="arrow">→</span></span>
          </div>
        </div>
      </a>

      <!-- =========================
          MIDDLE STACKED ARTICLES
      ========================== -->
      <div class="bulletin-stack">

        <!-- CAMPUS MEMO -->
        <a href="https://www.facebook.com/photo?fbid=1518989333588694" class="bulletin-mini-card">
          <div class="bulletin-mini-media">
            <img src="<?= base_url('assets/Images/bulletin/bulletin1.jpg') ?>" alt="Campus Safety Guidelines" class="bulletin-mini-img" />
          </div>
          <div class="bulletin-mini-body">
            <span class="bulletin-badge badge-subtle">MARKETING</span>
            <h4 class="bulletin-mini-title">𝐄𝐧𝐭𝐫𝐞𝐩𝐫𝐞𝐧𝐞𝐮𝐫𝐬𝐡𝐢𝐩 𝐚𝐧𝐝 𝐏𝐫𝐨𝐝𝐮𝐜𝐭 𝐌𝐚𝐫𝐤𝐞𝐭𝐢𝐧𝐠 𝐓𝐫𝐚𝐢𝐧𝐢𝐧𝐠 𝐖𝐨𝐫𝐤𝐬𝐡𝐨𝐩 - 𝐃𝐚𝐲 𝟏</h4>
            <p class="bulletin-meta">1 day ago</p>
          </div>
        </a>

        <!-- GRADUATION NOTICE -->
        <a href="<?= base_url('bulletin/graduation-notice') ?>" class="bulletin-mini-card">
          <div class="bulletin-mini-media">
            <img src="<?= base_url('assets/Images/bulletin/bulletin3.jpg') ?>" alt="Graduation Clearance Schedule" class="bulletin-mini-img" />
          </div>
          <div class="bulletin-mini-body">
            <span class="bulletin-badge badge-subtle">INNOWRITE</span>
            <h4 class="bulletin-mini-title"> 𝐈𝐍𝐍𝐎𝐖𝐑𝐈𝐓𝐄 𝟐𝟎𝟐𝟔 - 𝐃𝐚𝐲 𝟐 𝐀𝐈 𝐚𝐧𝐝 𝐑𝐨𝐛𝐨𝐭𝐢𝐜𝐬 𝐇𝐚𝐧𝐝𝐬-𝐨𝐧 𝐏𝐫𝐨𝐠𝐫𝐚𝐦</h4>
            <p class="bulletin-meta">02 October 2026</p>
          </div>
        </a>

      </div>

      <!-- =========================
          RIGHT SIDEBAR (QUICK FEED)
      ========================== -->
      <aside class="bulletin-sidebar">
        <h3 class="bulletin-sidebar-heading">Recent Bulletins</h3>

        <div class="bulletin-sidebar-list">

          <a href="https://www.facebook.com/photo?fbid=1518989333588694" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Official List of Accredited Student Organizations</h4>
              <span class="bulletin-meta">Admin &middot; 2 days ago</span>
            </div>
            <img src="<?= base_url('assets/Images/bulletin/bulletin1.jpg') ?>" alt="Accredited Organizations" class="bulletin-sidebar-img" />
          </a>

          <a href="<?= base_url('bulletin/campus-memo') ?>" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>𝐄𝐧𝐭𝐫𝐞𝐩𝐫𝐞𝐧𝐞𝐮𝐫𝐬𝐡𝐢𝐩 𝐚𝐧𝐝 𝐏𝐫𝐨𝐝𝐮𝐜𝐭 𝐌𝐚𝐫𝐤𝐞𝐭𝐢𝐧𝐠 𝐓𝐫𝐚𝐢𝐧𝐢𝐧𝐠 𝐖𝐨𝐫𝐤𝐬𝐡𝐨𝐩 - 𝐃𝐚𝐲 𝟏</h4>
              <span class="bulletin-meta">1 day ago</span>
            </div>
            <img src="<?= base_url('assets/Images/bulletin/bulletin2.jpg') ?>" alt="Campus Memo" class="bulletin-sidebar-img" />
          </a>

          <a href="<?= base_url('bulletin/graduation-notice') ?>" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Graduation Notice: Requirements &amp; Schedule</h4>
              <span class="bulletin-meta">Admin &middot; 5 days ago</span>
            </div>
            <img src="<?= base_url('assets/Images/bulletin/bulletin3.jpg') ?>" alt="Graduation Notice" class="bulletin-sidebar-img" />
          </a>

          <a href="<?= base_url('bulletin/enrollment-reminders') ?>" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Enrollment Reminders for Next Semester</h4>
              <span class="bulletin-meta">Admin &middot; 1 week ago</span>
            </div>
            <img src="<?= base_url('assets/Images/bulletin/bulletin4.jpg') ?>" alt="Enrollment Reminders" class="bulletin-sidebar-img" />
          </a>

        </div>
      </aside>

    </div>
  </div>
</section>


<!-- ===================== UPCOMING EVENTS + EXAM SCHEDULE ===================== -->
  <section class="events" id="events">
    <div class="events-inner">

      <div class="events-split">

        <!-- LEFT: Upcoming Events -->
        <div class="events-col-left">

          <div class="events-header">
            <h2 class="events-heading">Upcoming Events</h2>
          </div>

          <div class="events-list">

            <div class="events-row">
              <div class="events-date">
                  <span class="events-date-month">AUG</span>
                  <span class="events-date-day">29</span>
                  <span class="events-date-gap"></span>
                  <span class="events-date-month">SEPT</span>
                  <span class="events-date-day">03</span>
              </div>

              <div class="events-img" style="background-image: url('<?= base_url('assets/Images/siklaban.jpg') ?>');"></div>

              <div class="events-details">
                <h3 class="events-title">INTRAMURALS</h3>
                <p class="events-meta">Malacama, Camiling, Tarlac<br>7:00 am — 5:00 pm</p>
                <p class="events-desc">Mark your calendars, TAUians! Anchored on the theme “𝙎𝙄𝙆𝙇𝘼𝘽𝘼𝙉 𝟮𝟬𝟮𝟲: 𝙃𝙚𝙖𝙧𝙩𝙨 𝙤𝙣 𝙩𝙝𝙚 𝙁𝙞𝙚𝙡𝙙, 𝙏𝙤𝙜𝙚𝙩𝙝𝙚𝙧 𝙖𝙨 𝙊𝙣𝙚,” here is the official Program Flow to guide you from the grand opening to the final celebration.</p>
                <a href="https://www.facebook.com/share/p/1DNqGfTyNF/" class="events-link">View Event Details <span>→</span></a>
              </div>
            </div>

            <div class="events-row">
              <div class="events-date">
                <span class="events-date-month">JUL</span>
                <span class="events-date-day">04</span>
              </div>

              <div class="events-img" style="background-image: url('<?= base_url('assets/Images/taulogo.png') ?>');"></div>

              <div class="events-details">
                <h3 class="events-title">Freshmen Orientation</h3>
                <p class="events-meta">TAU Gymnasium<br>8:00 am — 12:00 pm</p>
                <p class="events-desc">Replace this with a short description of the event — activities, guests, or highlights attendees can look forward to.</p>
                <a href="#" class="events-link">View Event Details <span>→</span></a>
              </div>
            </div>

            <div class="events-row">
              <div class="events-date">
                <span class="events-date-month">SEPT</span>
                <span class="events-date-day">18</span>
              </div>

              <div class="events-img" style="background-image: url('<?= base_url('assets/Images/taulogo.png') ?>');"></div>

              <div class="events-details">
                <h3 class="events-title">ASEAN</h3>
                <p class="events-meta">TAU Grounds<br>9:00 am — 6:00 pm</p>
                <p class="events-desc">Replace this with a short description of the event — activities, guests, or highlights attendees can look forward to.</p>
                <a href="#" class="events-link">View Event Details <span>→</span></a>
              </div>
            </div>

          </div>

          <div class="events-footer">
            <a href="#calendar" class="events-calendar-btn">View School Calendar</a>
          </div>

        </div>

        <!-- VERTICAL SEPARATOR -->
        <div class="events-divider"></div>

        <!-- RIGHT: Exam Schedule -->
        <div class="events-col-right">
          <h2 class="exam-heading">Exam Schedule</h2>

          <div class="exam-list">

            <div class="exam-row">
              <div class="exam-date">
                <span class="exam-date-month">SEP</span>
                <span class="exam-date-day">08</span>
              </div>
              <div class="exam-details">
                <h3 class="exam-title">Midterm Examinations</h3>
                <p class="exam-meta">All Colleges<br>7:00 am — 5:00 pm</p>
              </div>
            </div>

            <div class="exam-row">
              <div class="exam-date">
                <span class="exam-date-month">SEP</span>
                <span class="exam-date-day">12</span>
              </div>
              <div class="exam-details">
                <h3 class="exam-title">Special Examinations</h3>
                <p class="exam-meta">By Department Schedule<br>8:00 am — 4:00 pm</p>
              </div>
            </div>

            <div class="exam-row">
              <div class="exam-date">
                <span class="exam-date-month">OCT</span>
                <span class="exam-date-day">27</span>
              </div>
              <div class="exam-details">
                <h3 class="exam-title">Final Examinations</h3>
                <p class="exam-meta">All Colleges<br>7:00 am — 5:00 pm</p>
              </div>
            </div>

          </div>

          <div class="exam-footer">
            <a href="#exam-schedule" class="exam-schedule-btn">View Full Exam Schedule</a>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php
// All announcements shown in the "View All Announcements" modal.
// If your controller passes $announcements, that list is used instead.
// Keys: title, date (optional), image (file in assets/Images), url (optional), text (optional)
$announcements = $announcements ?? [
  [
    'title' => 'Official List of Accredited Student Organizations, A.Y. 2026–2027',
    'date'  => '',
    'image' => 'bulletin1.jpg',
    'url'   => 'https://www.facebook.com/photo/?fbid=1441665724645667&set=pcb.1441668574645382',
    'text'  => "The Office of Student Services and Development (OSSD) has announced this year's accredited student organizations. Students are encouraged to join and grow through leadership and community.",
  ],
  [
    'title' => 'Campus Memo: Updated Policy Guidelines',
    'date'  => 'January 20, 7:49 AM',
    'image' => 'bulletin2.jpg',
    'url'   => '',
    'text'  => '',
  ],
  [
    'title' => 'Graduation Notice: Requirements & Schedule',
    'date'  => 'January 21, 8:32 AM',
    'image' => 'bulletin3.jpg',
    'url'   => '',
    'text'  => '',
  ],
  [
    'title' => 'Enrollment Reminders for Next Semester',
    'date'  => '',
    'image' => 'bulletin4.jpg',
    'url'   => '',
    'text'  => '',
  ],
];
?>

<!-- ===================== ALL ANNOUNCEMENTS MODAL ===================== -->
<div class="ann-modal" id="announcementsModal" role="dialog" aria-modal="true" aria-labelledby="annModalTitle" aria-hidden="true">
  <div class="ann-modal-backdrop" data-ann-close></div>

  <div class="ann-modal-panel">
    <header class="ann-modal-head">
      <h2 class="ann-modal-title" id="annModalTitle">All Announcements</h2>
      <button type="button" class="ann-modal-close" data-ann-close aria-label="Close announcements">&times;</button>
    </header>

    <div class="ann-modal-body">
      <?php if (! empty($announcements)): ?>
        <ul class="ann-list">
          <?php foreach ($announcements as $a): ?>
            <li class="ann-item">
              <div class="ann-item-img" style="background-image: url('<?= esc(base_url('assets/Images/' . $a['image']), 'attr') ?>');"></div>

              <div class="ann-item-body">
                <h3 class="ann-item-title"><?= esc($a['title']) ?></h3>
                <p class="ann-item-meta"><?= ($a['date'] ?? '') !== '' ? esc($a['date']) . ' &middot; Admin' : 'By Admin' ?></p>

                <?php if (! empty($a['text'])): ?>
                  <p class="ann-item-text"><?= esc($a['text']) ?></p>
                <?php endif; ?>

                <?php if (! empty($a['url'])): ?>
                  <a href="<?= esc($a['url'], 'attr') ?>" class="ann-item-link" target="_blank" rel="noopener">Read More <span>→</span></a>
                <?php endif; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="ann-empty">No announcements have been posted yet.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>