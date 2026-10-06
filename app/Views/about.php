<?php
$officials = $officials ?? [
    'president' => [
        ['University President', 'Silverio Ramon DC. Salunson, DBA', 'officials/salunson.jpg'],
    ],
    'Vice Presidents' => [
        ['VP, Finance & Administration',       'Dr. Arnold R. Lorenzo',  'fa.png'],
        ['VP, Academic & Student Affairs',     'Dr. Sonny DC. Torres',   'asa.png'],
        ['VP, Research and Extension',         'Dr. Edmar N. Franquera', 'ret.png'],
        ['VP, Planning & Quality Assurance',   'Dr. Leonell P. Lijauco', 'pqa.png'],
    ],
    'Deans' => [
        ['Dean, Agriculture & Forestry',        'Dr. Sinamar A. Estudillo',    'officials/estudillo.jpg'],
        ['Dean, Arts & Sciences',               'Dr. Sherwin S. Alar',         'officials/alar.jpg'],
        ['Dean, Business & Management',         'Dr. Erlie SD. Totaan',        'officials/totaan.jpg'],
        ['Dean, Education',                     'Dr. Claire Anne A. Olivares', 'officials/olivares.jpg'],
        ['Dean, Engineering & Technology',      'Dr. Ruben A. Parazo',         'cetdean.png'],
        ['Dean, Veterinary Medicine',           'Dr. Lavina Gracia M. Ramirez','vetdean.png'],
    ],
    'Directors and Heads of Offices' => [
        ['Director, External Linkages and International Affairs', 'Dr. Benny S. Soliman',          null],
        ['Director, Quality Assurance',                           'Dr. Jerome D. Soriano',         null],
        ['Director, Internal Audit Service',                      'Dr. Geraldin B. Dela Cruz',     null],
        ['Director, Planning and Development',                    'Dr. Eugene S. Valeriano',       null],
        ['Director, Curriculum & Instruction',                    'Ms. Mariella Alexes R. Espiritu', null],
        ['Director, Admission & Registration Services',           'Ms. Maria Regina M. Pablo',     null],
        ['Principal, Laboratory School',                          'Dr. Milani C. Petero',          null],
        ['Director, National Service Training Program',            'Mr. Joven D. Valdez',           null],
        ['Director, General Services',                            'Engr. Benjie M. Dela Vega',     null],
        ['Director, Auxiliary Services',                          'Dr. Jay-Ar A. De Mayo',         null],
        ['Director, Extension & Training',                        'Dr. Agnes C. Perey',            null],
        ['Director, Research & Development',                      'Dr. Maria Elena T. Caguioa',    null],
        ['Director, Rootcrops Research & Training Center',        'Ms. Aira F. Waje',              null],
        ['Director, Gender and Development',                      'Dr. Ma. Theresa B. Nardo',      'officials/nardo.jpg'],
        ['Director, Student Services and Development',            'Dr. Danilo N. Oficiar',         null],
        ['Director, Office of the Student Placement',             'Dr. Marianne P. Villaruel',     null],
        ['Director, Sports Development',                          'Dr. Emerson B. Cuzzamu',        null],
        ['Director, Sociocultural Development',                   'Ms. Cecile L. Lapitan',         null],
        ['Director, Alumni Relations Office',                     'Ms. Karen Mariano',             null],
    ],
    'Administrative Officers' => [
        ['Chief Administrative Officer for Administration', 'Ms. Yolanda F. Juan',        'officials/juan.jpg'],
        ['Chief Administrative Officer for Finance',        'Mr. Dante A. Revamonte',     null],
        ['Chief, Human Resource Management Office',         'Ms. Maricel D. Felipe',      null],
        ['University Secretary / Board Secretary',          'Mr. Sonny A. Santos',        null],
        ['Secretariat / Executive Assistant, OP',           'Mr. Orlando H. Locading, Jr.', null],
    ],
    'Organization Presidents' => [
        ['President, United Faculty Association-TAU',     'Dr. Joseph Paul T. Abad', null],
        ['President, Non-Academic Staff Association',     'Mr. Jenah B. Sotero',     null],
        ['President, Supreme Student Council',            'Mr. Jethro M. Jimenez',   null],
    ],
];
$tierClass = [
    'Vice Presidents'                => 'vp',
    'Deans'                          => 'dean',
    'Directors and Heads of Offices' => 'director',   
    'Administrative Officers'        => 'staff',
    'Organization Presidents'        => 'staff',
];

