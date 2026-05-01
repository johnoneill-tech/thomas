<main>

    <section class="hero-section position-relative text-white">

    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <div class="container position-relative py-5">
        <div class="row align-items-center g-4">

            <div class="col-lg-7 text-center text-lg-start">
                    <p class="hero-kicker">Bring on Some Fun in the Sun!</p>

                    <h1 class="hero-title">
                        <?= htmlspecialchars($site_name ?? 'Thomas Amusements') ?>
                    </h1>

                    <p class="hero-subtitle">
                        With over 15 thrill seeking rides for all ages, we offer attractions for the young and old.
                    </p>
                </div>

                <div class="col-lg-5">
                    <div class="featured-stop-card">

                        <?php if (!empty($featured_stop)): ?>

                            <div class="stop-status">
                                <?= $is_current ? 'Now In' : 'Next Stop' ?>
                            </div>

                            <h2><?= htmlspecialchars($featured_stop['location']) ?></h2>

                            <p class="venue">
                                <?= htmlspecialchars($featured_stop['venue']) ?>
                            </p>

                            <p class="dates">
                                <?= htmlspecialchars(format_stop_dates($featured_stop['start_date'], $featured_stop['end_date'])) ?>
                            </p>

                            <div class="d-grid gap-2 mt-3">
                                <a class="btn btn-primary btn-lg"
                                   href="<?= htmlspecialchars(build_maps_url($featured_stop)) ?>"
                                   target="_blank">
                                    Get Directions
                                </a>

                                <?php if (!empty($global_info['phone'])): ?>
                                    <a class="btn btn-outline-light btn-lg"
                                       href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>">
                                        Call <?= htmlspecialchars($global_info['phone']) ?>
                                    </a>
                                <?php endif; ?>

                                <a class="btn btn-outline-light btn-lg"
                                   href="index.php?page=schedule">
                                    View Full Schedule
                                </a>
                            </div>

                        <?php else: ?>

                            <div class="stop-status">Season Schedule</div>

                            <h2>Check Back Soon</h2>

                            <p class="venue">
                                Upcoming stops will be posted here.
                            </p>

                            <?php if (!empty($global_info['phone'])): ?>
                                <a class="btn btn-primary btn-lg w-100"
                                   href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>">
                                    Call <?= htmlspecialchars($global_info['phone']) ?>
                                </a>
                            <?php endif; ?>

                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="quick-info-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Hours -->
                <div class="col-md-4">
                    <div class="info-card h-100">
                        <h3 class="mb-3">Hours</h3>

                        <?php if (!empty($global_info['hours'])): ?>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($global_info['hours'] as $line): ?>
                                    <li class="mb-1"><?= htmlspecialchars($line) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="mb-0">Hours posted at each event.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="col-md-4">
                    <div class="info-card h-100">
                        <h3 class="mb-3">Pricing</h3>

                        <?php if (!empty($global_info['pricing'])): ?>
                            <ul class="list-unstyled mb-2">
                                <?php foreach ($global_info['pricing'] as $line): ?>
                                    <li class="mb-1"><?= htmlspecialchars($line) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Pricing available on site.</p>
                        <?php endif; ?>

                        <?php if (!empty($global_info['payments'])): ?>
                        <div class="d-flex align-items-center gap-2 mt-4">
                            <img src="assets/images/Square_Logo_2025_White.svg"
                                alt="Square accepted"
                                class="payment-logo-lg">

                            <span class="fw-bold mt-1">
                                <?= htmlspecialchars($global_info['payments']) ?>
                            </span>
                        </div>                        
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Updates -->
                <div class="col-md-4">
                    <div class="info-card h-100">
                        <h3 class="mb-3">Updates</h3>

                        <p class="mb-2">
                            Weather delays and same-day notices will be posted at the top of this page.
                        </p>

                        <?php if (!empty($global_info['facebook_url'])): ?>
                            <a href="<?= htmlspecialchars($global_info['facebook_url']) ?>"
                            target="_blank"
                            class="btn btn-outline-light btn-sm">
                                Follow on Facebook
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="schedule-preview py-5">
        <div class="container">
            <div class="section-heading text-center mb-4">
                <h2>Upcoming Stops</h2>
            </div>

            <div class="row g-3">
                <?php
                $shown = 0;

                foreach ($stops as $stop):
                    if ($stop['end_date'] < $today) {
                        continue;
                    }

                    if (
                        !empty($current_stop) &&
                        $stop['start_date'] === $current_stop['start_date'] &&
                        $stop['end_date'] === $current_stop['end_date'] &&
                        $stop['location'] === $current_stop['location'] &&
                        $stop['venue'] === $current_stop['venue']
                    ) {
                        continue;
                    }

                    if ($shown >= 6) {
                        break;
                    }

                    $shown++;
                                ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="schedule-card text-center h-100 d-flex flex-column justify-content-center">
                            <h3 class="schedule-location mb-1"><?= htmlspecialchars($stop['location']) ?></h3>

                            <p class="venue mb-1">
                                <?= htmlspecialchars($stop['venue']) ?>
                            </p>

                            <p class="dates mb-2">
                                <?= htmlspecialchars(format_stop_dates($stop['start_date'], $stop['end_date'])) ?>
                            </p>

                            <a href="<?= htmlspecialchars(build_maps_url($stop)) ?>" target="_blank">
                                Directions
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($shown === 0): ?>
                    <div class="col-12 text-center">
                        <p>No upcoming stops are currently listed.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-4">
                <a href="index.php?page=schedule" class="btn btn-primary btn-lg">
                    View Complete Schedule
                </a>
            </div>
        </div>
    </section>

    <section class="rides-preview py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-lg-6">
                    <h2>Rides, Games &amp; Family Fun</h2>

                    <p>
                        Thomas Amusements brings over 15 thrill seeking rides for all ages throughout Newfoundland and Labrador, offering attractions for young and old.
                    </p>

                    <a href="index.php?page=rides" class="btn btn-outline-light btn-lg">
                        View Rides
                    </a>
                </div>

                <div class="col-lg-6">
                    <div class="rides-preview-image-wrap">
                        <img src="assets/images/Thomas-wide-shot.jpg"
                            alt="Thomas Amusements midway"
                            class="img-fluid rides-preview-image">
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
