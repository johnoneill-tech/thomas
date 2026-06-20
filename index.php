<?php

date_default_timezone_set('Canada/Newfoundland');

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/stops.php';
require_once __DIR__ . '/includes/functions.php';

$page = $_GET['page'] ?? 'home';

$allowed_pages = [
    'home'         => 'home.php',
    'schedule'     => 'schedule.php',
    'rides'        => 'rides.php',
    'about'        => 'about.php',
    'contact'      => 'contact.php',
    'admin-notice' => 'admin-notice.php',
];

if (!array_key_exists($page, $allowed_pages)) {
    $page = 'home';
}

$today = date('Y-m-d');

$current_stop = null;
$next_stop = null;

foreach ($stops as $stop) {
    if ($today >= $stop['start_date'] && $today <= $stop['end_date']) {
        $current_stop = $stop;
        break;
    }

    if ($next_stop === null && $stop['start_date'] > $today) {
        $next_stop = $stop;
    }
}

$featured_stop = $current_stop ?? $next_stop;
$is_current = $current_stop !== null;

$notice = [
    'active' => false,
    'type' => 'info',
    'message' => '',
    'updated' => '',
];

$notice_file = __DIR__ . '/includes/notice_data.json';

if (file_exists($notice_file)) {
    $notice_data = json_decode(file_get_contents($notice_file), true);

    if (is_array($notice_data)) {
        $notice = array_merge($notice, $notice_data);
    }
}

if (
    empty($notice['active']) ||
    empty($notice['message']) ||
    empty($notice['notice_date']) ||
    $notice['notice_date'] !== $today
) {
    $notice['active'] = false;
}

$season_start = $stops[0]['start_date'] ?? '2026-06-04';

if (!$notice['active']) {
    if (!empty($current_stop)) {
        $notice = [
            'active' => true,
            'type' => 'info',
            'message' => 'Now open in ' . $current_stop['location'] . ' at ' . $current_stop['venue'] . '!',
            'updated' => '',
        ];
    } elseif ($today < $season_start) {
        $notice = [
            'active' => true,
            'type' => 'info',
            'message' => "EXCITED TO GET GOING FOR THE 2026 SEASON ON " . date('F j', strtotime($season_start)) . "!",
            'updated' => '',
        ];
    }
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/pages/' . $allowed_pages[$page];
require_once __DIR__ . '/includes/footer.php';