<?= $this->include('partials/header') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/history.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">

<section class="page-banner">
  <span class="page-banner-eyebrow">1944 to 2016</span>
  <h1 class="page-banner-title">History of TAU</h1>
  <p class="page-banner-text">The carabao is TAU's symbol: patient, hardworking and steady through every season. The university's story follows the same pattern, from a small wartime high school in Camiling to a state university.</p>
</section>

<main class="history">
  <div class="history-inner">

    <aside class="history-year" aria-hidden="true">
      <div class="history-year-prev" id="hYearPrev"></div>
      <div class="history-year-cur" id="hYearCur">1944</div>
      <div class="history-year-next" id="hYearNext"></div>
      <div class="history-year-track"><span class="history-year-bar" id="hYearBar"></span></div>
    </aside>

    <div class="history-body">

      <!--
        HOW TO ADD A PHOTO TO AN ENTRY:
        Replace the <div class="h-photo is-empty"> block with the button below
        (put the image file in assets/Images/history/):

        <button type="button" class="h-photo" data-full="<?= base_url('assets/Images/history/1944.jpg') ?>" data-caption="Camiling Boys/Girls High School" aria-label="Enlarge photo">
          <img src="<?= base_url('assets/Images/history/1944.jpg') ?>" alt="Camiling Boys/Girls High School" loading="lazy">
        </button>

        HOW TO ADD A NEW ENTRY: copy one <article> block. Keep data-year the same as the
        year shown in .h-photo, and add the class "is-key" for a major milestone.
      -->

      <article class="h-entry" data-year="1944">
        <div class="h-photo is-empty" aria-hidden="true"><span>1944</span></div>
        <p class="h-meta">1944</p>
        <h2 class="h-title">Camiling Boys/Girls High School</h2>
        <p class="h-text">The school opened with 368 students, 13 teachers and a principal. It closed in December of that year because of the war, then reopened after Liberation as Tarlac High School, Camiling Branch, at the request of parents whose children had lost years of schooling.</p>
      </article>

      <article class="h-entry" data-year="1945">
        <div class="h-photo is-empty" aria-hidden="true"><span>1945</span></div>
        <p class="h-meta">1945</p>
        <h2 class="h-title">Camiling Vocational Agricultural School</h2>
        <p class="h-text">Municipal Resolution No. 34 (July 6) created the school with an agricultural focus, meant to help the town recover economically. It had 534 students and 13 teachers. In 1946 it was renamed Camiling Rural High School.</p>
      </article>

      <article class="h-entry" data-year="1953">
        <div class="h-photo is-empty" aria-hidden="true"><span>1953</span></div>
        <p class="h-meta">1953</p>
        <h2 class="h-title">A new home in Malacampa</h2>
        <p class="h-text">Facing pressure to relocate and grow, the school moved seven kilometers from the town proper to Malacampa. It started with 155 students and eight teachers in bamboo and nipa buildings, later replaced by permanent ones.</p>
      </article>

      <article class="h-entry" data-year="1957">
        <div class="h-photo is-empty" aria-hidden="true"><span>1957</span></div>
        <p class="h-meta">1957 to 1963</p>
        <h2 class="h-title">Tarlac National Agricultural School</h2>
        <p class="h-text">Under a Superintendent, the school ran profitable production projects such as piggery, poultry, goats and vegetables. A two-year post-secondary agriculture course opened in 1961, and a health center followed in 1963. It also had its own hymn and student paper, <em>The Carabao</em>.</p>
      </article>

      <article class="h-entry" data-year="1965">
        <div class="h-photo is-empty" aria-hidden="true"><span>1965</span></div>
        <p class="h-meta">1965</p>
        <h2 class="h-title">Tarlac College of Technology, College of Agriculture</h2>
        <p class="h-text">The school merged with the Tarlac School of Arts and Trades under RA 4337 and began offering degrees in elementary education, agriculture and agricultural engineering. Strong demand for these programs pointed toward independence.</p>
      </article>

      <article class="h-entry is-key" data-year="1974">
        <div class="h-photo is-empty" aria-hidden="true"><span>1974</span></div>
        <p class="h-meta">December 18, 1974</p>
        <h2 class="h-title">Chartered as a state college</h2>
        <p class="h-text">PD 609 created the institution as a state college. Its first president, Jose L. Milla, expanded the campus to 60 hectares, added fishery projects and started joint research with IRRI.</p>
      </article>

      <article class="h-entry" data-year="1980s">
        <div class="h-photo is-empty" aria-hidden="true"><span>1980s</span></div>
        <p class="h-meta">1980s</p>
        <h2 class="h-title">Growth of the campus</h2>
        <p class="h-text">Dr. Robustiano J. Estrada set up a ten-year development program, a code for the college and a new administrative structure. Academic buildings, dorms, faculty cottages, a library and a chapel went up, and the campus reached 70 hectares.</p>
      </article>

      <article class="h-entry" data-year="1989">
        <div class="h-photo is-empty" aria-hidden="true"><span>1989</span></div>
        <p class="h-meta">1989</p>
        <h2 class="h-title">More programs and scholarships</h2>
        <p class="h-text">Dr. Feliciano S. Rosete became president. The Farmers' Training Center was built, private and NGO scholarships began to arrive, and research, extension work and course offerings grew.</p>
      </article>

      <article class="h-entry" data-year="2001">
        <div class="h-photo is-empty" aria-hidden="true"><span>2001</span></div>
        <p class="h-meta">2001</p>
        <h2 class="h-title">Modernization</h2>
        <p class="h-text">Dr. Philip B. Ibarra's term focused on updated curricula, computerized enrollment and administration, program accreditation, developing new leaders and stronger local and international partnerships.</p>
      </article>

      <article class="h-entry" data-year="2010">
        <div class="h-photo is-empty" aria-hidden="true"><span>2010</span></div>
        <p class="h-meta">2010</p>
        <h2 class="h-title">Quality and accreditation</h2>
        <p class="h-text">Dr. Max P. Guillermo took office and launched the strategic plan <em>TCA @ 2015</em>. Under his leadership the college became the first AACCUP institutionally accredited state college in the Philippines and also completed a CHED sustainability assessment.</p>
      </article>

      <article class="h-entry" data-year="2016">
        <div class="h-photo is-empty" aria-hidden="true"><span>2016</span></div>
        <p class="h-meta">2016</p>
        <h2 class="h-title">CHED recognition</h2>
        <p class="h-text">CHED named agriculture education a Center of Development and teacher education a Center of Excellence. All 23 programs were accredited, and international partnerships supported faculty exchange, research and student training abroad.</p>
      </article>

      <article class="h-entry is-key" data-year="2016">
        <div class="h-photo is-empty" aria-hidden="true"><span>2016</span></div>
        <p class="h-meta">May 10, 2016</p>
        <h2 class="h-title">Becoming Tarlac Agricultural University</h2>
        <p class="h-text">Republic Act No. 10800, signed by President Benigno S. Aquino III, converted Tarlac College of Agriculture in Camiling into a state university: Tarlac Agricultural University.</p>
      </article>

      <section class="h-end">
        <h2>Our mandate</h2>
        <p>By law, TAU provides advanced education and professional and technological training in agriculture, agribusiness management, science and technology, engineering, teacher education and related fields. It also carries out research, extension and production work in support of Tarlac province.</p>

        <h2>Looking ahead</h2>
        <p>The TAU Strategic Development Plan (2016 to 2025) sets the university's ten-year direction. It responds to ASEAN integration and internationalization with outcomes-based education that meets global standards.</p>

        <h2>Presidents</h2>
        <ul class="h-leaders">
          <li><b>1974</b> Jose L. Milla, 1st president</li>
          <li><b>1980s</b> Dr. Robustiano J. Estrada, 2nd president</li>
          <li><b>1989</b> Dr. Feliciano S. Rosete, 3rd president</li>
          <li><b>2001</b> Dr. Philip B. Ibarra, 4th president</li>
          <li><b>2010</b> Dr. Max P. Guillermo</li>
        </ul>
      </section>

    </div>

  </div>
</main>

<dialog class="h-modal" id="hModal" aria-label="Photo">
  <button type="button" class="h-modal-close" id="hModalClose" aria-label="Close photo">&times;</button>
  <img src="" alt="" id="hModalImg">
  <div class="h-modal-caption" id="hModalCaption"></div>
</dialog>

<script src="<?= base_url('assets/js/history.js') ?>"></script>

<?= $this->include('partials/footer') ?>