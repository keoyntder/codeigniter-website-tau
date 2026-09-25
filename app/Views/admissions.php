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
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">

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
      <a href="#enrollment-process" class="quick-jump-btn">Enrollment Process</a>
    </div>
  </section>

  <!-- ===================== SECTION: DEGREE PROGRAMS BY COLLEGE ===================== -->
  <section class="programs" id="programs-offered" aria-labelledby="programs-title">

    <div class="programs-head">
      <h2 class="adm-heading" id="programs-title">Degree programs by college</h2>
      <p class="enr-sub">Browse the programs offered by each college.</p>
    </div>

    <div class="college-col">
     <div class="college-list-panel">

      <?php
        $collegeCols = array_chunk($colleges, max(1, (int) ceil(count($colleges) / 2)), true);
      ?>
      <?php foreach ($collegeCols as $colColleges): ?>
      <div class="college-half">
      <?php foreach ($colColleges as $c): ?>
        <section class="college-block"
                 id="<?= esc($c['code']) ?>"
                 aria-labelledby="<?= esc($c['code']) ?>-title">

          <div class="college-info">
            <div class="college-toggle">
              <span class="college-logo">
                <img src="<?= base_url('assets/Images/' . $c['logo']) ?>" alt="">
              </span>
              <span class="college-name" id="<?= esc($c['code']) ?>-title"><?= esc($c['name']) ?></span>
            </div>
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
      <?php endforeach; ?>

     </div>
    </div>

  </section>


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
    </div>

  </section>



  <!-- ===================== COLLEGE ADMISSION TEST: REMINDERS ===================== -->
  <section class="cat-reminders" id="admission-test">
    <h2 class="adm-heading">College Admission Test</h2>
    <p class="enr-sub">Important reminders for applicants</p>

    <!-- venue + slip -->
    <div class="cat-grid cat-grid--2">
      <article class="cat-card">
        <h3 class="cat-card-title">Testing venue</h3>
        <p>The testing venue is at the <strong>TAU Amphitheater</strong>, located within the TAU Student and Alumni Center.</p>
        <p class="adm-modal-note">Applicants are expected to arrive at the venue at least 30 minutes before their scheduled test.</p>
      </article>

      <article class="cat-card">
        <h3 class="cat-card-title">Your schedule is on your Admission Test Slip</h3>
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
      <h3 class="cat-card-title">Important reminders</h3>
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
        <h3 class="cat-card-title">Kindly bring the following</h3>
        <ul class="cat-bring">
          <li><span aria-hidden="true"></span> Pencil</li>
          <li><span aria-hidden="true"></span> Eraser</li>
          <li><span aria-hidden="true"></span> Sharpener</li>
          <li><span aria-hidden="true"></span> Snacks</li>
          <li><span aria-hidden="true"></span> Bottled water</li>
          <li><span aria-hidden="true"></span> Valid ID</li>
          <li><span aria-hidden="true"></span> Admission Test Slip (printed on A4 bond paper)</li>
          <li><span aria-hidden="true"></span> Printed, filled-out Application Form with 2x2 picture (A4 bond paper)</li>
        </ul>
      </article>

      <article class="cat-card">
        <h3 class="cat-card-title">Observe proper dress code</h3>
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

    <!-- ===================== ENROLLMENT PROCESS ===================== -->
  <section class="enrollment-process" id="enrollment-process">
    <h2 class="adm-heading">Enrollment Process</h2>
    <p class="enr-sub">Requirements and steps for qualified incoming first-year students</p>

    <div class="enrp-grid">
      <div class="enrp-card">
        <div class="enrp-card-head">
          <span class="enrp-ico"><i class="ti ti-file-text" aria-hidden="true"></i></span>
          <span>Requirements to bring</span>
        </div>
        <ul class="enrp-checklist">
          <li><i class="ti ti-check" aria-hidden="true"></i> Printed copy of the Notice of Admission</li>
          <li><i class="ti ti-check" aria-hidden="true"></i> Original Grade 12 Report Card / Form 138 or its equivalent</li>
          <li><i class="ti ti-check" aria-hidden="true"></i> Original latest Certificate of Good Moral Character</li>
          <li><i class="ti ti-check" aria-hidden="true"></i> One (1) copy of latest 2x2 ID picture with name tag</li>
          <li><i class="ti ti-check" aria-hidden="true"></i> Photocopy of PSA Birth Certificate</li>
        </ul>
      </div>

      <div class="enrp-card">
        <div class="enrp-card-head">
          <span class="enrp-ico"><i class="ti ti-info-circle" aria-hidden="true"></i></span>
          <span>General guidelines</span>
        </div>
        <p class="enrp-note">Only qualified applicants who have confirmed their slots shall be allowed to enroll.</p>
        <p class="enrp-note">Qualified transferees are advised to wait for the official announcement regarding their enrolment schedule.</p>
        <p class="enrp-note">The prescribed enrolment schedule shall be strictly observed — missing it may only be accommodated during the designated late enrolment period.</p>
        <div class="enrp-contact">
          <span><i class="ti ti-phone" aria-hidden="true"></i> 0916-744-2456</span>
          <span><i class="ti ti-mail" aria-hidden="true"></i> <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a></span>
        </div>
      </div>
    </div>

    <div class="enrp-steps-card">
      <p class="enrp-steps-title">Enrolment procedure</p>
      <div class="enrp-steps">
        <div class="enrp-step">
          <div class="enrp-step-num">1</div>
          <i class="ti ti-door-enter" aria-hidden="true"></i>
          <span>Present the Notice of Admission at the TAU Main Gate</span>
        </div>
        <div class="enrp-step">
          <div class="enrp-step-num">2</div>
          <i class="ti ti-users" aria-hidden="true"></i>
          <span>Queue for registration at the Learning Resource Center Atrium</span>
        </div>
        <div class="enrp-step">
          <div class="enrp-step-num">3</div>
          <i class="ti ti-clipboard-check" aria-hidden="true"></i>
          <span>Submit requirements at the Admission and Registration Services Office</span>
        </div>
        <div class="enrp-step">
          <div class="enrp-step-num">4</div>
          <i class="ti ti-cash" aria-hidden="true"></i>
          <span>Validate your Certificate of Registration at the Accounting Office</span>
        </div>
        <div class="enrp-step enrp-step--final">
          <div class="enrp-step-num">5</div>
          <i class="ti ti-certificate" aria-hidden="true"></i>
          <span>Claim your COR at the Admin Building</span>
        </div>
      </div>

      <p class="enrp-steps-note">While waiting at Step 3, students are requested to complete the ID processing form. Step 5 takes place at the Admin Building — Admission and Registration Services. Incoming students are advised to regularly monitor the University's official communication platforms for additional announcements and updates.</p>
    </div>
  </section>

</main>


<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>