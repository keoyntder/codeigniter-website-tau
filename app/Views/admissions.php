<?php
$colleges       = $colleges ?? [];
$enrollSchedule = $enrollSchedule ?? [];
$passers        = $passers ?? [];
$schedYear      = $schedYear ?? (int) date('Y');
$schedMonth     = $schedMonth ?? (int) date('n');

$downloadsDir = 'assets/downloads/';
$downloads    = $downloads ?? [
    [
        'group' => 'Application for Admission',
        'files' => [
            ['title' => 'Application for Admission: Laboratory School',   'note' => 'TAU-ARS-QF-01', 'file' => 'TAU-ARS-QF-01'],
            ['title' => 'Application for Admission: Undergraduate',       'note' => 'TAU-ARS-QF-02', 'file' => 'TAU-ARS-QF-02'],
            ['title' => 'Application for Admission: Foreign Student',     'note' => 'TAU-ARS-QF-03', 'file' => 'TAU-ARS-QF-03'],
            ['title' => 'Application for Admission: Graduate Programs',   'note' => 'TAU-ARS-QF-04', 'file' => 'TAU-ARS-QF-04'],
        ],
    ],
    [
        'group' => 'Others',
        'files' => [
            ['title' => 'Dropping / Changing / Adding Form', 'note' => 'AR Form No. 12',   'file' => 'AR-Form-No.-12'],
            ['title' => 'Shifting Form',                     'note' => '',                 'file' => 'SHIFTING-FORM'],
            ['title' => 'Completion Form',                   'note' => '',                 'file' => 'COMPLETION-FORM'],
            ['title' => 'Application for Graduation Form',   'note' => '',                 'file' => 'Application-for-Graduation-Form'],
            ['title' => 'Leave of Absence Form',             'note' => 'Graduate Program', 'file' => 'Leave-of-Absence-Form'],
            ['title' => 'Request Form',                      'note' => '',                 'file' => 'REQUEST-FORM'],
            ['title' => 'ARS Service Request Form',          'note' => '',                 'file' => 'ARS-Service-Request-Form'],
            ['title' => 'Procedure for Requests of Adding of Subjects', 'note' => '',      'file' => 'Procedure-for-Requests'],
        ],
    ],
];

$downloadsPath = rtrim(FCPATH, '/\\') . '/' . $downloadsDir;
foreach ($downloads as $gi => $g) {
    foreach ($g['files'] as $fi => $f) {
        $hits = glob($downloadsPath . $f['file'] . '*') ?: [];
        $hits = array_map('basename', array_filter($hits, 'is_file'));
        usort($hits, static fn ($a, $b) => strlen($a) <=> strlen($b));

        if ($hits) {
            $downloads[$gi]['files'][$fi]['file'] = $hits[0];
        } else {
            unset($downloads[$gi]['files'][$fi]);
        }
    }
    if (empty($downloads[$gi]['files'])) {
        unset($downloads[$gi]);
    } else {
        $downloads[$gi]['files'] = array_values($downloads[$gi]['files']);
    }
}
$downloads = array_values($downloads);

$firstDow    = (int) date('w', mktime(0, 0, 0, $schedMonth, 1, $schedYear));
$daysInMonth = (int) date('t', mktime(0, 0, 0, $schedMonth, 1, $schedYear));
$firstDay    = array_key_first($enrollSchedule);

