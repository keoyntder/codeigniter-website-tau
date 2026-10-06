<?php
$office = $office ?? [
    'label'    => 'Planning and Development',
    'director' => ['Director, Planning and Development', 'Dr. Eugene S. Valeriano', null], 
    'overview' => 'The Planning and Development Office shall establish a functional system database about organizations, programs, activities, linkages and other related operations vital to a functional Management Information Systems (MIS); spearhead and facilitate planning activities; develop Information Systems to improve efficiency in the provision of services to clients; ensure an efficient and systematic documentation; ensure quality and efficient implementation of institutional infrastructure development projects; develop quality project/development proposals for funding; and conduct monitoring and evaluation of planned activities/targets for a systematic and well-directed University operations.',
    'goals'    => [
        'Establish a functional system of data management about organizations, programs, activities, linkages and other related operations vital to a functional management information systems;',
        'Develop and operationalize communication and IT systems to improve efficiency in the provision of services to clients;',
        'Project a positive image of the University by providing credible information and comprehensive documentation of institutional accomplishments;',
        'Ensure quality and efficient implementation of institutional/infrastructure development projects;',
        'Spearhead and facilitate institutional planning activities;',
        'Develop quality project and/or development proposals for funding;',
        'Conduct monitoring and evaluation of planned activities/targets for a systematic and well-directed University operations;',
        'Uphold work values such as teamwork, commitment, accountability and unity.',
    ],
    'units'    => [
        'Infrastructure Development, Land Use & Zoning (IDLUZ)' => [
            'Prepare infrastructure and building designs and plans;',
            'Prepare program of works, detailed estimates, structural analyses and construction schedules;',
            'Supervise and monitor University construction projects;',
            'Submit periodic reports regarding progress of work and evaluate actual cost of infrastructure projects;',
            'Advise the President through the Director of Planning and Development about the general status, conditions and concerns regarding infrastructures and all other university facilities;',
            'Monitor and update land use, zoning maps and campus development plans;',
            'Ensure that physical facilities/infrastructure conform to the provisions of the Campus Master Plan and the standard building codes;',
            'Assist the Budget Office in the preparation of Budget Proposal for Capital Outlay; and',
            'Perform other duties as may be assigned by higher authorities.',
        ],
        'Institutional Development and Resource Generation (IDRG)' => [
            'Review, develop and implement policies, guidelines, procedures align to University\'s vision, mission, goals and objectives;',
            'Prepare and review feasibility studies and project/development proposals for funding;',
            'Facilitate the consolidation and preparation of necessary data and information relative to University reports such as Normative Funding (NF), SUC Levelling, Performance-Based Bonus (PBB), Performance-Informed Bonus (PIB), and Strategic Performance Management System (SPMS) for yearly submission to various government agencies such as Commission on Higher Education (CHED), Department of Budget and Management (DBM) and other concerned agencies;',
            'Facilitate the assessment/certification processes of the ISO and other quality management system evaluation in coordination with the Office of Internal Audit and Quality Assurance;',
            'Document different programs and events / activities of the University in coordination with the Management Information Systems Unit;',
            'Manage the acquisition and utilization of multimedia equipment in the University; and',
            'Perform other related functions as may be deemed necessary.',
        ],
        'Management Information Systems (MIS)' => [
            'Develop, test, deploy, update and monitor software applications and innovative information systems for the use of academic, administrative and research activities;',
            'Plan preventive maintenance for hardware, software and create a backup and recovery policy;',
            'Maintain and set up user accounts for automated systems of the University (User Administration);',
            'Ensure the efficiency and security of centralized ICT functions including telecommunications, networks, web services and other IT infrastructure support services;',
            'Ensure the uptime of online systems but not limited to academic applications such as online learning systems and its requisites;',
            'Ensure compliance with all standards relating to ICT security and data protection;',
            'Diagnose and resolve any database issues with systems or servers as and when failures occur;',
            'Identify performance improvements to database procedures and data structures working with the programmer to deliver code changes;',
            'Facilitate archiving of documents for a functional database of valuable data for retrieval and processing; and',
            'Perform other duties as may be assigned by higher authorities.',
        ],
    ],
    // Organizational chart image in assets/Images/ (e.g. 'pd-org-chart.png). null → placeholder text.
    'orgchart' => null,
];

// Sidebar sections (slug => label)
$sections = [
    'goals'                   => 'Goals',
    'functions'               => 'Functions',
    'organizational-structure' => 'Organizational Structure',
];

