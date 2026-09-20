<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tarlac Agricultural University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">


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

<?= $this->include('partials/header') ?>

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
                            Learn More
                            <span>→</span>
                        </a>
                    <?php endif; ?>

                </article>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>
<main>


<!-- ===================== UNIVERSITY BULLETIN ===================== -->
<section class="bulletin" id="bulletin">
  <div class="bulletin-inner">

    <div class="bulletin-header">
      <div class="bulletin-header-left">
        <h2 class="bulletin-heading">University Bulletin</h2>
      </div>
      <div class="bulletin-header-right">
        <p class="bulletin-subtext">Stay updated with the latest news, memos, and announcements from Tarlac Agricultural University.</p>
        <a href="#" class="bulletin-view-all">
          View All Announcements
          <span class="bulletin-view-all-circle">→</span>
        </a>
      </div>
    </div>

    <div class="bulletin-layout">

      <!-- LEFT: today's news -->
      <div class="bulletin-main">

        <!-- small stacked items, beside/above the featured story -->
        <div class="bulletin-stack">
          <a href="#" class="bulletin-stack-item">
            <div class="bulletin-stack-img" style="background-image: url('Images/bulletin-2.jpg');"></div>
            <div class="bulletin-stack-body">
              <h3 class="bulletin-stack-title">Campus Memo</h3>
              <p class="bulletin-stack-meta">JANUARY 20, 7:49 AM &middot; ADMIN</p>
            </div>
          </a>
          <a href="#" class="bulletin-stack-item">
            <div class="bulletin-stack-img" style="background-image: url('Images/bulletin-3.jpg');"></div>
            <div class="bulletin-stack-body">
              <h3 class="bulletin-stack-title">Graduation Notice</h3>
              <p class="bulletin-stack-meta">JANUARY 21, 8:32 AM &middot; ADMIN</p>
            </div>
          </a>
        </div>

        <!-- featured / biggest story of the day -->
        <div class="bulletin-featured">
          <div class="bulletin-featured-img" style="background-image: url('Images/bulletin1.jpg');"></div>
          <div class="bulletin-featured-caption">
            <span class="bulletin-featured-tag">Latest</span>
            <h3 class="bulletin-featured-title">Official List of Accredited Student Organizations, A.Y. 2026–2027</h3>
            <p class="bulletin-featured-text">The Office of Student Services and Development (OSSD) has announced this year's accredited student organizations. Students are encouraged to join and grow through leadership and community.</p>
            <a href="https://www.facebook.com/photo/?fbid=1441665724645667&set=pcb.1441668574645382" class="bulletin-featured-link">Read More <span>→</span></a>
          </div>
        </div>

      </div>

      <!-- vertical divider -->
      <div class="bulletin-divider"></div>

      <!-- RIGHT: latest list -->
      <div class="bulletin-sidebar">
        <h3 class="bulletin-sidebar-heading">Latest</h3>

        <div class="bulletin-sidebar-list">

          <a href="#" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Official List of Accredited Student Organizations</h4>
              <span>By Admin</span>
            </div>
            <div class="bulletin-sidebar-img" style="background-image: url('Images/bulletin1.jpg');"></div>
          </a>

          <a href="#" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Campus Memo: Updated Policy Guidelines</h4>
              <span>By Admin</span>
            </div>
            <div class="bulletin-sidebar-img" style="background-image: url('Images/bulletin2.jpg');"></div>
          </a>

          <a href="#" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Graduation Notice: Requirements &amp; Schedule</h4>
              <span>By Admin</span>
            </div>
            <div class="bulletin-sidebar-img" style="background-image: url('Images/bulletin3.jpg');"></div>
          </a>

          <a href="#" class="bulletin-sidebar-item">
            <div class="bulletin-sidebar-text">
              <h4>Enrollment Reminders for Next Semester</h4>
              <span>By Admin</span>
            </div>
            <div class="bulletin-sidebar-img" style="background-image: url('Images/bulletin4.jpg');"></div>
          </a>

        </div>
      </div>

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
                <span class="events-date-month">JUN</span>
                <span class="events-date-day">23</span>
              </div>

              <div class="events-img" style="background-image: url('<?= base_url('assets/Images/taulogo.png') ?>');"></div>

              <div class="events-details">
                <h3 class="events-title">Foundation Day Celebration</h3>
                <p class="events-meta">Malacama, Camiling, Tarlac<br>7:00 am — 5:00 pm</p>
                <p class="events-desc">Replace this with a short description of the event — activities, guests, or highlights attendees can look forward to.</p>
                <a href="#" class="events-link">View Event Details <span>→</span></a>
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
                <span class="events-date-month">AUG</span>
                <span class="events-date-day">30</span>
              </div>

              <div class="events-img" style="background-image: url('<?= base_url('assets/Images/taulogo.png') ?>');"></div>

              <div class="events-details">
                <h3 class="events-title">Agri-Fair and Trade Expo</h3>
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

  <!-- ===================== VISION & MISSION ===================== -->
