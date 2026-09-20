<?php
$colleges       = $colleges ?? [];
$applicantTypes = $applicantTypes ?? [];
$enrollSchedule = $enrollSchedule ?? [];
$passers        = $passers ?? [];
$schedYear      = $schedYear ?? (int) date('Y');
$schedMonth     = $schedMonth ?? (int) date('n');

// Count degree programs only (rows with an empty degree, e.g. Teacher Certificate Program, are excluded)
$totalPrograms = 0;
foreach ($colleges as $c) {
    foreach ($c['programs'] as $p) {
        if (trim($p[0]) !== '') {
            $totalPrograms++;
        }
    }
}

// Filled while rendering the program list, then output as modals below the list
$majorsModals = [];

$collegeFacebook = [
    'caf'  => 'https://www.facebook.com/taucafamily',
    'cet'  => 'https://www.facebook.com/TAUCollegeOfEngineeringAndTechnology',
    'cvm'  => 'https://www.facebook.com/profile.php?id=61553202523949',
    'cbm'  => 'https://www.facebook.com/taucbm',
    'cas'  => 'https://www.facebook.com/profile.php?id=100064029942024',
    'coed' => 'https://www.facebook.com/EDUKFalcons',
];

// Calendar helpers for the enrollment schedule
$firstDow    = (int) date('w', mktime(0, 0, 0, $schedMonth, 1, $schedYear));
$daysInMonth = (int) date('t', mktime(0, 0, 0, $schedMonth, 1, $schedYear));
$firstDay    = array_key_first($enrollSchedule);
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
  </section>

  <!-- ===================== QUICK JUMP ===================== -->
  <section class="quick-jump" aria-label="Jump to a section">
    <div class="quick-jump-inner">
      <a href="#programs-offered" class="quick-jump-btn">Programs Offered</a>
      <a href="#how-to-apply" class="quick-jump-btn">Application Requirements</a>
      <a href="#admission-test" class="quick-jump-btn">Admission Test</a>
      <a href="#passers" class="quick-jump-btn">List of Passers</a>
      <a href="#enrollment-schedule" class="quick-jump-btn">Enrollment Schedule</a>
    </div>
  </section>

<!-- ===================== FRESHMEN ADMISSION MODAL ===================== -->
<div class="adm-modal-overlay" id="freshmenModal">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Before You Apply</h2>
      <p class="adm-modal-lead">First time applicants must have an existing and valid email address, together with the original and photocopy of the following requirements:</p>

      <h2 class="adm-modal-title">For incoming first-year students</h2>
      <ul class="adm-modal-list">
        <li>Grade 12 Report Card / Form 138 / Report of Grades (1st Quarter and 2nd Quarter grades, or First Semester grades only) duly signed by the Adviser, School Principal, or School Registrar</li>
        <li>Certificate of Registration or Certificate of Enrolment for enrolled Grade 12 students</li>
        <li>Certification of Good Moral Character</li>
        <li>PSA / NSO Birth Certificate</li>
        <li>Certificate of Indigency (if applicable)</li>
        <li>Annual Income Tax Return of parents (if applicable)</li>
        <li>2x2 ID picture with a name tag and white background</li>
      </ul>

      <h2 class="adm-modal-title">For Alternative Learning System (ALS) graduates</h2>
      <ul class="adm-modal-list">
        <li>Certificate of Rating or its equivalency</li>
      </ul>

      <p class="adm-modal-note">
        Once your application and requirements are verified, you'll receive a schedule for the
        College Admission Test. For inquiries, contact 0916-744-2456 or
        <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
      </p>
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
      <h2 class="adm-modal-title">Before You Apply</h2>
      <p class="adm-modal-lead">Transferees must have an existing and valid email address, together with the original and photocopy of the following requirements:</p>
      <ul class="adm-modal-list">
        <li>Transcript of Records or Certification of Grades</li>
        <li>Certification of Good Moral Character</li>
        <li>PSA / NSO Birth Certificate</li>
        <li>2x2 ID picture with a name tag and white background</li>
      </ul>

      <p class="adm-modal-note">
        Take the first step toward a brighter future with TAU. For inquiries, contact
        0916-744-2456 or <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
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
      <h2 class="adm-modal-title">Before You Apply</h2>
      <p class="adm-modal-lead">Second degree / second courser applicants must have an existing and valid email address, together with the original and photocopy of the following requirements:</p>
      <ul class="adm-modal-list">
        <li>Transcript of Records</li>
        <li>Certification of Good Moral Character</li>
        <li>PSA / NSO Birth Certificate</li>
        <li>2x2 ID picture with a name tag and white background</li>
      </ul>

      <p class="adm-modal-note">
        Take the first step toward a brighter future with TAU. For inquiries, contact
        0916-744-2456 or <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
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