$card = static function (string $title, string $name, ?string $img): string {
    $imgTag = $img
        ? '<img src="' . base_url('assets/Images/' . $img) . '" alt="' . esc($name, 'attr') . '" loading="lazy" onerror="this.remove()">'
        : '';
    return '<li class="official">'
        . '<div class="official-photo"><svg aria-hidden="true"><use href="#official-person"/></svg>' . $imgTag . '</div>'
        . '<div class="official-plate"><p class="official-title">' . esc($title) . '</p>'
        . '<p class="official-name">' . esc($name) . '</p></div></li>';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= esc($office['label']) ?> | Tarlac Agricultural University</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&family=Source+Serif+4:wght@400;500&display=swap" rel="stylesheet">

<!-- Order matters: admissions.css (layout) first, about.css (content) after -->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admissions.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/about.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/planning_development.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">

</head>
<body>

<?= $this->include('partials/loader') ?>
<?= $this->include('partials/header') ?>

<main class="admissions-page about-page" data-hash-sync="true">
  <div class="adm-layout">

    <!-- ===================== SIDEBAR NAV ===================== -->
    <aside class="adm-sidebar">
      <nav class="adm-nav" aria-label="<?= esc($office['label'], 'attr') ?>">
        <div class="adm-nav-list">
          <?php $first = true; foreach ($sections as $slug => $label): ?>
            <a href="#<?= $slug ?>" class="adm-nav-btn<?= $first ? ' active' : '' ?>" data-panel="<?= $slug ?>"<?= $first ? ' aria-current="page"' : '' ?>><?= esc($label) ?></a>
          <?php $first = false; endforeach; ?>
        </div>

        <select class="adm-nav-select" aria-label="Choose a section">
          <?php foreach ($sections as $slug => $label): ?>
            <option value="<?= $slug ?>"><?= esc($label) ?></option>
          <?php endforeach; ?>
        </select>
      </nav>
    </aside>

    <!-- ===================== CONTENT ===================== -->
    <div class="adm-content">

      <svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
        <symbol id="official-person" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"/></symbol>
      </svg>

      <!-- ===================== GOALS ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="goals" data-panel="goals" aria-label="Goals">
        <header class="catalog-head"><h2 class="catalog-title">Goals</h2></header>

        <div class="office-body">
          <?php if (!empty($office['goals'])): ?>
          <section class="sf-section">
            <div class="strategic-goals-grid">
              <?php foreach (array_chunk($office['goals'], (int) ceil(count($office['goals']) / 2), true) as $chunk): ?>
              <div class="goal-column">
                <ul>
                  <?php foreach ($chunk as $n => $goal): ?>
                    <li><strong>G<?= $n + 1 ?></strong> <?= esc($goal) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
          </section>
          <?php else: ?>
          <section class="sf-section">
            <p class="office-overview">Replace this with the goals of the <?= esc($office['label']) ?>.</p>
          </section>
          <?php endif; ?>
        </div>
      </section>

      <!-- ===================== FUNCTIONS ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="functions" data-panel="functions" aria-label="Functions" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Functions</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <h3 class="sf-section-title">Functional Structure</h3>
            <?php if (!empty($office['overview'])): ?>
              <p class="office-overview"><?= esc($office['overview']) ?></p>
            <?php else: ?>
              <p class="office-overview">Replace this with a short description of the <?= esc($office['label']) ?> &mdash; what it does and who it serves.</p>
            <?php endif; ?>
          </section>

          <?php if (!empty($office['units'])): ?>
          <section class="sf-section">
            <h3 class="sf-section-title">Functions of the Different Units</h3>
            <?php foreach ($office['units'] as $unit => $functions): ?>
              <div class="office-unit">
                <h4><?= esc($unit) ?></h4>
                <ul>
                  <?php foreach ($functions as $fn): ?><li><?= esc($fn) ?></li><?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </section>
          <?php endif; ?>
        </div>
      </section>

      <!-- ===================== ORGANIZATIONAL STRUCTURE ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="organizational-structure" data-panel="organizational-structure" aria-label="Organizational Structure" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Organizational Structure</h2></header>

        <div class="officials">
          <ul class="officials-tier officials-tier--president">
            <?= $card($office['director'][0], $office['director'][1], $office['director'][2]) ?>
          </ul>
        </div>

        <div class="office-body">
          <section class="sf-section">
            <?php if (!empty($office['orgchart'])): ?>
              <img src="<?= base_url('assets/Images/sireugene' . $office['orgchart']) ?>" alt="<?= esc($office['label'], 'attr') ?> organizational chart" loading="lazy" style="max-width:100%;height:auto;">
            <?php else: ?>
            <?php endif; ?>
          </section>
        </div>
      </section>

    </div><!-- /.adm-content -->
  </div><!-- /.adm-layout -->
</main>

<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>