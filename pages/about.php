<main>

    <section class="page-hero py-5">
        <div class="container text-center">
            <h1 class="mb-2">About Us</h1>
            <p class="lead mb-0">
                Locally owned and operated in Newfoundland and Labrador.
            </p>
        </div>
    </section>

    <section class="about-page py-1 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <div class="about-card">

                        <h2 class="mb-3">Thomas Amusements Inc.</h2>

                        <p>
                            A locally owned and operated Newfoundland and Labrador company. The company has been 
                            operating in the Atlantic Provinces since 1963 and exclusively in
                            Newfoundland and Labrador since 1983.
                        </p>

                        <p>
                            Each season, Thomas Amusements employs staff with full-time seasonal
                            employment from late May until late September. Staff members come from various communities
                            across Newfoundland and Labrador.
                        </p>

                        <p>
                            Scheduling is completed during the winter months, with an effort made to reach all areas of
                            the island. Locations are rotated to help accommodate communities throughout different
                            regions of Newfoundland.
                        </p>

                        <p>
                            If your community is hosting an event and would like Thomas Amusements Inc. to participate,
                            please contact us in advance through the email address on the Contact page. If there is no
                            scheduling conflict, we would be happy to take part in more events throughout the island.
                        </p>

                        <p>
                            Thomas Amusements Inc. is always interested in recruiting new staff. Anyone interested in
                            travelling the island and helping provide family entertainment is encouraged to contact us.
                        </p>

                        <p>
                            Families come to enjoy a unique experience, friends come for a night out, and kids smile
                            from ear to ear. Thomas Amusements helps everyone feel young at heart with one of Atlantic
                            Canada's most exciting midways.
                        </p>

                        <p class="mb-0">
                            The amusement park employs local talent and operates only in Newfoundland, offering a
                            third-generation family-operated business with entertainment unlike anything else in the province.
                        </p>

                    </div>
<?php
$history = [
    [
        'header' => 'Since 1963',
        'event' => 'Operating in Atlantic Canada.'
    ],
    [
        'header' => 'Since 1983',
        'event' => 'Exclusively operates in Newfoundland and Labrador.'
    ],
    [
        'header' => 'Local Staff',
        'event' => 'Seasonal employment across the province.'
    ]
];
?>
                    <div class="row g-4 mt-4">

                    <?php foreach ($history as $item): ?>

                        <div class="col-md-4">
                            <div class="info-card text-center h-100">
                                <h3><?php echo $item['header']; ?></h3>
                                <p class="mb-0"><?php echo $item['event']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    </div>

                    <div class="text-center mt-4">
                        <a href="index.php?page=contact" class="btn btn-primary btn-lg">
                            Contact Us
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main>