$card = static function (array $o): string {
    [$title, $name, $img] = $o;
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
<title>TAU | Tarlac Agricultural University</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&family=Source+Serif+4:wght@400;500&display=swap" rel="stylesheet">

<!-- Order matters: admissions.css (layout) first, about.css (content) after -->
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/admissions.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/about.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">
</head>
<body>

<?= $this->include('partials/loader') ?>
<?= $this->include('partials/header') ?>

<main class="admissions-page about-page" data-hash-sync="true">
  <div class="adm-layout">

    <!-- ===================== SIDEBAR NAV ===================== -->
    <aside class="adm-sidebar">
      <nav class="adm-nav" aria-label="About the university">
        <div class="adm-nav-list">
          <a href="#profile" class="adm-nav-btn active" data-panel="profile" aria-current="page">University Profile</a>
          <a href="#strategic-framework" class="adm-nav-btn" data-panel="strategic-framework">Strategic Framework</a>
          <a href="#philosophy-mandate" class="adm-nav-btn" data-panel="philosophy-mandate">Philosophy &amp; Mandate</a>
          <a href="#breakthrough-goals" class="adm-nav-btn" data-panel="breakthrough-goals">Breakthrough Goals</a>          <a href="#history" class="adm-nav-btn" data-panel="history">History</a>
          <a href="#hymn" class="adm-nav-btn" data-panel="hymn">TAU Hymn</a>
          <a href="#campus-tour" class="adm-nav-btn" data-panel="campus-tour"> Campus Map</a>
          <a href="#key-officials" class="adm-nav-btn" data-panel="key-officials">Administrative Officials</a>
          <a href="#board-of-regents" class="adm-nav-btn" data-panel="board-of-regents">Board of Regents</a>
          <a href="#transparency-seal" class="adm-nav-btn" data-panel="transparency-seal">Transparency Seal</a>
        </div>

        <select class="adm-nav-select" aria-label="Choose a section">
          <option value="profile">University Profile</option>
          <option value="strategic-framework">Strategic Framework</option>
          <option value="philosophy-mandate">Philosophy &amp; Mandate</option>
          <option value="breakthrough-goals">Breakthrough Goals</option>          <option value="history">History</option>
          <option value="hymn">TAU Hymn</option>
          <option value="campus-tour">University Map</option>
          <option value="key-officials">Administrative Officials</option>
          <option value="board-of-regents">Board of Regents</option>
          <option value="transparency-seal">Transparency Seal</option>
        </select>
      </nav>
    </aside>

    <!-- ===================== CONTENT ===================== -->
    <div class="adm-content">

      <!-- ===================== UNIVERSITY PROFILE ===================== -->
      <section class="admissions-panel about-sec profile-panel" id="profile" data-panel="profile" aria-label="University profile">
        <header class="catalog-head"><h2 class="catalog-title">University Profile</h2></header>

        <div class="profile-split">
          <aside class="profile-sidebar">
            <ul class="profile-sidebar-facts">
              <li><strong>Location</strong><span>Malacampa, Tarlac</span></li>
              <li><strong>Founded</strong><span>1944</span></li>
              <li><strong>Chartered</strong><span>1974 (PD 609)</span></li>
              <li><strong>University status</strong><span>2016 (RA 10800)</span></li>
              <li><strong>Accredited programs</strong><span>23</span></li>
            </ul>

            <p class="profile-sidebar-label">Colleges</p>
            <ul class="profile-sidebar-chips">
              <li>Agriculture &amp; Forestry</li>
              <li>Engineering &amp; Technology</li>
              <li>Arts &amp; Sciences</li>
              <li>Business &amp; Management</li>
              <li>Veterinary Medicine</li>
              <li>Education</li>
            </ul>
          </aside>

          <div class="profile-main">
            <section class="profile-section">
              <h3>Academic Focus</h3>
              <p>TAU centers its degree offerings on agriculture, agribusiness management, science and technology, engineering, and teacher education, alongside non-traditional courses developed to keep pace with the region's needs. Its College of Agriculture and Forestry and College of Education carry CHED-recognized distinctions, and its College of Engineering and Technology rounds out the university's technical training programs.</p>
            </section>

            <section class="profile-section">
              <h3>Recognition &amp; Quality</h3>
              <p>The Agriculture Education program holds a Center of Development designation from CHED, and Teacher Education a Center of Excellence designation, both effective 2016. TAU also carries an AACCUP institutional accreditation &mdash; notably, it was the first state college in the Philippines to reach institutionally accredited status &mdash; and has completed an Institutional Sustainability Assessment under CHED's quality assurance framework.</p>
            </section>

            <section class="profile-section">
              <h3>Global Engagement</h3>
              <p>As part of its response to the internationalization of higher education, the university has expanded partnerships and linkages abroad, supporting faculty exchange, joint research presentations, and outbound training opportunities for students.</p>
            </section>

            <p class="profile-vision">Across all of this, TAU holds to one vision: to be counted among the leading, globally recognized smart agricultural universities.</p>
          </div>
        </div>
      </section>

      <!-- ===================== STRATEGIC FRAMEWORK ===================== -->
      <section class="admissions-panel about-sec" id="strategic-framework" data-panel="strategic-framework" aria-label="Strategic framework" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Strategic Framework</h2></header>

        <section class="sf-section">
          <h3 class="sf-section-title">Framework Alignment</h3>
          <div class="framework-pyramid">
            <div class="framework-top-row">
              <div class="framework-pyramid-item framework-item--sdg">
                <h5>2030 Agenda for Sustainable Development</h5>
                <p>A world of universal respect for human rights and human dignity, the rule of law, justice, equality and non-discrimination.</p>
              </div>
              <div class="framework-pyramid-item framework-item--asean">
                <h5>ASEAN 2030</h5>
                <p>A "RICH" ASEAN: resilient, inclusive, competitive, and harmonious region by 2030.</p>
              </div>
            </div>
            <div class="framework-pyramid-tier framework-tier--1">
              <h5>AmBisyon Natin 2040</h5>
              <p>Filipinos enjoy a strongly rooted, comfortable, and secure life (Matatag, Maginhawa, at Panatag na Buhay).</p>
            </div>
            <div class="framework-pyramid-tier framework-tier--2">
              <h5>PDP 2023–2028</h5>
              <p>Economic Transformation for a Prosperous, Inclusive, and Resilient Society.</p>
            </div>
            <div class="framework-pyramid-tier framework-tier--3">
              <h5>Higher Education Outcomes</h5>
              <p>Lifelong learning opportunities for all ensured.</p>
            </div>
          </div>
        </section>

        <section class="sf-section">
          <h3 class="sf-section-title">Organizational Outcomes</h3>
          <ul class="outcomes-banner">
            <li>Relevant and Quality Higher Education Ensured</li>
            <li>Higher Education Research Improved and Community Engagement Increased</li>
            <li>Efficient, Accountable, and Transparent Governance Guaranteed</li>
            <li>Institutional Quality and Effectiveness Assured</li>
          </ul>
        </section>

        <section class="sf-section">
          <h3 class="sf-section-title">Strategic Goals</h3>
          <div class="strategic-goals-grid">
            <div class="goal-column">
              <h4>Academic and Student Affairs</h4>
              <ul>
                <li><strong>SG1</strong> Relevant and Futures-oriented Curriculum</li>
                <li><strong>SG2</strong> Innovative and Inclusive Teaching Quality</li>
                <li><strong>SG3</strong> Holistic Support for Student Success</li>
                <li><strong>SG4</strong> Enhanced Student Outcomes</li>
              </ul>
            </div>
            <div class="goal-column">
              <h4>Research, Extension and Training</h4>
              <ul>
                <li><strong>SG5</strong> Innovative, Transformative, and Impactful Research and Development Ecosystem</li>
                <li><strong>SG6</strong> Responsive and Sustainable Extension and Training Programs</li>
              </ul>
            </div>
            <div class="goal-column">
              <h4>Finance and Administration</h4>
              <ul>
                <li><strong>SG7</strong> Efficient and Adaptive Systems of Operation and Resources Management</li>
                <li><strong>SG8</strong> Sustainable Fund Generation</li>
                <li><strong>SG9</strong> Resilient, Conducive, and Environmentally-friendly Campus</li>
              </ul>
            </div>
            <div class="goal-column">
              <h4>Planning and Quality Assurance</h4>
              <ul>
                <li><strong>SG10</strong> Assured Adherence to Quality Frameworks</li>
                <li><strong>SG11</strong> Established Green and Smart University</li>
                <li><strong>SG12</strong> Ensured Compliance to Statutory Requirements and Regulatory Standards</li>
                <li><strong>SG13</strong> Strengthened Local and International Partnership</li>
                <li><strong>SG14</strong> Elevated Institutional Reputation and Broadened Stakeholder Engagement</li>
              </ul>
            </div>
          </div>
        </section>

        <section class="sf-section">
          <h3 class="sf-section-title">Vision and Mission</h3>
          <div class="vmc-grid">
            <div class="vmc-card">
              <p class="vmc-label">Mission</p>
              <p>TAU produces highly competent individuals who empower communities through inclusive quality education, impactful research, responsive extension, sustainable production, and good governance that are technology-driven aimed at enhancing the quality of life in the society with unwavering integrity.</p>
            </div>
            <div class="vmc-card">
              <p class="vmc-label">Vision</p>
              <p>TAU as one of the leading and globally recognized smart agricultural universities.</p>
            </div>
          </div>
        </section>

        <section class="sf-section">
          <h3 class="sf-section-title">Core Values</h3>
          <div class="core-values-block">
            <ul class="core-values-pills">
              <li>Resilience</li><li>Agility</li><li>Innovation</li><li>Sustainability</li><li>Excellence</li>
            </ul>
          </div>
        </section>

        <section class="sf-section">
          <h3 class="sf-section-title">Quality Policy</h3>
          <div class="policy-card">
            <p>TAU is committed to satisfy the expectations of its stakeholders through the continual improvement of all its processes towards the attainment of its quality strategic objectives anchored in the provision of good governance, quality instruction, relevant research, responsive extension services and sustainable production that adhere to a globally recognized quality system management and applicable statutory and regulatory requirements.</p>
          </div>
        </section>
      </section>

      <!-- ===================== PHILOSOPHY & MANDATE ===================== -->
      <section class="admissions-panel about-sec" id="philosophy-mandate" data-panel="philosophy-mandate" aria-label="Philosophy and mandate" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Philosophy &amp; Mandate</h2></header>

        <div class="pm-grid">
          <article class="pm-col">
            <h3 class="pm-title">Philosophy</h3>
            <p>In an environment of academic excellence, TAU harnesses, develops and catalyzes the conversion of the full potentials and capabilities of students into becoming responsible and competent professionals in agriculture and allied disciplines.</p>
          </article>

          <article class="pm-col">
            <h3 class="pm-title">Mandate</h3>
            <p>TAU shall primarily provide advanced education, higher technological, professional instruction and training in the fields of agriculture, agribusiness management, science and technology, engineering, teacher education, non-traditional courses, and other relevant fields of study. It shall also undertake research, extension services, and production activities in support of the development of the Province of Tarlac, and provide leadership in its areas of specialization.</p>
          </article>
        </div>
      </section>


      <!-- ===================== BREAKTHROUGH GOALS ===================== -->
      <section class="admissions-panel about-sec" id="breakthrough-goals" data-panel="breakthrough-goals" aria-label="Breakthrough goals" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Breakthrough Goals</h2></header>

        <div class="pm-grid pm-grid--single">
          <article class="pm-col">
            <p>Anchored on the challenges of the Sustainable Development Goals for inclusive growth, TAU will:</p>
            <p class="pm-goal"><strong>T</strong>ake in innovative teaching methodologies and appropriate technologies to create an ideal environment to optimize learning;</p>
            <p class="pm-goal"><strong>A</strong>dvance sustainable agricultural productivity and improve income through innovation, technology generation, transfer and training; and</p>
            <p class="pm-goal"><strong>U</strong>se of Science, Technology and Engineering (STE) effectively for climate change resiliency, adaptation and agricultural productivity.</p>
          </article>
        </div>
      </section>

      <!-- ===================== HISTORY ===================== -->
      <section class="admissions-panel about-sec history-panel" id="history" data-panel="history" aria-label="History" hidden>
        <header class="catalog-head"><h2 class="catalog-title">History</h2></header>

        <div class="history-body">
          <p>The carabao has always been the symbol of Tarlac Agricultural University (TAU). Resilient even through the ages, synonymous with steady action and sustained accomplishment &mdash; that is TAU through the years. It is always good to look back and learn how the University weathered storms before reaching its present status.</p>

          <figure class="history-photo history-photo--right">
            <img src="<?= base_url('assets/Images/crhs.jpg') ?>" alt="Camiling Rural High School, early years" class="history-photo-img">
            <figcaption>The old campus grounds, early years</figcaption>
          </figure>

          <h3>Wartime Beginnings (1944&ndash;1953)</h3>
          <p>The institution was established in 1944 as Camiling Boys/Girls High School, opening with 368 students, 13 faculty members, and a school principal. It stopped operating in December 1944 but resumed after the Liberation as Tarlac High School, Camiling Branch &mdash; a response to parents whose children had stopped schooling during the war and who struggled to travel from Camiling to Tarlac City.</p>

          <p>On July 6, 1945, Municipal Resolution No. 34 created the Camiling Vocational Agricultural School (CVAS), replacing Tarlac High School, Camiling Branch. Its focus on vocational agriculture was seen as a way to hasten the town's economic recovery from the war. CVAS opened with 534 students and 13 faculty, offering both a general academic curriculum and an agriculture curriculum. On September 26, 1946, the school was renamed Camiling Rural High School (CRHS), and by 1948 the general curriculum had been phased out entirely.</p>

          <p>In 1952, the Director of Public Schools warned that the school would need to relocate to a permanent site and grow its declining enrollment, or risk closure. Malacampa, a barangay seven kilometers from the town proper, was chosen. In June 1953, the school &mdash; then 155 students and eight faculty &mdash; moved to the new site, where classrooms were first built of bamboo and nipa "in the middle of a wilderness," later replaced with permanent structures funded by FOA-PHILCUSA.</p>

          <figure class="history-photo history-photo--left">
            <img src="<?= base_url('assets/Images/tca.png') ?>" alt="Tarlac College of Agriculture campus" class="history-photo-img">
            <figcaption>Malacampa campus, mid-20th century</figcaption>
          </figure>

          <h3>Becoming an Agricultural College (1957&ndash;1974)</h3>
          <p>Expansion accelerated when CRHS was converted into Tarlac National Agricultural School (TNAS) in 1957. Profitable production projects &mdash; piggery, poultry, goats, and vegetables &mdash; became institutional policy, and research linkages grew from pork barrel funding. A two-year technical agriculture course opened in 1961, and a Health Center, funded by the Philippine Charity Sweepstakes Office, followed in 1963. By then, TNAS already had a school hymn and a student publication, <em>The Carabao</em>.</p>

          <p>In 1965, TNAS merged with the Tarlac School of Arts and Trades (TSAT) to form the Tarlac College of Technology under RA 4337 &mdash; TNAS becoming TCT-College of Agriculture (TCT-CA), offering degrees in Elementary Education (Agriculture/Home Economics), Agriculture, and Agricultural Engineering. Government agricultural programs after the 1971 declaration of Martial Law boosted enrollment further, and graduates found ready employment at home and abroad.</p>

          <p class="history-pullquote">On December 18, 1974, by virtue of Presidential Decree No. 609, the institution was created as a state college &mdash; the Tarlac College of Agriculture (TCA) &mdash; with Mr. Jose L. Milla as its first College President.</p>

          <h3>Growth Under Successive Presidents (1974&ndash;2016)</h3>
          <p>Under President Milla, the campus grew to 60 hectares, a forestry laboratory was acquired in Titi Calao, Mayantoc, and fishery projects and joint research with IRRI began. Dr. Robustiano J. Estrada, the second president, oversaw a major reorganization, a ten-year development program, and a wave of new infrastructure &mdash; faculty cottages, dormitories, a research building, and the administration building and library &mdash; as the campus expanded to 70 hectares.</p>

          <figure class="history-photo history-photo--right">
            <img src="<?= base_url('assets/Images/tcaa.png') ?>" alt="TCA Administration Building" class="history-photo-img">
            <figcaption>TCA</figcaption>
          </figure>

          <p>Dr. Feliciano S. Rosete became the third president in 1989, a term marked by the Farmers' Training Center and a surge of private and NGO scholarships. Dr. Philip B. Ibarra, the fourth president from 2001, modernized curricular offerings and computerized enrollment and administrative systems, while Dr. Max P. Guillermo, taking office January 14, 2010, launched the "TCA @ 2015" strategic plan and secured the college's first institutional accreditation from AACCUP &mdash; a national first among state colleges.</p>

          <h3>University Status and Beyond (2016&ndash;2026)</h3>
          <p>On May 10, 2016, the Tarlac College of Agriculture was officially converted into Tarlac Agricultural University (TAU) by virtue of Republic Act No. 10800, signed by President Benigno S. Aquino III &mdash; making it the first state college in the country converted into a university through CHED's Merit Evaluation System.</p>

          <figure class="history-photo history-photo--left">
            <div class="history-photo-frame">Photo placeholder</div>
            <figcaption>TAU campus today</figcaption>
          </figure>

          <p>As a university, TAU broadened its mandate to advanced instruction, research, and extension in agriculture, agribusiness, science and technology, engineering, and teacher education, while deepening international partnerships and student mobility programs. Today, in 2026, the University continues that mission under the leadership of its current President, Dr. Ramon DC Salunson, carrying forward more than eighty years of resilience &mdash; from a wartime high school in Camiling to a state university recognized across the region &mdash; the same resilience the carabao has always symbolized.</p>
        </div>
      </section>

      <!-- ===================== TAU HYMN ===================== -->
      <section class="admissions-panel about-sec" id="hymn" data-panel="hymn" aria-label="TAU hymn" hidden>
        <header class="catalog-head"><h2 class="catalog-title">TAU Hymn</h2></header>

        <div class="hymn-sheet">
          <div class="hymn-stanza">
            <p>Midst the greenfields long the highway,<br>
            On verdant plains and gentle hills,<br>
            Stately stands our Alma Mater,<br>
            TAU ever dear, TAU ever lovely,<br>
            In our hearts without compare,<br>
            Yield praises, love and loyalty,<br>
            To our Alma Mater dear.</p>
          </div>

          <div class="hymn-refrain">
            <p class="hymn-refrain-label">Refrain</p>
            <p>When our school days glide by swiftly,<br>
            From her gates we walk away,<br>
            Still the truth and faith she gave us,<br>
            Shall to us forever stay,<br>
            Whether high place, or in the lowly<br>
            Fate may send us joy or pain,<br>
            But to our University,<br>
            Ever faithful we'll remain.</p>
          </div>

          <p class="hymn-repeat">Repeat Refrain</p>

          <div class="hymn-closing">
            <p>But to our University,<br>
            Ever faithful we'll remain.</p>
          </div>
        </div>
      </section>

<!-- ===================== UNIVERSITY MAP ===================== -->
<section class="admissions-panel about-sec" id="campus-tour" data-panel="campus-tour" aria-label="University map" hidden>
  <header class="catalog-head"><h2 class="catalog-title">University Map</h2></header>

  <div class="cmap">
    <div class="cmap-search">
      <div class="cmap-field">
        <svg class="cmap-icon" viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="11" cy="11" r="7"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="search" id="cmapInput" autocomplete="off"
               placeholder="Search a building or facility"
               data-en-placeholder="Search a building or facility"
               data-tl-placeholder="Maghanap ng gusali o pasilidad">

        <button type="button" class="cmap-clear" id="cmapClear" aria-label="Clear search" hidden>
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <line x1="6" y1="6" x2="18" y2="18"></line>
            <line x1="18" y1="6" x2="6" y2="18"></line>
          </svg>
        </button>
        <button type="button" class="cmap-go" id="cmapGo">Search</button>
      </div>

      <ul class="cmap-results" id="cmapResults" aria-live="polite"
          data-photo-base="<?= base_url('assets/Images/buildings/') ?>"></ul>
    </div>

    <figure class="cmap-figure">
      <p class="cmap-note" id="cmapNote" hidden></p>
      <div class="cmap-scroll" id="cmapScroll">
        <!-- The stage wraps the image exactly, so the % hotspots line up -->
        <div class="cmap-stage" id="cmapStage">
          <img id="cmapImg"
               src="<?= base_url('assets/Images/map.png') ?>"
               alt="Tarlac Agricultural University Campus Master Development Plan">
        </div>
      </div>
    </figure>
  </div>
</section>

      <!-- ===================== ADMINISTRATIVE OFFICIALS ===================== -->
      <section class="admissions-panel about-sec key-officials-panel" id="key-officials" data-panel="key-officials" aria-label="Administrative officials" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Administrative Officials</h2></header>

        <svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
          <symbol id="official-person" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"/></symbol>
        </svg>

        <div class="officials">
          <ul class="officials-tier officials-tier--president">
            <?php foreach ($officials['president'] as $o) { echo $card($o); } ?>
          </ul>

          <?php foreach ($tierClass as $heading => $cls): ?>
            <h3 class="officials-heading"><?= esc($heading) ?></h3>
            <ul class="officials-tier officials-tier--<?= $cls ?>">
              <?php foreach ($officials[$heading] as $o) { echo $card($o); } ?>
            </ul>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- ===================== BOARD OF REGENTS (placeholder) ===================== -->
      <section class="admissions-panel about-sec" id="board-of-regents" data-panel="board-of-regents" aria-label="Board of Regents" hidden>
        <header class="catalog-head"><h2 class="catalog-title">Board of Regents</h2></header>
        <div class="passers-empty"><p>The Board of Regents list will be posted soon.</p></div>
      </section>

      <!-- ===================== TRANSPARENCY SEAL ===================== -->
      <section class="admissions-panel about-sec" id="transparency-seal" data-panel="transparency-seal" aria-label="Transparency Seal" hidden>
        <header class="catalog-head ts-head">
          <img class="ts-logo" src="<?= base_url('assets/Images/transparency-seal.png') ?>" alt="Transparency Seal" onerror="this.remove()">
          <h2 class="catalog-title">Transparency Seal</h2>
        </header>

        <div class="ts-accordion">

          <details class="ts-item" open>
            <summary>National Budget Circular 542, August 9, 2012</summary>
            <div class="ts-body">
              <p>National Budget Circular 542, issued by the Department of Budget and Management on August 29, 2012, reiterates compliance with Section 93 of the General Appropriations Act of FY2012. Section 93 is the Transparency Seal provision, to wit:</p>
              <p>Sec. 93. Transparency Seal. To enhance transparency and enforce accountability, all national government agencies shall maintain a transparency seal on their official websites. The transparency seal shall contain the following information: (i) the agency's mandates and functions, names of its officials with their position and designation, and contact information; (ii) annual reports, as required under National Budget Circular Nos. 507 and 507-A dated January 31, 2007 and June 12, 2007, respectively, for the last three (3) years; (iii) their respective approved budgets and corresponding targets immediately upon approval of this Act; (iv) major programs and projects categorized in accordance with the five key results areas under E.O. No. 43, s. 2011; (v) the program/projects beneficiaries as identified in the applicable special provisions; (vi) status of implementation and program/project evaluation and/or assessment reports; and (vii) annual procurement plan, contracts awarded and the name of contractors/suppliers/consultants.</p>
              <p>The respective heads of the agencies shall be responsible for ensuring compliance with this section.</p>
              <p>A Transparency Seal, prominently displayed on the main page of the website of a particular government agency, is a certificate that it has complied with the requirements of Section 93. This Seal links to a page within the agency's website which contains an index of downloadable items of each of the above-mentioned documents.</p>
            </div>
          </details>

          <details class="ts-item" open>
            <summary>National Budget Circular No. 599, January 5, 2026</summary>
            <div class="ts-body">
              <p>National Budget Circular 592, issued by the Department of Budget and Management on January 5, 2026, reiterates compliance with Section 112 of the General Appropriations Act of FY 2026. Section 112 is the Transparency Seal provision, to wit:</p>
              <p>Sec. 112. Transparency Seal. To enhance transparency, enforce accountability, and promote systematized access to government information, all agencies of the government shall maintain a Transparency Seal to be posted on their websites. The Transparency Seal shall contain the following:</p>
              <ul class="ts-list">
                <li>(a) the agency's mandates and functions, names of its officials with their position and designation, and contact information;</li>
                <li>(b) approved budgets and corresponding targets, immediately upon approval of this Act;</li>
                <li>(c) modifications made pursuant to the general and special provisions in this Act;</li>
                <li>(d) annual procurement plan/s and contracts awarded with the winning supplier, contractor, or consultant;</li>
                <li>(e) major programs, activities, or projects and their target beneficiaries;</li>
                <li>(f) status of implementation, evaluation or assessment reports of said programs, activities, or projects;</li>
                <li>(g) all subsidy and assistance programs of the government, including details on the manner of execution, the amounts allocated, and relevant data of the target beneficiaries, subject to R.A. No. 10173 or the Data Privacy Act;</li>
                <li>(h) Budget and Financial Accountability Reports;</li>
                <li>(i) Updated People's Freedom of Information (FOI) Manual signed by head of agency, Updated One-Page FOI Manual, and Agency FOI Reports;</li>
                <li>(j) annual reports on the status of income authorized by law to be retained or used and be deposited outside of the National Treasury, which shall include the legal basis for its retention or use, the beginning balance, income collected and its sources, expenditures, and ending balance for the preceding fiscal year;</li>
                <li>(k) particulars of concessions, permits, or authorizations granted by the agency, subject to R.A. No. 10173 or the Data Privacy Act; and</li>
                <li>(l) current news and updated events conducted by agencies.</li>
              </ul>
              <p>Agencies shall ensure the content posted under the Transparency Seal is regularly reviewed, updated, and maintained using internal systems and procedures that support accountability, data integrity, and operational efficiency.</p>
              <p>The heads of the agencies and their web administrators or their equivalent shall be responsible for ensuring compliance with this Section.</p>
              <p>The DBM shall post on its website the status of compliance by all agencies of the government. The agencies are responsible in ensuring that the contents and data of their posts in their respective official websites and communication channels are searchable for the public's easy access to information regarding matters on public funds.</p>
              <p>A Transparency Seal, prominently displayed on the main page of the website of a particular government agency, is a certificate that it has complied with the requirements of Section 112. This Seal links to a page within the agency's website which contains an index of downloadable items of each of the above-mentioned documents.</p>
            </div>
          </details>

          <details class="ts-item" open>
            <summary>Symbolism</summary>
            <div class="ts-body">
              <p>A pearl buried inside a tightly-shut shell is practically worthless. Government information is a pearl, meant to be shared with the public in order to maximize its inherent value.</p>
              <p>The Transparency Seal, depicted by a pearl shining out of an open shell, is a symbol of a policy shift towards openness in access to government information. On the one hand, it hopes to inspire Filipinos in the civil service to be more open to citizen engagement; on the other, to invite the Filipino citizenry to exercise their right to participate in governance.</p>
              <p>This initiative is envisioned as a step in the right direction towards solidifying the position of the Philippines as the Pearl of the Orient &ndash; a shining example for democratic virtue in the region.</p>
              <p><strong>Tarlac Agricultural University (TAU), Compliance with Sec. 112 (Transparency Seal) R.A. No. 12314 (General Appropriations Act FY 2026)</strong></p>
            </div>
          </details>

        </div>
      </section>

    </div><!-- /.adm-content -->
  </div><!-- /.adm-layout -->
</main>

<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
<script src="<?= base_url('assets/campus-map.js') ?>"></script>
<script>
  // Links inside the Transparency Seal panel jump to the matching About section
  document.querySelectorAll('[data-goto-panel]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      e.preventDefault();
      var btn = document.querySelector('.adm-nav-btn[data-panel="' + a.dataset.gotoPanel + '"]');
      if (btn) btn.click();
    });
  });
</script>
</body>
</html>