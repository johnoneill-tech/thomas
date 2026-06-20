<footer class="site-footer py-4 mt-5">
    <div class="container text-center">

        <p class="mb-1">
            &copy; <?= date('Y') ?> <?= htmlspecialchars($site_name ?? 'Thomas Amusements') ?>, Inc.
        </p>

        <?php if (!empty($global_info['phone'])): ?>
            <p class="mb-1">
                <strong>Phone:</strong>
                <a href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>">
                    <?= htmlspecialchars($global_info['phone']) ?>
                </a>
            </p>
        <?php endif; ?>

        <?php if (!empty($global_info['facebook_url'])): ?>
            <p class="mb-0">
                <a href="<?= htmlspecialchars($global_info['facebook_url']) ?>"
                target="_blank"
                class="d-inline-flex align-items-center gap-2">

                    <span>Follow us on</span>

                    <img src="assets/images/Facebook_Logo_Primary.png"
                        alt="Facebook"
                        style="height: 24px; width: auto;">
                </a>
            </p>
        <?php endif; ?>

        <p class="mt-3 small mb-0">
            Website by:
            <a href="https://johnoneill.tech"
               target="_blank"
               rel="noopener">
                johnoneill.tech
            </a>
        </p>

    </div>
</footer>

<?php if (!empty($featured_stop) || !empty($global_info['phone'])): ?>
<div class="mobile-actions d-md-none">

    <?php if (!empty($featured_stop)): ?>
        <a href="<?= htmlspecialchars(build_maps_url($featured_stop)) ?>"
           target="_blank"
           class="btn btn-primary flex-fill">
            Directions
        </a>
    <?php endif; ?>

    <?php if (!empty($global_info['phone'])): ?>
        <a href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>"
           class="btn btn-success flex-fill">
            Call
        </a>
    <?php endif; ?>

    <a href="index.php?page=schedule"
       class="btn btn-dark flex-fill">
        Schedule
    </a>

</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>