<?php
$colleges = $colleges ?? [];
$applicantTypes = $applicantTypes ?? [];

$totalPrograms = 0;
foreach ($colleges as $c) {
    $totalPrograms += count($c['programs']);
}

$collegeFacebook = [
    'caf'  => 'https://www.facebook.com/taucafamily',
    'cet'  => 'https://www.facebook.com/TAUCollegeOfEngineeringAndTechnology',
    'cvm'  => 'https://www.facebook.com/profile.php?id=61553202523949',
    'cbm'  => 'https://www.facebook.com/taucbm',
    'cas'  => 'https://www.facebook.com/profile.php?id=100064029942024',
    'coed' => 'https://www.facebook.com/EDUKFalcons',
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admissions and Registration | Tarlac Agricultural University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admissions.css') ?>">
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

<main class="admissions-page">

  <!-- ===================== BANNER ===================== -->
  <section
    class="page-banner admissions-banner"
    style="--admissions-bg: url('<?= base_url('assets/Images/bg.png') ?>');"  >
    
    <div class="admissions-hero-inner">
      <h1 class="admissions-hero-title">ADMISSIONS</h1>
      <span class="admissions-hero-and">and</span>
      <h1 class="admissions-hero-title">REGISTRATION</h1>

      <p class="admissions-hero-lead">Find the admission path that matches you.</p>
      <p class="admissions-hero-caps">
        <?= $totalPrograms ?> DEGREE PROGRAMS &middot; <?= count($colleges) ?> COLLEGES
      </p>
    </div>

    <div class="banner-jump">
      <p class="banner-jump-label">Choose how you're applying</p>
      <div class="banner-applicant-types">
        <a href="#" class="banner-applicant-type" data-modal="freshmenModal">Freshmen Students</a>
        <a href="#returnees" class="banner-applicant-type">Returnees</a>
        <a href="#shifters" class="banner-applicant-type">Shifters</a>
        <a href="#" class="banner-applicant-type" data-modal="transfereesModal">Transferees</a>
        <a href="#" class="banner-applicant-type" data-modal="secondCourserModal">Second Degree</a>
        <a href="#" class="banner-applicant-type" data-modal="foreignModal">Foreign Students</a>
      </div>
    </div>
  </section>

<!-- ===================== FRESHMEN ADMISSION MODAL ===================== -->
<div class="adm-modal-overlay" id="freshmenModal">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Admission Requirements</h2>
      <p class="adm-modal-lead">Qualified incoming first-year students are required to submit the following documents:</p>
      <ul class="adm-modal-list">
        <li>Printed copy of the Notice of Admission (accessible through the Online Admission System using the applicant's system account)</li>
        <li>Original copy of Grade 12 Report Card/Form 138 or its equivalent</li>
        <li>Original copy of the latest Certificate of Good Moral Character</li>
        <li>One (1) copy of latest 2x2 ID picture with name tag</li>
        <li>Photocopy of PSA Birth Certificate</li>
      </ul>

      <h2 class="adm-modal-title">General Guidelines</h2>
      <ul class="adm-modal-list">
        <li>Only qualified applicants who have confirmed their slots shall be allowed to enroll.</li>
        <li>The enrolment of qualified incoming first-year students shall be facilitated by the Admission and Registration Services Staff. Qualified transferees are advised to wait for the official announcement regarding their enrolment schedule.</li>
        <li>The prescribed enrolment schedule shall be strictly observed. Applicants who fail to enroll during their assigned schedule may only be accommodated during the designated late enrolment period.</li>
        <li>For inquiries and assistance, applicants may contact the Office of Admission and Registration Services through:
          <br>0916-744-2456
          <br><a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>
        </li>
      </ul>

      <h2 class="adm-modal-title">Enrolment Procedure</h2>

      <div class="adm-step-block">
        <p class="adm-step-title">Step 1</p>
        <p>Present the Notice of Admission to the guard on duty at the TAU Main Gate.</p>
      </div>
      <div class="adm-step-block">
        <p class="adm-step-title">Step 2</p>
        <p>Proceed to the Learning Resource Center Atrium for queue registration and verification of admission requirements.</p>
      </div>
      <div class="adm-step-block">
        <p class="adm-step-title">Step 3</p>
        <p>Proceed to the Admission and Registration Services Office and submit the following documentary requirements:</p>
        <ul class="adm-modal-list">
          <li>Printed Notice of Admission</li>
          <li>Original copy of Grade 12 Report Card/Form 138 or its equivalent</li>
          <li>Latest Certificate of Good Moral Character</li>
          <li>One (1) copy of 2x2 ID picture with name tag</li>
          <li>Photocopy of PSA Birth Certificate</li>
        </ul>
        <p>While waiting for the verification of documents and processing of enrolment, students are requested to complete the ID processing form.</p>
      </div>
      <div class="adm-step-block">
        <p class="adm-step-title">Step 4</p>
        <p>Proceed to the Accounting Office for the validation of the Certificate of Registration (COR).</p>
      </div>
      <div class="adm-step-block">
        <p class="adm-step-title">Step 5</p>
        <p>Submit the accomplished ID processing form, claim the printed copy of the Certificate of Registration (COR), and verify the accuracy and completeness of the information reflected in the document.</p>
        <p class="adm-step-venue">Venue: Admin Building – Admission and Registration Services</p>
      </div>

      <p class="adm-modal-note">Incoming students are advised to regularly monitor the University's official communication platforms for additional announcements and updates.</p>
    </div>

    <div class="adm-modal-actions">
      <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
      <a href="<?= base_url('#contact') ?>" class="adm-btn" data-modal-close>Contact Admissions and Registration</a>
    </div>
  </div>
</div>

<!-- ===================== TRANSFEREES MODAL ===================== -->
<div class="adm-modal-overlay" id="transfereesModal">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Admission Requirements</h2>
      <p class="adm-modal-lead">Transferees are required to submit the following documents:</p>
      <ul class="adm-modal-list">
        <li>Transcript of Records / Certification of Grades</li>
        <li>Certificate of Good Moral Character</li>
        <li>Photocopy of PSA Birth Certificate</li>
        <li>2x2 ID picture with a name tag</li>
      </ul>

      <p class="adm-modal-note">
        Qualified transferees are advised to wait for the official announcement regarding their
        enrolment schedule. For inquiries and assistance, applicants may contact the Office of
        Admission and Registration Services at 0916-744-2456 or
        <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
      </p>
    </div>

    <div class="adm-modal-actions">
      <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
      <a href="<?= base_url('#contact') ?>" class="adm-btn" data-modal-close>Contact Admissions and Registration</a>
    </div>
  </div>
</div>

<!-- ============ SECOND COURSER / SECOND DEGREE MODAL ============ -->
<div class="adm-modal-overlay" id="secondCourserModal">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Admission Requirements</h2>
      <p class="adm-modal-lead">Second courser / second degree applicants are required to submit the following documents:</p>
      <ul class="adm-modal-list">
        <li>Transcript of Records</li>
        <li>Photocopy of PSA Birth Certificate</li>
        <li>2x2 ID picture with a name tag</li>
      </ul>

      <p class="adm-modal-note">
        For inquiries and assistance, applicants may contact the Office of Admission and
        Registration Services at 0916-744-2456 or
        <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
      </p>
    </div>

    <div class="adm-modal-actions">
      <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
      <a href="<?= base_url('#contact') ?>" class="adm-btn" data-modal-close>Contact Admissions and Registration</a>
    </div>
  </div>
</div>

<!-- ===================== FOREIGN STUDENTS MODAL ===================== -->
<div class="adm-modal-overlay" id="foreignModal">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Admission Requirements</h2>
      <p class="adm-modal-lead">Foreign student applicants are required to submit the following documents:</p>
      <ul class="adm-modal-list">
        <li>Duly Accomplished Application Form</li>
        <li>Certificate of English Proficiency</li>
        <li>
          Student's Personal History Statement
          <span class="adm-sub-note">
            Duly signed by the applicant, both in English and in his/her national alphabet,
            accompanied by his/her personal seal, if any, containing among others,
            his/her left and right thumb-prints.
          </span>
        </li>
        <li>
          Transcript of Records / Scholastic Records and Diploma or Certificate of Completion
          <span class="adm-sub-note">
            With English translation, duly notarized and authenticated by the Philippine Embassy or Consulate.
          </span>
        </li>
        <li>
          Notarized Affidavit of Support
          <span class="adm-sub-note">
            Including bank statements or a notarized grant for institutional scholars, to cover
            expenses for the student's accommodation and subsistence, as well as school dues and
            other incidental expenses.
          </span>
        </li>
        <li>Photocopy / scanned copy of the data page of the student's passport</li>
        <li>Birth Certificate or its equivalent</li>
        <li>Medical Health Certificate</li>
        <li>Authenticated Police Clearance / Report</li>
        <li>Student Visa</li>
        <li>2x2 ID picture with a name tag</li>
      </ul>

      <p class="adm-modal-note">
        Foreign applicants are advised to coordinate early with the Office of Admission and
        Registration Services, as document authentication may require additional processing time.
        For inquiries, contact 0916-744-2456 or
        <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
      </p>
    </div>

    <div class="adm-modal-actions">
      <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
      <a href="<?= base_url('#contact') ?>" class="adm-btn" data-modal-close>Contact Admissions and Registration</a>
    </div>
  </div>
</div>

  <!-- ===================== PROGRAMS BY COLLEGE ===================== -->
  <section class="programs" id="programs">

    <div class="programs-head">
      <h2 class="adm-heading">Degree programs by college</h2>
    </div>

    <?php foreach ($colleges as $c): ?>
      <?php $n = count($c['programs']); ?>
      <section class="college-block" id="<?= esc($c['code']) ?>" aria-labelledby="<?= esc($c['code']) ?>-title">

        <div class="college-info">
          <span class="college-logo">
            <img src="<?= base_url('assets/Images/' . $c['logo']) ?>" alt="">
          </span>
          <h3 class="college-name" id="<?= esc($c['code']) ?>-title"><?= esc($c['name']) ?></h3>
          <?php if (! empty($collegeFacebook[$c['code']])): ?>
            <a href="<?= esc($collegeFacebook[$c['code']]) ?>" class="college-link college-link--fb" target="_blank" rel="noopener">View Page</a>
          <?php endif; ?>
        </div>

        <ul class="program-list">
          <?php foreach ($c['programs'] as $p): ?>
            <li>
              <div class="program-row">
                <span class="program-text">
                  <span class="program-level"><?= esc($p[0]) ?></span>
                  <span class="program-name"><?= esc($p[1]) ?></span>
                </span>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

      </section>
    <?php endforeach; ?>

  </section>


  <!-- ===================== HELP ===================== -->
  <section class="adm-cta" id="contact-admissions">
    <div class="adm-cta-copy">
      <h2 class="adm-cta-title">Not sure which program fits?</h2>
      <p class="adm-cta-text">The Admissions and Registration office can help you compare programs and check what you need to apply.</p>
    </div>
    <div class="adm-cta-actions">
      <a href="<?= base_url('#contact') ?>" class="adm-btn">Contact Admissions and Registration</a>
    </div>
  </section>


  <!-- ===================== APPLY NOW ===================== -->
  <section class="adm-apply-final" id="apply-now">
    <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
  </section>

</main>


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
          <li><a href="<?= base_url('departments/ced') ?>">College of Education</a></li>
        </ul>
      </div>
      <div class="footer-nav-col">
        <h4 class="footer-nav-heading">Contact Us</h4>
        <ul>
          <li><a href="#">Admissions and Registration</a></li>
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