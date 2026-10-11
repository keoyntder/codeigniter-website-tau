<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Colleges | Tarlac Agricultural University</title>
<script>document.documentElement.classList.add('js');</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600&family=Playfair+Display:ital,wght@1,600&family=Source+Serif+4:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.19.0/dist/tabler-icons.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/colleges.css') ?>">
<link rel="icon" type="image/png" href="<?= base_url('assets/Images/taulogo.png') ?>">
</head>
<body>

<?= $this->include('partials/loader') ?>
<?= $this->include('partials/header') ?>

<!-- Facebook glyph, defined once and reused by every card -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
  <symbol id="icon-fb" viewBox="0 0 80 80">
    <rect width="80" height="80" rx="9" fill="#475993"/>
    <path fill="#fff" d="M40 80V50H31V37.5H40V28C40 19 44 13 54 13H64V25.5H52V37.5H64V50H52V80Z"/>
  </symbol>
</svg>

<main class="admissions-page colleges-page">
  <div class="adm-layout">

    <!-- ===================== SIDEBAR NAV ===================== -->
    <aside class="adm-sidebar">
      <nav class="adm-nav" aria-label="Academics sections">
        <div class="adm-nav-list">
          <a href="<?= base_url('academics/colleges') ?>" class="adm-nav-btn active" aria-current="page" data-en="Colleges" data-tl="Mga Kolehiyo">Colleges</a>
          <a href="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl" class="adm-nav-btn" target="_blank" rel="noopener" data-en="University Library" data-tl="Aklatan ng Unibersidad">University Library</a>
        </div>

        <!-- phones: the list collapses into a select, like Admissions -->
        <select class="adm-nav-select" id="admSelect" aria-label="Choose a section">
          <option value="<?= base_url('academics/colleges') ?>" selected data-en="Colleges" data-tl="Mga Kolehiyo">Colleges</option>
          <option value="https://tau.onstrike.com.ph/cgi-bin/koha/opac-main.pl" data-en="University Library" data-tl="Aklatan ng Unibersidad">University Library</option>
        </select>
      </nav>
    </aside>

    <div class="adm-content" id="admContent">
      <section class="programs" aria-label="Colleges">
        <div class="catalog">

          <header class="catalog-head">
            <h1 class="catalog-title" data-en="Colleges" data-tl="Mga Kolehiyo">Colleges</h1>
          </header>

          <!-- ===================== COLLEGE CARDS =====================
               In each card the 1st .fb-link is the official page and the
               2nd is the student council. -->
          <ul class="colleges">

            <li>
              <article class="college" style="--accent:#1f8a3b">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-caf.webp') ?>" alt="College of Agriculture and Forestry seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Agriculture and Forestry</h2>
                  <p class="college__code">CAF</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/taucafamily" target="_blank" rel="noopener" aria-label="College of Agriculture and Forestry official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/taucafupdates" target="_blank" rel="noopener" aria-label="College of Agriculture and Forestry student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

            <li>
              <article class="college" style="--accent:#f26a0f">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-cas.webp') ?>" alt="College of Arts and Sciences seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Arts and Sciences</h2>
                  <p class="college__code">CAS</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/profile.php?id=100064029942024" target="_blank" rel="noopener" aria-label="College of Arts and Sciences official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/TAUCASSC" target="_blank" rel="noopener" aria-label="College of Arts and Sciences student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

            <li>
              <article class="college" style="--accent:#e9a800">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-cbm.webp') ?>" alt="College of Business and Management seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Business and Management</h2>
                  <p class="college__code">CBM</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/CBMTAU" target="_blank" rel="noopener" aria-label="College of Business and Management official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/taucbm" target="_blank" rel="noopener" aria-label="College of Business and Management student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

            <li>
              <article class="college" style="--accent:#1a4a9a">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-coed.webp') ?>" alt="College of Education seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Education</h2>
                  <p class="college__code">COED</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/EDUKFalcons" target="_blank" rel="noopener" aria-label="College of Education official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/tauCEDStudentCouncil" target="_blank" rel="noopener" aria-label="College of Education student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

            <li>
              <article class="college" style="--accent:#8f2f35">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-cet.webp') ?>" alt="College of Engineering and Technology seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Engineering and Technology</h2>
                  <p class="college__code">CET</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/profile.php?id=61574385832161" target="_blank" rel="noopener" aria-label="College of Engineering and Technology official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/TAUCollegeOfEngineeringAndTechnology" target="_blank" rel="noopener" aria-label="College of Engineering and Technology student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

            <li>
              <article class="college" style="--accent:#2f5a2a">
                <div class="college__seal"><img src="<?= base_url('assets/Images/logo-cvm.webp') ?>" alt="College of Veterinary Medicine seal" width="520" height="520"></div>
                <div class="college__body">
                  <h2>College of Veterinary Medicine</h2>
                  <p class="college__code">CVM</p>
                </div>
                <div class="college__links">
                  <a class="fb-link" href="https://www.facebook.com/taucvmofficial" target="_blank" rel="noopener" aria-label="College of Veterinary Medicine official Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Official page" data-tl="Opisyal na pahina">Official page</span>
                  </a>
                  <a class="fb-link" href="https://www.facebook.com/profile.php?id=61553202523949" target="_blank" rel="noopener" aria-label="College of Veterinary Medicine student council Facebook page">
                    <svg aria-hidden="true"><use href="#icon-fb"/></svg><span data-en="Student council" data-tl="Konseho ng Mag-aaral">Student council</span>
                  </a>
                </div>
              </article>
            </li>

          </ul>

        </div>
      </section>
    </div>

  </div>
</main>

<?= $this->include('partials/footer') ?>

<script src="<?= base_url('assets/script.js') ?>"></script>
</body>
</html>
