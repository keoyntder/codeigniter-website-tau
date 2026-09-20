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
        <source
            src="<?= base_url('assets/Images/hero.mp4') ?>"
            type="video/mp4"
        >
    </video>

    <div class="hero-overlay"></div>

    <!-- Left: rank content -->
    <div class="hero-content">
        <?php foreach ($heroRanks as $i => $r): ?>
            <div class="hero-slide <?= $i === 0 ? 'is-active' : '' ?>"
                 id="panel-<?= $r['id'] ?>" role="tabpanel">
                <span class="hero-badge"><?= $r['badge'] ?></span>
                <h1 class="hero-title"><?= $r['title'] ?></h1>
                <p class="hero-text"><?= $r['text'] ?></p>
                <a href="<?= $r['url'] ?>" class="hero-link" target="_blank" rel="noopener">
                    <span>↗</span> visit
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Right: rank buttons -->
    <div class="hero-categories" role="tablist" aria-label="TAU rankings">
        <?php foreach ($heroRanks as $i => $r): ?>
            <button type="button"
                    class="hero-cat <?= $i === 0 ? 'is-active' : '' ?>"
                    role="tab"
                    aria-controls="panel-<?= $r['id'] ?>"
                    aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><?= $r['icon'] ?></svg>
                <span><?= $r['label'] ?></span>
            </button>
        <?php endforeach; ?>
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

  <!-- ===================== CAREER & JOB PLACEMENT ===================== -->
<section class="jp-section" id="job-placement">

  <!-- Split intro block (Option 2) -->
  <div class="jp-hero">
    <div class="jp-media">
      <img src="<?= base_url('assets/Images/job-placement-photo.jpg') ?>" alt="TAU Career and Job Placement Office">
    </div>
    <div class="jp-content">
      <span class="jp-eyebrow">Career &amp; Job Placement Office</span>
      <h2 class="jp-title">Helping Graduates Launch Their Careers</h2>
      <p class="jp-text">The Career and Job Placement Office connects graduating students and alumni with partner employers through job postings, career counseling, and labor market updates.</p>

      <div class="jp-chips">
        <div class="jp-chip"><b>Job Postings</b>Shared regularly</div>
        <div class="jp-chip"><b>Alumni &amp; Grads</b>Open to all</div>
        <div class="jp-chip"><b>DOLE Region III</b>Labor market info</div>
      </div>

      <a class="jp-btn" href="#job-placement-list">View Job Openings</a>
    </div>
  </div>

  <!-- Job / career listings, accordion style -->
  <div class="jp-list-wrap" id="job-placement-list">
    <div class="jp-list-head">
      <span class="jp-eyebrow">Latest Updates</span>
      <h2 class="jp-list-title">Job &amp; Career Opportunities</h2>
    </div>

    <div class="jp-accordion">

      <!-- Item 1: Field Agronomist opening -->
      <div class="jp-item is-open">
        <button type="button" class="jp-item-q" data-jp-toggle>
          <span>Job Opportunity | Field Agronomist</span>
          <span class="jp-item-icon" aria-hidden="true">−</span>
        </button>
        <div class="jp-item-a">
          <p>The TAU Student Placement Office is pleased to share a job opportunity for interested TAU graduates and graduating students.</p>

          <dl class="jp-facts">
            <div><dt>Position</dt><dd>Field Agronomist</dd></div>
            <div><dt>Place of Assignment</dt><dd>Tarlac, Pampanga, and Nueva Vizcaya</dd></div>
          </dl>

          <p class="jp-label">Qualifications</p>
          <ul class="jp-bullets">
            <li>Minimum of a Bachelor's Degree in Agriculture</li>
            <li>Entry-level or experienced Sales Technician and/or Field Trialist in the agrochemical industry or related field</li>
            <li>Fresh graduates are encouraged to apply!</li>
          </ul>

          <p>The Field Agronomist will help promote agricultural products to end-users, implement marketing programs, conduct and monitor product demonstration trials, provide technical training and after-sales support, and assist in developing new product applications.</p>

          <p class="jp-label">How to Apply</p>
          <p>Interested applicants may send their CV/resumé to:</p>
          <ul class="jp-bullets jp-bullets--links">
            <li><a href="mailto:hr@essi.com.ph">hr@essi.com.ph</a></li>
            <li><a href="mailto:mellanie.mendoza@essi.com.ph">mellanie.mendoza@essi.com.ph</a></li>
          </ul>
        </div>
      </div>

      <!-- Item 2: DOLE Region III labor market update -->
      <div class="jp-item">
        <button type="button" class="jp-item-q" data-jp-toggle>
          <span>DOLE Region III &mdash; Labor Market Update</span>
          <span class="jp-item-icon" aria-hidden="true">+</span>
        </button>
        <div class="jp-item-a">
          <p>Looking for internship, on-the-job training, or employment opportunities after graduation? Stay updated with the latest labor market information from the Department of Labor and Employment (DOLE) Region III.</p>

          <p class="jp-label">Top In-Demand Jobs This Week</p>
          <ul class="jp-bullets jp-bullets--grid">
            <li>Call Center Agent</li>
            <li>Production Worker</li>
            <li>Machine Operator</li>
            <li>Technician (General)</li>
            <li>Administrative/Office Clerk</li>
            <li>Service Crew</li>
            <li>Engineer (General)</li>
            <li>Pipe Fitter</li>
            <li>Mechanic (General)</li>
            <li>&hellip;and more!</li>
          </ul>

          <p>Tarlac City is among the Top 10 locations with the highest number of job vacancies in Central Luzon, making it a great place to explore career opportunities.</p>

          <p>Graduating students, alumni, and jobseekers are encouraged to regularly check available vacancies through <strong>PhilJobNet</strong> and visit your nearest <strong>Public Employment Service Office (PESO)</strong> for assistance.</p>
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