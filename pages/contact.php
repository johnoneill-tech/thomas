<main>

    <section class="contact-page py-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="info-card text-center">

                        <h3 class="mb-4">Contact Information</h3>

                        <?php if (!empty($global_info['phone'])): ?>
                            <p class="mb-2">
                                <strong>Phone:</strong><br>
                                <a href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>">
                                    <?= htmlspecialchars($global_info['phone']) ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($global_info['email'])): ?>
                            <p class="mb-2">
                                <strong>Email:</strong><br>
                                <a href="mailto:<?= htmlspecialchars($global_info['email']) ?>">
                                    <?= htmlspecialchars($global_info['email']) ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php if (!empty($global_info['facebook_url'])): ?>
                            <p class="mb-4">
                                <strong>Facebook:</strong><br>
                                <a href="<?= htmlspecialchars($global_info['facebook_url']) ?>" target="_blank">
                                    Visit our Facebook page
                                </a>
                            </p>
                        <?php endif; ?>

                        <div class="d-grid gap-2 mt-3">

                            <?php if (!empty($global_info['phone'])): ?>
                                <a href="tel:<?= htmlspecialchars(clean_phone_link($global_info['phone'])) ?>"
                                   class="btn btn-primary btn-lg">
                                    Call Now
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($global_info['email'])): ?>
                                <a href="mailto:<?= htmlspecialchars($global_info['email']) ?>"
                                   class="btn btn-outline-light btn-lg">
                                    Email Us
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($global_info['facebook_url'])): ?>
                                <a href="<?= htmlspecialchars($global_info['facebook_url']) ?>"
                                   target="_blank"
                                   class="btn btn-outline-light btn-lg">
                                    Facebook
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</main>