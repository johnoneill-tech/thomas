<main>

    <section class="page-hero py-5">
        <div class="container text-center">
            <h1 class="mb-2">Schedule</h1>
            <p class="lead mb-0">
                Find Thomas Amusements across Newfoundland and Labrador.
            </p>
        </div>
    </section>

    <section class="schedule-page py-5">
        <div class="container">

            <?php if (!empty($featured_stop)): ?>
                <div class="current-schedule-card mb-5">
                    <div class="row align-items-center g-4">

                        <div class="col-lg-8 text-center text-lg-start">
                            <div class="stop-status mb-1">
                                <?= !empty($is_current) ? 'Now In' : (ISSET($today, $season_start) && $today < $season_start ? 'First Stop' : 'Next Stop') ?>
                            </div>

                            <h2 class="mb-1">
                                <?= htmlspecialchars($featured_stop['location']) ?>
                            </h2>

                            <p class="venue mb-1">
                                <?= htmlspecialchars($featured_stop['venue']) ?>
                            </p>

                            <p class="dates mb-0">
                                <?= htmlspecialchars(format_stop_dates($featured_stop['start_date'], $featured_stop['end_date'])) ?>
                            </p>
                        </div>

                        <div class="col-lg-4">
                            <div class="d-grid gap-2">
                                <a class="btn btn-primary btn-lg"
                                   href="<?= htmlspecialchars(build_maps_url($featured_stop)) ?>"
                                   target="_blank">
                                    Get Directions
                                </a>

                                <a class="btn btn-outline-light btn-lg"
                                   href="index.php">
                                    Back to Home
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endif; ?>

            <div class="section-heading text-center mb-4">
                <h2 class="mb-2">Full Season Schedule</h2>
                <p class="mb-0">
                    Dates may change because of weather or operational adjustments.
                    Check the homepage notice for same-day updates.
                </p>
            </div>

            <div class="d-grid gap-3">

<?php            $stops = $stops ?? [];
                $today = $today ?? date('Y-m-d'); ?>

                <?php foreach ($stops as $stop): ?>
                    <?php
                    $is_past = $stop['end_date'] < $today;

                    if ($is_past) {
                        continue;
                    }

                    $is_active = $today >= $stop['start_date'] && $today <= $stop['end_date'];
                    $is_upcoming = $stop['start_date'] > $today;

                    $row_classes = 'schedule-row';

                    if ($is_active) {
                        $row_classes .= ' schedule-row-active';
                    }
                    ?>

                    <article class="<?= htmlspecialchars($row_classes) ?>">
                        <div class="row align-items-center g-3 text-center text-lg-start">
                    <?php if (ISSET($stop['change']) && $stop['change'] == 1): ?>
                    <div class="col-12 w-100 text-center"><span class="fw-bold h4 w-100 text-center">** Schedule Change **</span></div>
                    <?php endif; ?>

                            <div class="col-lg-3">
                                <div class="schedule-date">
                                    <?= htmlspecialchars(format_stop_dates($stop['start_date'], $stop['end_date'])) ?>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <h3 class="mb-1">
                                    <?= htmlspecialchars($stop['location']) ?>
                                </h3>

                                <p class="venue mb-0">
                                    <?= htmlspecialchars($stop['venue']) ?>
                                </p>
                            </div>

                            <div class="col-lg-2">
                                <?php if ($is_active): ?>
                                    <span class="schedule-badge schedule-badge-active">Now Open</span>
                                <?php elseif ($is_upcoming): ?>
                                    <span class="schedule-badge schedule-badge-upcoming">Upcoming</span>
                                <?php else: ?>
                                    <span class="schedule-badge schedule-badge-past">Finished</span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-2">
                                <div class="d-grid">
                                    <a class="btn btn-sm btn-outline-light"
                                       href="<?= htmlspecialchars(build_maps_url($stop)) ?>"
                                       target="_blank">
                                        Directions
                                    </a>
                                </div>
                            </div>

                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

</main>