$totalPrograms = 0;
foreach ($colleges as $c) {
    foreach ($c['programs'] as $p) {
        if (trim($p[0]) !== '') {
            $totalPrograms++;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission and Registration Services | Tarlac Agricultural University</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&family=Source+Serif+4:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admissions.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">


</head>
<body>

<?= $this->include('partials/loader') ?>
<?= $this->include('partials/header') ?>

<main class="admissions-page" data-hash-sync="true">

  <div class="adm-layout">

    <!-- ===================== SIDEBAR NAV ===================== -->
    <aside class="adm-sidebar">
      <nav class="adm-nav" aria-label="Admissions sections">
        <div class="adm-nav-list">
          <a href="#programs-offered" class="adm-nav-btn active" data-panel="programs-offered" aria-current="page">Programs Offered</a>
          <a href="#how-to-apply" class="adm-nav-btn" data-panel="how-to-apply">Application Requirements</a>
          <a href="#admission-test" class="adm-nav-btn" data-panel="admission-test">Admission Test</a>
          <a href="#passers" class="adm-nav-btn" data-panel="passers">List of Passers</a>
          <a href="#enrollment-schedule" class="adm-nav-btn" data-panel="enrollment-schedule">Enrollment Schedule</a>
          <a href="#enrollment-process" class="adm-nav-btn" data-panel="enrollment-process">Enrollment Process</a>
          <a href="#downloadables" class="adm-nav-btn" data-panel="downloadables">Downloadables</a>
        </div>

        <select class="adm-nav-select" aria-label="Choose a section">
          <option value="programs-offered">Programs Offered</option>
          <option value="how-to-apply">Application Requirements</option>
          <option value="admission-test">Admission Test</option>
          <option value="passers">List of Passers</option>
          <option value="enrollment-schedule">Enrollment Schedule</option>
          <option value="enrollment-process">Enrollment Process</option>
          <option value="downloadables">Downloadables</option>
        </select>
      </nav>
    </aside>

    <!-- ===================== CONTENT (the only part that scrolls) ===================== -->
    <div class="adm-content">

      <!-- ===================== SECTION: PROGRAMS OFFERED ===================== -->
      <section class="programs admissions-panel" id="programs-offered" data-panel="programs-offered" aria-label="Programs offered">
        <div class="catalog">

          <header class="catalog-head">
            <h2 class="catalog-title">Degree Programs</h2>
          </header>

          <?php foreach ($colleges as $c): ?>
            <?php
              $degreeCount = 0;
              foreach ($c['programs'] as $p) {
                  if (trim($p[0]) !== '') { $degreeCount++; }
              }
            ?>
            <section class="catalog-college" id="<?= esc($c['code'], 'attr') ?>" aria-labelledby="<?= esc($c['code'], 'attr') ?>-title">

              <div class="catalog-college-info">
                <h3 class="catalog-college-name" id="<?= esc($c['code'], 'attr') ?>-title"><?= esc($c['name']) ?></h3>
              </div>

              <ol class="catalog-programs">
                <?php foreach ($c['programs'] as $p): ?>
                  <?php
                    $majors = $p[2] ?? [];
                    if (is_string($majors)) {
                        $majors = json_decode($majors, true) ?: [];
                    }
                    $level = trim((string) $p[0]);
                    $label = ($level !== '' ? $level . ' ' : '') . $p[1];
                  ?>
                  <li class="catalog-program">
                    <?php if (! empty($majors)): ?>
                      <details class="catalog-details">
                        <summary>
                          <span class="catalog-program-name"><?= esc($label) ?></span>
                          <span class="catalog-majors-toggle">majors</span>
                        </summary>
                        <ul class="catalog-majors">
                          <?php foreach ($majors as $major): ?>
                            <li><?= esc($major) ?></li>
                          <?php endforeach; ?>
                        </ul>
                      </details>
                    <?php else: ?>
                      <span class="catalog-program-name"><?= esc($label) ?></span>
                    <?php endif; ?>
                  </li>
                <?php endforeach; ?>
              </ol>

            </section>
          <?php endforeach; ?>

        </div>
      </section>


      <!-- ===================== SECTION: APPLICATION REQUIREMENTS ===================== -->
      <section class="apply-types admissions-panel" id="how-to-apply" data-panel="how-to-apply" aria-label="Application requirements" hidden>

        <header class="catalog-head">
          <h2 class="catalog-title">Application Requirements</h2>
        </header>

        <aside class="apply-notice" role="note">
          <p>All applicants must have an existing and valid email address, together with the original and photocopy of the requirements listed under their category.</p>
        </aside>

        <div class="apply-cards">

          <article class="apply-card">
            <h3 class="apply-card-title">Freshmen Students</h3>

            <h4 class="apply-panel-subhead">For incoming first-year students</h4>
            <ul class="adm-modal-list">
              <li>Grade 12 Report Card / Form 138 / Report of Grades (1st Quarter and 2nd Quarter grades, or First Semester grades only) duly signed by the Adviser, School Principal, or School Registrar</li>
              <li>Certificate of Registration or Certificate of Enrolment for enrolled Grade 12 students</li>
              <li>Certification of Good Moral Character</li>
              <li>PSA / NSO Birth Certificate</li>
              <li>Certificate of Indigency (if applicable)</li>
              <li>Annual Income Tax Return of parents (if applicable)</li>
              <li>2x2 ID picture with a name tag and white background</li>
            </ul>

            <h4 class="apply-panel-subhead">For Alternative Learning System (ALS) graduates</h4>
            <ul class="adm-modal-list">
              <li>Certificate of Rating or its equivalency</li>
            </ul>

            <p class="adm-modal-note">
              Once your application and requirements are verified, you'll receive a schedule for the
              College Admission Test. For inquiries, contact 0916-744-2456 or
              <a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a>.
            </p>
          </article>

          <article class="apply-card">
            <h3 class="apply-card-title">Transferees</h3>
            <ul class="adm-modal-list">
              <li>Transcript of Records or Certification of Grades</li>
              <li>Certification of Good Moral Character</li>
              <li>PSA / NSO Birth Certificate</li>
              <li>2x2 ID picture with a name tag and white background</li>
            </ul>
          </article>

          <article class="apply-card">
            <h3 class="apply-card-title">Second Degree</h3>
            <ul class="adm-modal-list">
              <li>Transcript of Records</li>
              <li>Certification of Good Moral Character</li>
              <li>PSA / NSO Birth Certificate</li>
              <li>2x2 ID picture with a name tag and white background</li>
            </ul>
          </article>

          <article class="apply-card">
            <h3 class="apply-card-title">Foreign Student</h3>
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
          </article>

        </div>

        <div class="apply-section-actions">
          <a href="http://tau.edu.ph:8083/OnlineAdmissionV2t/" class="adm-btn adm-btn--apply" target="_blank" rel="noopener">Apply</a>
          <a href="<?= base_url('#contact') ?>" class="adm-btn">Contact Admissions and Registration</a>
        </div>

      </section>


      <!-- ===================== COLLEGE ADMISSION TEST: REMINDERS ===================== -->

      <section class="cat-reminders admissions-panel" id="admission-test" data-panel="admission-test" hidden>

      <header class="catalog-head">
          <h2 class="catalog-title">College Admission Test Reminders</h2>
        </header>

      <div class="cat-sheet">
          <ul class="cat-stats">
            <li class="cat-stat">
              <p class="cat-stat-num">30<span>min</span></p>
              <p class="cat-stat-label">Arrive before your schedule</p>
            </li>
            <li class="cat-stat">
              <p class="cat-stat-num">8:00<span>a.m.</span></p>
              <p class="cat-stat-label">Morning session begins</p>
            </li>
            <li class="cat-stat">
              <p class="cat-stat-num">1:00<span>p.m.</span></p>
              <p class="cat-stat-label">Afternoon session begins</p>
            </li>
          </ul>

          <div class="cat-details">
            <div class="cat-detail">
              <h3 class="cat-detail-label">Testing venue</h3>
              <p>The testing venue is at the <strong>TAU Amphitheater</strong>, located within the TAU Student and Alumni Center.</p>
              <p class="cat-note">Applicants are expected to arrive at the venue at least 30 minutes before their scheduled test.</p>
            </div>

            <div class="cat-detail">
              <h3 class="cat-detail-label">Observe proper dress code</h3>
              <ul class="cat-list">
                <li>Tops must cover shoulder to shoulder, and must be long enough to clearly overlap the belt line.</li>
                <li>Bottoms must be entirely covered, even when seated.</li>
                <li>The skirt must be below the knee.</li>
                <li>Considering the hot weather, it is recommended to dress in a way that is both suitable and comfortable.</li>
              </ul>
            </div>
          </div>

          <div class="cat-rows">

            <div class="cat-detail">
              <h3 class="cat-detail-label">Kindly bring</h3>
              <ul class="cat-list">
                <li>Pencil</li>
                <li>Eraser</li>
                <li>Sharpener</li>
                <li>Snacks</li>
                <li>Bottled water</li>
                <li>Valid ID</li>
                <li>
                  Admission Test Slip (printed on A4 bond paper)
                  <span class="adm-sub-note">
                    Your schedule is on your slip. Check the following details on your College Admission Test Slip:
                  </span>
                  <ul class="cat-chips">
                    <li>Application no.</li>
                    <li>Name</li>
                    <li>Preferred program</li>
                    <li>Major</li>
                    <li>Test schedule</li>
                    <li>Time</li>
                    <li>Examination room</li>
                  </ul>
                </li>
                <li>Printed, filled-out Application Form with 2x2 picture (A4 bond paper)</li>
              </ul>
            </div>

            <div class="cat-detail cat-detail--rules">
              <h3 class="cat-detail-label">Important reminders</h3>
              <ul class="cat-list">
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
            </div>

          </div>

        </div>
      </section>

      <!-- ===================== LIST OF PASSERS ===================== -->
      <section class="passers admissions-panel" id="passers" data-panel="passers" hidden>

      <header class="catalog-head">
          <h2 class="catalog-title">List of Passers</h2>
        </header>


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
      <section class="enr-schedule admissions-panel" id="enrollment-schedule" data-panel="enrollment-schedule" hidden>

      <header class="catalog-head">
          <h2 class="catalog-title">Enrollment Schedule</h2>
        </header>

      <p class="enr-sub">First Semester, AY 2026–2027</p>

        <?php if (! empty($enrollSchedule)): ?>
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
        <?php else: ?>
        <div class="passers-empty">
          <p>The enrollment schedule has not been posted yet. Check back soon, or watch the University's official pages for the announcement.</p>
        </div>
        <?php endif; ?>
      </section>

      <!-- ===================== ENROLLMENT PROCESS ===================== -->
      <section class="enrollment-process admissions-panel" id="enrollment-process" data-panel="enrollment-process" hidden>

      <header class="catalog-head">
          <h2 class="catalog-title">Enrollment Process</h2>
        </header>

      <div class="enrp-grid">
          <div class="enrp-card">
            <div class="enrp-card-head"><span>Requirements to bring</span></div>
            <ul class="enrp-checklist">
              <li>Printed copy of the Notice of Admission</li>
              <li>Original Grade 12 Report Card / Form 138 or its equivalent</li>
              <li>Original latest Certificate of Good Moral Character</li>
              <li>One (1) copy of latest 2x2 ID picture with name tag</li>
              <li>Photocopy of PSA Birth Certificate</li>
            </ul>
          </div>

          <div class="enrp-card">
            <div class="enrp-card-head"><span>General guidelines</span></div>
            <p class="enrp-note">Only qualified applicants who have confirmed their slots shall be allowed to enroll.</p>
            <p class="enrp-note">Qualified transferees are advised to wait for the official announcement regarding their enrolment schedule.</p>
            <p class="enrp-note">The prescribed enrolment schedule shall be strictly observed — missing it may only be accommodated during the designated late enrolment period.</p>
            <div class="enrp-contact">
              <span>0916-744-2456</span>
              <span><a href="mailto:admission@tau.edu.ph">admission@tau.edu.ph</a></span>
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
        </div>
      </section>

      <!-- ===================== DOWNLOADABLES ===================== -->
      <section class="downloads admissions-panel" id="downloadables" data-panel="downloadables" aria-label="Downloadables" hidden>

        <header class="catalog-head">
          <h2 class="catalog-title">Downloadables</h2>
        </header>

        <?php if (! empty($downloads)): ?>
          <?php foreach ($downloads as $g): ?>
            <section class="dl-group">
              <h3 class="dl-group-name"><?= esc($g['group']) ?></h3>

              <ul class="dl-list">
                <?php foreach ($g['files'] as $f): ?>
                  <li class="dl-item">
                    <div class="dl-info">
                      <span class="dl-title"><?= esc($f['title']) ?></span>
                      <?php if (! empty($f['note'])): ?>
                        <span class="adm-sub-note"><?= esc($f['note']) ?></span>
                      <?php endif; ?>
                    </div>
                    <a class="adm-btn adm-btn--ghost dl-btn" href="<?= base_url($downloadsDir . rawurlencode($f['file'])) ?>" download>
                      Download
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="passers-empty">
            <p>No downloadable files have been posted yet. Check back soon.</p>
          </div>
        <?php endif; ?>

      </section>

    </div>

  </div>

</main>

<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>