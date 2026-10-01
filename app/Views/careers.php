<link rel="stylesheet" href="<?= base_url('assets/css/careers.css') ?>">

<main class="careers-page" data-hash-sync="true">

  <!-- ===================== CAREER & JOB PLACEMENT ===================== -->
  <section class="jp-section" id="job-placement">

    <!-- Job feed, bulletin style (Option 3) -->
    <div class="jp-feed" id="job-placement-list">

      <div class="jp-feed-head">
        <span class="jp-eyebrow">Latest Updates</span>
        <h2 class="jp-list-title">Job &amp; Career Opportunities</h2>
      </div>

      <div class="jp-feed-layout">

        <!-- Featured: Field Agronomist -->
        <div class="jp-featured">
          <div class="jp-featured-img" style="background-image:url('<?= base_url('assets/Images/job-agronomist.jpg') ?>');" role="img" aria-label="Field Agronomist job opportunity"></div>
          <div class="jp-featured-caption">
            <span class="jp-featured-tag">Hiring Now</span>
            <h3 class="jp-featured-title">Job Opportunity | Field Agronomist</h3>
            <p class="jp-featured-text">The TAU Student Placement Office is pleased to share a job opportunity for interested TAU graduates and graduating students. Assignment areas: Tarlac, Pampanga, and Nueva Vizcaya. Fresh graduates are encouraged to apply!</p>
            <button type="button" class="jp-featured-link" data-modal="jpAgronomistModal">Read More <span>→</span></button>
          </div>
        </div>

        <!-- vertical divider -->
        <div class="jp-feed-divider"></div>

        <!-- Sidebar list -->
        <div class="jp-sidebar">
          <h3 class="jp-sidebar-heading">More Updates</h3>

          <div class="jp-sidebar-list">
            <button type="button" class="jp-sidebar-item" data-modal="jpDoleModal">
              <div class="jp-sidebar-text">
                <h4>DOLE Region III &mdash; Labor Market Update</h4>
                <span>Department of Labor and Employment</span>
              </div>
              <div class="jp-sidebar-img" style="background-image:url('<?= base_url('assets/Images/dole-update.jpg') ?>');" role="img" aria-label="DOLE Region III labor market update"></div>
            </button>

            <button type="button" class="jp-sidebar-item" data-modal="jpAgronomistModal">
              <div class="jp-sidebar-text">
                <h4>Field Agronomist &mdash; ESSI</h4>
                <span>Tarlac, Pampanga, Nueva Vizcaya</span>
              </div>
              <div class="jp-sidebar-img" style="background-image:url('<?= base_url('assets/Images/job-agronomist.jpg') ?>');" role="img" aria-label="Field Agronomist job opportunity"></div>
            </button>
          </div>
        </div>

      </div>
    </div>

  </section>

</main>