<!-- ===================== AFTER YOU'RE ADMITTED / PASSED THE EXAM MODAL ===================== -->
<div class="adm-modal-overlay" id="admittedModal">
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
      <a href="<?= base_url('#enrollment-schedule') ?>" class="adm-btn" data-modal-close>View Enrollment Schedule</a>
      <a href="<?= base_url('#contact') ?>" class="adm-btn" data-modal-close>Contact Admissions and Registration</a>
    </div>
  </div>
</div>

<!-- ===================== SECTION: DEGREE PROGRAMS BY COLLEGE ===================== -->
  <section class="programs" id="programs-offered" aria-labelledby="programs-title">

    <div class="programs-head">
      <h2 class="adm-heading" id="programs-title">Degree programs by college</h2>
      <p class="enr-sub">Browse the programs offered by each college.</p>
    </div>

    <div class="college-col">
     <div class="college-list-panel">

      <?php foreach ($colleges as $ci => $c): ?>
        <?php
          // Degree programs only, so the count matches the hero figure
          $degreeCount = 0;
          foreach ($c['programs'] as $p) {
              if (trim($p[0]) !== '') {
                  $degreeCount++;
              }
          }
        ?>
        <section class="college-block"
                 id="<?= esc($c['code']) ?>"
                 aria-labelledby="<?= esc($c['code']) ?>-title">

          <div class="college-info">
            <button type="button"
                    class="college-toggle"
                    aria-expanded="false"
                    aria-controls="<?= esc($c['code']) ?>-panel">
              <span class="college-logo">
                <img src="<?= base_url('assets/Images/' . $c['logo']) ?>" alt="">
              </span>
              <span class="college-name" id="<?= esc($c['code']) ?>-title"><?= esc($c['name']) ?></span>
              <span class="college-count"><?= $degreeCount ?> program<?= $degreeCount === 1 ? '' : 's' ?></span>
              <span class="college-chev" aria-hidden="true">&rsaquo;</span>
            </button>

            <?php if (! empty($collegeFacebook[$c['code']])): ?>
              <a href="<?= esc($collegeFacebook[$c['code']]) ?>" class="college-link college-link--fb" target="_blank" rel="noopener">View Page</a>
            <?php endif; ?>
          </div>

          <div class="college-panel" id="<?= esc($c['code']) ?>-panel">
            <div class="college-panel-inner">
              <ul class="program-list">
                <?php foreach ($c['programs'] as $i => $p): ?>
                  <?php
                    // $p[0] = degree prefix, $p[1] = title, $p[2] = majors (array or JSON string, optional)
                    $majors = $p[2] ?? [];
                    if (is_string($majors)) {
                        $majors = json_decode($majors, true) ?: [];
                    }

                    $modalId = '';
                    if (! empty($majors)) {
                        $modalId = 'majorsModal-' . $c['code'] . '-' . $i;
                        $majorsModals[] = [
                            'id'     => $modalId,
                            'degree' => $p[0],
                            'title'  => $p[1],
                            'majors' => $majors,
                        ];
                    }
                  ?>
                  <li>
                    <div class="program-row">
                      <span class="program-text">
                        <?php if (trim($p[0]) !== ''): ?>
                          <span class="program-level"><?= esc($p[0]) ?></span>
                        <?php endif; ?>
                        <span class="program-name"><?= esc($p[1]) ?></span>
                      </span>

                      <?php if ($modalId !== ''): ?>
                        <button type="button" class="program-majors-btn" data-modal="<?= esc($modalId) ?>" aria-haspopup="dialog">
                          Majors <span aria-hidden="true">&rsaquo;</span>
                        </button>
                      <?php endif; ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

        </section>
      <?php endforeach; ?>

     </div>
    </div>

  </section>