<section class="mission-vision" id="mission-vision">
  <div class="mv-inner">
 
    <div class="mv-media">
      <img src="<?= base_url('assets/Images/hero-bg.jpg') ?>" alt="Tarlac Agricultural University campus" class="mv-media-img">
    </div>
 
    <div class="mv-content"> 
      <div class="mv-block">
        <h3 class="mv-block-title">Vision</h3>
        <p class="mv-block-text">TAU as one of the leading and globally recognized smart agricultural universities.</p>
      </div>
 
      <div class="mv-block">
        <h3 class="mv-block-title">Mission</h3>
        <p class="mv-block-text">TAU produces highly competent individuals who empower communities through inclusive quality education, impactful research, responsive extension, sustainable production, and good governance that are technology-driven, aimed at enhancing the quality of life in society with unwavering integrity.</p>
      </div>
     </div>
 
  </div>
</section>

<!-- ===================== FOOTER ===================== -->
<footer class="site-footer">
  <div class="footer-inner">

    <div class="footer-brand-col">
      <div class="footer-brand-row">
        <div class="footer-logo-container">
          <img src="<?= base_url('assets/Images/taulogo.png') ?>" alt="TAU Logo" class="footer-logo">
        </div>
        <div class="footer-brand-text">
          <h3 class="footer-univ-name">Tarlac Agricultural University</h3>
          <p class="footer-univ-loc">Malacama, Camiling</p>
        </div>
      </div>

      <p class="footer-contact">
        +63 (045) 123 4567 &nbsp;|&nbsp; +63 912 345 6789
      </p>

      <div class="footer-badges">
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/cetlogo.png') ?>" alt="College of Engineering and Technology" class="footer-sub-logo">
        </div>
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/cas2.png') ?>" alt="College of Arts and Sciences" class="footer-sub-logo">
        </div>
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/caf.png') ?>" alt="College of Agriculture and Forestry" class="footer-sub-logo">
        </div>
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/cbm2.png') ?>" alt="College of Business Management" class="footer-sub-logo">
        </div>
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/cvm.png') ?>" alt="College of Veterinary Medicine" class="footer-sub-logo">
        </div>
        <div class="footer-sub-logo-container">
          <img src="<?= base_url('assets/Images/coed.png') ?>" alt="College of Education" class="footer-sub-logo">
        </div>
      </div>
    </div>

    <div class="footer-nav-grid">
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Colleges</h4>
        <ul>
          <li><a href="<?= base_url('departments/cet') ?>">College of Engineering and Technology</a></li>
          <li><a href="<?= base_url('departments/cas') ?>">College of Arts and Sciences</a></li>
          <li><a href="<?= base_url('departments/caf') ?>">College of Agriculture and Forestry</a></li>
          <li><a href="<?= base_url('departments/cbm') ?>">College of Business and Management</a></li>
          <li><a href="<?= base_url('departments/cvm') ?>">College of Veterinary Medicine</a></li>
          <li><a href="<?= base_url('departments/coed') ?>">College of Education</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Contact Us</h4>
        <ul>
          <li><a href="#">Admissions</a></li>
          <li><a href="#">Registrar</a></li>
          <li><a href="#">Help Desk</a></li>
          <li><a href="#">Support</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">About TAU</h4>
        <ul>
          <li><a href="#">History</a></li>
          <li><a href="#">Administration</a></li>
          <li><a href="#">Board of Regents</a></li>
          <li><a href="#">Quality Policy</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Offices</h4>
        <ul>
          <li><a href="#">HR</a></li>
          <li><a href="#">Finance</a></li>
          <li><a href="#">Research</a></li>
          <li><a href="#">Extension</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Mission</h4>
        <ul>
          <li><a href="#">Core Values</a></li>
          <li><a href="#">Goals</a></li>
          <li><a href="#">Strategic Plan</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Vision</h4>
        <ul>
          <li><a href="#">2028 Vision</a></li>
          <li><a href="#">Development</a></li>
          <li><a href="#">Sustainability</a></li>
        </ul>
      </div>
    </div>

  </div>
</footer>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>