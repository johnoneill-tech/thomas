<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($site_name ?? 'Thomas Amusements') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <meta name="description" content="Thomas Amusements - travelling midway rides, games, and family entertainment in Newfoundland and Labrador.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>

<header class="site-header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php">
                <img src="assets/images/thomas-logo1.png"
                     alt="Thomas Amusements Logo"
                     class="me-2 logo-img">

                <span><?= htmlspecialchars($site_name ?? 'Thomas Amusements') ?></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=schedule">Schedule</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=rides">Rides</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=contact">Contact</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <?php if (!empty($notice['active']) && !empty($notice['message'])): ?>
        <div class="site-notice site-notice-<?= htmlspecialchars($notice['type']) ?>">
            <?= nl2br(htmlspecialchars($notice['message'])) ?>
        </div>
    <?php endif; ?>

</header>