<!-- ===================== SECTION: HOW YOU'RE APPLYING ===================== -->
  <section class="apply-types" id="how-to-apply" aria-labelledby="applicant-col-title">

    <div class="apply-types-head">
      <h2 class="adm-heading" id="applicant-col-title">How you're applying</h2>
      <p class="enr-sub">Pick your applicant type to see the requirements you'll need before you apply.</p>
    </div>

    <div class="apply-types-card">
      <ul class="applicant-type-list">
        <li>
          <button type="button" class="applicant-type" data-modal="freshmenModal">
            Freshmen Students <span aria-hidden="true">&rsaquo;</span>
          </button>
        </li>
        <li>
          <a href="#returnees" class="applicant-type">
            Returnees <span aria-hidden="true">&rsaquo;</span>
          </a>
        </li>
        <li>
          <a href="#shifters" class="applicant-type">
            Shifters <span aria-hidden="true">&rsaquo;</span>
          </a>
        </li>
        <li>
          <button type="button" class="applicant-type" data-modal="transfereesModal">
            Transferees <span aria-hidden="true">&rsaquo;</span>
          </button>
        </li>
        <li>
          <button type="button" class="applicant-type" data-modal="secondCourserModal">
            Second Degree <span aria-hidden="true">&rsaquo;</span>
          </button>
        </li>
        <li>
          <button type="button" class="applicant-type" data-modal="foreignModal">
            Foreign Students <span aria-hidden="true">&rsaquo;</span>
          </button>
        </li>
      </ul>

      <div class="apply-types-footer">
        <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>

        <div class="apply-types-passed">
          <p class="applicant-col-subnote">Already passed the entrance exam?</p>
          <button type="button" class="applicant-type applicant-type--alt" data-modal="admittedModal">
            Enrollment Steps <span aria-hidden="true">&rsaquo;</span>
          </button>
        </div>
      </div>
    </div>

  </section>


  <!-- ===================== COLLEGE ADMISSION TEST: REMINDERS ===================== -->
  <section class="cat-reminders" id="admission-test">
    <h2 class="adm-heading">College Admission Test</h2>
    <p class="enr-sub">Important reminders for applicants</p>

    <!-- venue + slip -->
    <div class="cat-grid cat-grid--2">
      <article class="cat-card">
        <h3 class="cat-card-title"><span class="cat-ico" aria-hidden="true">📍</span> Testing venue</h3>
        <p>The testing venue is at the <strong>TAU Amphitheater</strong>, located within the TAU Student and Alumni Center.</p>
        <p class="adm-modal-note">Applicants are expected to arrive at the venue at least 30 minutes before their scheduled test.</p>
      </article>

      <article class="cat-card">
        <h3 class="cat-card-title"><span class="cat-ico" aria-hidden="true">🎫</span> Your schedule is on your Admission Test Slip</h3>
        <p>Check the following details on your College Admission Test Slip:</p>
        <ul class="cat-chips">
          <li>Application no.</li>
          <li>Name</li>
          <li>Preferred program</li>
          <li>Major</li>
          <li>Test schedule</li>
          <li>Time</li>
          <li>Examination room</li>
        </ul>
      </article>
    </div>

    <!-- reminders -->
    <article class="cat-card cat-card--wide">
      <h3 class="cat-card-title"><span class="cat-ico" aria-hidden="true">⚠️</span> Important reminders</h3>
      <ul class="adm-modal-list">
        <li>
          Applicants for the following programs are scheduled for examination from 8:00 a.m. to 5:00 p.m.
          Kindly adhere strictly to the schedule indicated on your Admission Test Slip.
          <span class="adm-sub-note">
            Bachelor of Elementary Education &middot; Bachelor of Early Childhood Education &middot;
            Bachelor of Secondary Education &middot; Bachelor of Technology and Livelihood Education &middot;
            Bachelor of Science in Exercise and Sports Sciences
          </span>
        </li>
        <li>Only one examination schedule shall be assigned to each applicant. Failure to attend the assigned schedule shall result in the forfeiture of the application.</li>
        <li>The examination shall commence promptly at 8:00 a.m. for the morning session and 1:00 p.m. for the afternoon session.</li>
        <li>Late examinees shall not be admitted to the testing venue.</li>
        <li>Be reminded to observe the appropriate dress code.</li>
      </ul>
    </article>

    <!-- bring + dress code -->
    <div class="cat-grid cat-grid--2">
      <article class="cat-card">
        <h3 class="cat-card-title"><span class="cat-ico" aria-hidden="true">🎒</span> Kindly bring the following</h3>
        <ul class="cat-bring">
          <li><span aria-hidden="true">✏️</span> Pencil</li>
          <li><span aria-hidden="true">🧽</span> Eraser</li>
          <li><span aria-hidden="true">📐</span> Sharpener</li>
          <li><span aria-hidden="true">🍪</span> Snacks</li>
          <li><span aria-hidden="true">💧</span> Bottled water</li>
          <li><span aria-hidden="true">🪪</span> Valid ID</li>
          <li><span aria-hidden="true">🎫</span> Admission Test Slip (printed on A4 bond paper)</li>
          <li><span aria-hidden="true">📝</span> Printed, filled-out Application Form with 2x2 picture (A4 bond paper)</li>
        </ul>
      </article>

      <article class="cat-card">
        <h3 class="cat-card-title"><span class="cat-ico" aria-hidden="true">👕</span> Observe proper dress code</h3>
        <ul class="adm-modal-list">
          <li>Tops must cover shoulder to shoulder, and must be long enough to clearly overlap the belt line.</li>
          <li>Bottoms must be entirely covered, even when seated.</li>
          <li>The skirt must be below the knee.</li>
          <li>Considering the hot weather, it is recommended to dress in a way that is both suitable and comfortable.</li>
        </ul>
      </article>
    </div>
  </section>

  <!-- ===================== LIST OF PASSERS ===================== -->
  <section class="passers" id="passers">
    <h2 class="adm-heading">List of Passers</h2>
    <p class="enr-sub">College Admission Test results</p>

    <?php if (! empty($passers)): ?>
      <div class="passers-card">
        <?php foreach ($passers as $batch): ?>
          <div class="passers-batch">
            <h3 class="passers-batch-title"><?= esc($batch['label']) ?></h3>
            <ul class="passers-list">
              <?php foreach ($batch['names'] as $name): ?>
                <li><?= esc($name) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="passers-empty">
        <p>Results have not been posted yet. Check back after your scheduled test date, or watch the University's official pages for the announcement.</p>
      </div>
    <?php endif; ?>
  </section>

  <!-- ===================== ENROLLMENT SCHEDULE ===================== -->
  <?php if (! empty($enrollSchedule)): ?>
  <section class="enr-schedule" id="enrollment-schedule">
    <h2 class="adm-heading">Enrollment Schedule</h2>
    <p class="enr-sub">First Semester, AY 2026–2027</p>

    <div class="enr-card">
      <div class="enr-cal">
        <p class="enr-month"><?= date('F Y', mktime(0, 0, 0, $schedMonth, 1, $schedYear)) ?></p>
        <div class="enr-grid">
          <?php foreach (['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $dow): ?>
            <span class="enr-dow"><?= $dow ?></span>
          <?php endforeach; ?>

          <?php for ($b = 0; $b < $firstDow; $b++): ?><span></span><?php endfor; ?>

          <?php for ($d = 1; $d <= $daysInMonth; $d++): ?>
            <?php if (isset($enrollSchedule[$d])): ?>
              <button type="button" class="enr-day is-enroll<?= $d === $firstDay ? ' is-active' : '' ?>" data-day="<?= $d ?>"><?= $d ?></button>
            <?php else: ?>
              <span class="enr-day"><?= $d ?></span>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
      </div>

      <div class="enr-divider" aria-hidden="true"></div>

      <div class="enr-detail">
        <?php foreach ($enrollSchedule as $d => $sessions): ?>
          <div class="enr-panel<?= $d === $firstDay ? ' is-active' : '' ?>" id="enr-panel-<?= $d ?>">
            <h3 class="enr-date"><?= date('F j, Y (l)', mktime(0, 0, 0, $schedMonth, $d, $schedYear)) ?></h3>
            <?php foreach ($sessions as $slot => $programs): ?>
              <div class="enr-session">
                <p class="enr-slot"><?= $slot === 'AM' ? 'Morning (AM)' : 'Afternoon (PM)' ?></p>
                <ul class="enr-list">
                  <?php foreach ($programs as $prog): ?>
                    <li><?= esc($prog) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>


<!-- ===================== MAJORS MODALS (one per program that has majors) ===================== -->
<?php foreach ($majorsModals as $mm): ?>
<div class="adm-modal-overlay" id="<?= esc($mm['id']) ?>">
  <div class="adm-modal">
    <button type="button" class="adm-modal-close" data-modal-close aria-label="Close">&times;</button>

    <div class="adm-modal-body">
      <h2 class="adm-modal-title">Available Majors</h2>
      <p class="adm-modal-lead"><?= esc(trim($mm['degree'] . ' ' . $mm['title'])) ?></p>
      <ul class="adm-modal-list">
        <?php foreach ($mm['majors'] as $major): ?>
          <li><?= esc($major) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="adm-modal-actions">
      <button type="button" class="adm-btn" data-modal-close>Close</button>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- ===================== APPLY NOW ===================== -->
  <section class="adm-apply-final" id="apply-now">
    <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
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
          <li><a href="<?= base_url('departments/coed') ?>">College of Education</a></li>
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