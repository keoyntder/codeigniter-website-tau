<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Research & Development | TAU</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/research.css') ?>">
</head>

<body>

<header class="research-header">
    <div class="research-topbar">
        <div class="research-logo">
            RESEARCH & DEVELOPMENT
        </div>

        <nav>
            <a href="<?= base_url() ?>">Home</a>
            <a href="#">Publications</a>
            <a href="#">Projects</a>
            <a href="#">Innovation</a>
            <a href="#">Contact</a>
        </nav>
    </div>
</header>

<?php 
    // Fallback static data if database is empty
    $featured = !empty($researchList[0]) ? $researchList[0] : [
        'category' => 'LATEST RESEARCH',
        'title' => 'Sustainable Agricultural Innovation for Future Generations',
        'description' => 'Tarlac Agricultural University continues to lead innovative research focused on sustainable farming, smart agriculture technologies, and community development initiatives.',
        'image' => 'news1.png'
    ];

    $card1 = !empty($researchList[1]) ? $researchList[1] : [
        'title' => 'Smart Irrigation System for Agricultural Productivity',
        'description' => 'Exploring IoT-enabled irrigation systems to improve water efficiency.',
        'image' => 'news1.png',
        'created_at' => date('Y-m-d')
    ];

    $side1 = !empty($researchList[2]) ? $researchList[2] : ['title' => 'Livestock Health Monitoring', 'image' => 'news1.png'];
    $side2 = !empty($researchList[3]) ? $researchList[3] : ['title' => 'Climate Resilient Crops', 'image' => 'news1.png'];
    $side3 = !empty($researchList[4]) ? $researchList[4] : ['title' => 'Renewable Energy Research', 'image' => 'news1.png'];
?>

<section class="featured-research">

    <div class="featured-left">
        <span class="research-tag"><?= esc($featured['category'] ?? 'LATEST RESEARCH') ?></span>

        <h1>
            <?= esc($featured['title']) ?>
        </h1>

        <p>
            <?= esc($featured['description']) ?>
        </p>

        <a href="#" class="read-btn">
            Read Research →
        </a>
    </div>

    <div class="featured-right">
        <img src="<?= base_url('assets/Images/' . ($featured['image'] ?: 'news1.png')) ?>" alt="<?= esc($featured['title']) ?>">
    </div>

</section>

<section class="latest-posts">

    <div class="section-title">
        <h2>Latest Research</h2>
        <a href="#">View All</a>
    </div>

    <div class="research-grid">

        <article class="research-card large">

            <img src="<?= base_url('assets/Images/' . ($card1['image'] ?: 'news1.png')) ?>">

            <div class="card-content">
                <span class="card-date"><?= date('F Y', strtotime($card1['created_at'] ?? 'now')) ?></span>

                <h3>
                    <?= esc($card1['title']) ?>
                </h3>

                <p>
                    <?= esc($card1['description']) ?>
                </p>
            </div>

        </article>

        <div class="research-side">

            <article class="small-card">
                <img src="<?= base_url('assets/Images/' . ($side1['image'] ?: 'news1.png')) ?>">
                <h4><?= esc($side1['title']) ?></h4>
            </article>

            <article class="small-card">
                <img src="<?= base_url('assets/Images/' . ($side2['image'] ?: 'news1.png')) ?>">
                <h4><?= esc($side2['title']) ?></h4>
            </article>

            <article class="small-card">
                <img src="<?= base_url('assets/Images/' . ($side3['image'] ?: 'news1.png')) ?>">
                <h4><?= esc($side3['title']) ?></h4>
            </article>

        </div>

    </div>

</section>

</body>
</html>