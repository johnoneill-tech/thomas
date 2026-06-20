<?php

$rides = [
    [
        'name' => 'Tilt A Whirl',
        'image' => 'TiltAWhirl-150.jpg',
        'type' => 'Family Ride',
    ],
    [
        'name' => 'Scrambler',
        'image' => 'Scrambler-280.jpg',
        'type' => 'Family Ride',
    ],
    [
        'name' => 'Tip Top',
        'image' => 'TipTop-280.jpg',
        'type' => 'Family Ride',
    ],
    [
        'name' => 'Carousel',
        'image' => 'Carousel-280.jpg',
        'type' => 'Family Ride',
    ],
    [
        'name' => 'Berry Go Round',
        'image' => 'BerryGoRound-280.jpg',
        'type' => 'Kiddie / Family Ride',
    ],
    [
        'name' => 'Fun Slide',
        'image' => 'FunSlide-560.jpg',
        'type' => 'Kiddie Ride',
    ],
    [
        'name' => 'Go Gator',
        'image' => 'GoGator-560.jpg',
        'type' => 'Kiddie Ride',
    ],
    [
        'name' => 'Kiddie Cars',
        'image' => 'KiddieCars-280.jpg',
        'type' => 'Kiddie Ride',
    ],
    [
        'name' => 'Cliffhanger',
        'image' => 'Cliffhanger-150.jpeg',
        'type' => 'Thrill Ride',
    ],
    [
        'name' => 'Tornado',
        'image' => 'Tornado-150.jpg',
        'type' => 'Thrill Ride',
    ],
    [
        'name' => 'Rock O Plane',
        'image' => 'RockOPlane-280.jpg',
        'type' => 'Thrill Ride',
    ],
    [
        'name' => 'Fireball',
        'image' => 'Fireball-280.jpg',
        'type' => 'Thrill Ride',
    ],
    [
        'name' => 'Starship 3000',
        'image' => 'Starship3000-280.jpg',
        'type' => 'Thrill Ride',
    ],
];

$games = [
    [
        'name' => 'Candyland',
        'image' => 'Candyland-560.jpg',
        'type' => 'Food & Beverage',
    ],
    [
        'name' => 'Frog Bog',
        'image' => 'FrogBog-280.jpg',
        'type' => 'Game',
    ],
    [
        'name' => 'Grand Prix Racing',
        'image' => 'GrandPrixRacing-280.jpg',
        'type' => 'Game',
    ],
    [
        'name' => 'Ticket Office',
        'image' => 'TicketOffice-280.jpg',
        'type' => 'Guest Services',
    ],
];
?>

<main>
    <section class="page-hero py-5">
        <div class="container text-center">
            <h1>Rides &amp; Attractions</h1>
                <p class="lead">Ride availability may vary by location.</p>
        </div>
    </section>

    <section class="rides-page py-1">
        <div class="container">

            <div class="row g-4 justify-content-center">

                <?php foreach ($rides as $ride): ?>
                    <?php $image_path = 'assets/images/' . $ride['image']; ?>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="ride-card text-center h-100">

                            <div class="ride-image-wrap d-flex align-items-center justify-content-center">
                                <img src="<?= htmlspecialchars($image_path) ?>"
                                    alt="<?= htmlspecialchars($ride['name']) ?>"
                                    class="ride-image img-fluid">
                            </div>

                            <div class="ride-card-body d-flex flex-column align-items-center justify-content-center">
                                <span class="ride-type mb-2">
                                    <?= htmlspecialchars($ride['type']) ?>
                                </span>

                                <h3 class="mb-0">
                                    <?= htmlspecialchars($ride['name']) ?>
                                </h3>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section class="games-page py-1">
        <div class="container">

            <div class="section-heading text-center mb-4">
                <h2>Games &amp; Guest Services</h2>
            </div>

            <div class="row g-4 justify-content-center">

                <?php foreach ($games as $game): ?>
                    <?php $image_path = 'assets/images/' . $game['image']; ?>

                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="ride-card text-center h-100">

                            <div class="ride-image-wrap d-flex align-items-center justify-content-center">
                                <img src="<?= htmlspecialchars($image_path) ?>"
                                    alt="<?= htmlspecialchars($game['name']) ?>"
                                    class="ride-image img-fluid">
                            </div>

                            <div class="ride-card-body d-flex flex-column align-items-center justify-content-center">
                                <span class="ride-type mb-2">
                                    <?= htmlspecialchars($game['type']) ?>
                                </span>

                                <h3 class="mb-0">
                                    <?= htmlspecialchars($game['name']) ?>
                                </h3>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

</main>