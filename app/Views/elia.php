<?php
// Office of External Linkages and International Affairs (ELIA) — one office, one page.
// The sidebar switches between its sections.
$office = [
    'label' => 'Office of External Linkage and International Affairs',
];

// Sidebar sections (slug => label)
$sections = [
    'history'                                 => 'History',
    'about-elia'                              => 'About ELIA',
    'function'                                => 'Function',
    'internalization-and-linkaging'           => 'Internalization and Linkaging',
    'institutional-membership-and-affiliations' => 'Institutional Membership and Affiliations',
];

$functions = [
    'formulation of plans and strategies relative to the development of partnerships with external organizations and institutions;',
    'initiation of development of linkages with local and international institutions and organizations;',
    'recommendation of areas or levels of partnership to the College President that TCA should enter into with specific institutions and organizations in order to optimize opportunities for the College;',
    'coordination of initiatives of the different units of the College relative to external linkages;',
    'facilitation of the formalization of agreement between TCA and its partners or networks;',
    'monitoring of the status of all networking and linkaging activities of the College; and',
    'regular preparation of consolidated report relative to the status of partnership or collaboration of TCA with external organizations or institutions.',
];

$memberships = [
    'Academic Network of Psychology and Social Science Department',
    'Accrediting Agency of Chartered State Colleges and Universities in the Philippines',
    'Asian Association of Veterinary Schools',
    'Association of Colleges of Agriculture in the Philippines',
    'Central Luzon Agriculture and Resources Research and Development Consortium',
    'Council for Economics Educators',
    'Council of Deans of Colleges of Education in Region III',
    'Global Workers and Family Federation Inc.',
    'Graduate Education Association of Chartered Colleges and Universities in Region III',
    'Institute of International Education',
    'International Society for Southeast Asian Agricultural Sciences',
    'Management Association of the Philippines',
    'National Seed Industry Council',
    'Philippine Association for Graduate Education',
    'Philippine Association of Extension Program Implementers',
    'Philippine Association of State Universities and Colleges',
    'Philippine Association of Teacher Education (Region III)',
    'Philippine Association of Veterinary Medicine Educators and Schools, Inc.',
    'Philippine Guidance and Counseling Association',
    'Philippine Science Consortium',
    'Philippine Society of Information Technology Educators',
    'Psychological Association of the Philippines',
    'State Universities and Colleges Teacher Education Institution, Inc. – Region III',
    'United Nations Educational, Scientific and Cultural Organization',
    'University Mobility in Asia and the Pacific Council',
];
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

      <!-- ===================== HISTORY ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="history" data-panel="history" aria-label="History">
        <header class="catalog-head"><h2 class="catalog-title">History of the Office of External Linkages and International Affairs (ELIA)</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <p class="office-overview">The requirements of internationalization, the desire for network expansion and the demands to widen global reach have prompted the Tarlac College of Agriculture Administrative Council to propose the creation of the External Linkages and International Affairs (ELIA) Office. The proposal was approved by the TCA Board of Trustees by virtue of Resolution No. 42, s. 2011 during its Second Regular Board Meeting on July 29, 2011.</p>
            <p class="office-overview" style="margin-top:16px;">The creation of the ELIA Office aims to build partnerships and linkages with colleges and universities, governmental and non-governmental agencies and organizations in the local and international arena. The College is optimistic that through this initiative, such collaboration would contribute to the development of its core programs.</p>
            <p class="office-overview" style="margin-top:16px;">Dr. Ester L. Mercado served as its pioneer director. Upon her retirement in May 2015, Dr. Christine N. Ferrer has been appointed as the head of the said office.</p>
          </section>
        </div>
      </section>

      <!-- ===================== ABOUT ELIA ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="about-elia" data-panel="about-elia" aria-label="About ELIA" hidden>
        <header class="catalog-head"><h2 class="catalog-title">The Office of External Linkages and International Affairs (ELIA)</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <p class="office-overview">The TCA Office of External Linkages and International Affairs (ELIA) is the institution’s frontline arm in the College’s thrust to expand horizons on partnership development, increase its consortia or organizational memberships, and advance its internationalization and global engagement.</p>
            <p class="office-overview" style="margin-top:16px;">As an administrative office under the Office of the President, it primarily serves as the College’s channel in conceptualizing innovative programs intended to sustain and strengthen its existing linkages and establish a global representative network in carving its name in the international academic map.</p>
            <p class="office-overview" style="margin-top:16px;">Driven to instigate the College’s vision to become a recognized higher education institution in the Southeast Asian Region, the ELIA Office aggressively takes imperative initiatives to develop a resilient internationalization engagement, to build relevant opportunities for faculty and students towards cross border mobility and internationalization of higher education, and to redesign the institution’s capability in escalating memberships in alliances and networks.</p>
            <p class="office-overview" style="margin-top:16px;">Mandated to incessantly sustain institutional relations and alliance with other educational institutions, relevant government and non-government agencies, industries and other sectors of the society that can assist in accomplishing its task in accordance with the College’s strategic plan, the ELIA Office explores and identify possibilities of linkage development, cooperation and partnership with various sectors, local or international on areas that redound to the realization of its vision and mission.</p>
            <p class="office-overview" style="margin-top:16px;">Most significantly, the ELIA Office envisions to serve as a meaningful international resource for the local community by creating awareness on globalization/internationalization, ASEAN integration, culture and language of other countries, by inciting interest and appreciation of the language and culture of other nations, and by developing competent local graduates in addressing the current demands of the world labor market.</p>
          </section>
        </div>
      </section>

      <!-- ===================== FUNCTION ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="function" data-panel="function" aria-label="Function" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Functions of the Office of External Linkages and International Affairs</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <p class="office-overview">The Office of External Linkages and International Affairs is mandated to operationalize the following functions:</p>
            <div class="office-unit" style="margin-top:16px;">
              <ul style="list-style:none;padding-left:0;">
                <?php foreach ($functions as $n => $fn): ?>
                  <li><?= $n + 1 ?>. <?= esc($fn) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </section>
        </div>
      </section>

      <!-- ===================== INTERNALIZATION AND LINKAGING ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="internalization-and-linkaging" data-panel="internalization-and-linkaging" aria-label="Internalization and Linkaging" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Internalization and Linkaging</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <p class="office-overview">Compelled by the commitment to initiate personal and societal transformation, TAU engages in innumerable programs anticipated to effect change. However, trailing the path of transformation and development is easier said than done especially if support, in all aspects of the word, seems to be untenable and inaccessible. In spite of this, the University has continuously strived to remain enthusiastic in seeking all potential tie-ups in order to pull off its mission of bringing out social transformation and countryside development towards establishing international relations and global engagement.</p>
            <p class="office-overview" style="margin-top:16px;">At present, the University is incessantly exploring for more partnership opportunities with our Asian neighbors and in other countries which are open for academic mutual cooperation. This is a strategic move to address the demands of globalization and internationalization of higher education.</p>
            <p class="office-overview" style="margin-top:16px;">TAU anchors its strategic internationalization and collaboration initiatives guided by the following components of a comprehensive internationalization model: articulated institutional commitment, administrative leadership, structure and staffing; curriculum, co-curriculum and learning outcomes; faculty policies and practices; student mobility; collaboration and partnership.</p>
            <p class="office-overview" style="margin-top:16px;">The University translates and rationalizes its internationalization framework anchored on the following directions:</p>
          </section>

          <section class="sf-section">
            <div class="office-unit">
              <h4>I. Internationalization Engagement</h4>
              <p class="office-overview">Enhancement of the institution’s international or national reputation and visibility though the development of a global/internationalization and linkaging strategy framework and by expanding engagements and partnerships leading to remarkable global opportunities for cross-border mobility, collaborative research and information sharing</p>
            </div>
            <div class="office-unit">
              <h4>II. Learning and Development</h4>
              <p class="office-overview">Building exceptional international opportunities for faculty and students though academic and cultural exchange programs, international paper presentations and publications, as well as cross-cultural information sharing to leverage their professional and intellectual horizons</p>
            </div>
            <div class="office-unit">
              <h4>III. Engagement and Connections</h4>
              <p class="office-overview">Implementation of strategic networking and collaboration initiatives to generate more resources and build institutional capacity through expansion of institutional memberships in associations and consortia</p>
            </div>
          </section>

          <section class="sf-section">
            <p class="office-overview" style="font-style:italic;color:#e0405a;">As the University is still journeying the road in enhancing its position and identity in the international scene, the finish line seems always to be just down the road and around the next sharp curve. TAU, then shall continually make key decisions at major crossroads and fine-tune the route as unexpected and unforeseen challenges will likely to emerge.</p>
            <p class="office-overview" style="margin-top:16px;font-style:italic;color:#e0405a;">The current hallmarks do not only reflect previous destinations traversed but also ongoing and even future plans which represent a sort of distance marker – a reflector of where TAU has been and where it is heading thru. It is committed to AIM HIGHER for another state and level of communal commitment to quality and relevance in higher education in its bid to carve a niche in the Southeast Asian Region.</p>
          </section>
        </div>
      </section>

      <!-- ===================== INSTITUTIONAL MEMBERSHIP AND AFFILIATIONS ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="institutional-membership-and-affiliations" data-panel="institutional-membership-and-affiliations" aria-label="Institutional Membership and Affiliations" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Institutional Membership and Affiliations</h2></header>

        <div class="office-body">
          <section class="sf-section">
            <ul style="list-style:none;padding:0;text-align:center;">
              <?php foreach ($memberships as $m): ?>
                <li class="office-overview" style="text-align:center;margin-bottom:14px;"><?= esc($m) ?></li>
              <?php endforeach; ?>
            </ul>
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