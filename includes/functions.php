<?php

function format_stop_dates(string $start_date, string $end_date): string
{
    $start = strtotime($start_date);
    $end = strtotime($end_date);

    if (date('Y-m', $start) === date('Y-m', $end)) {
        return date('F j', $start) . ' - ' . date('j, Y', $end);
    }

    return date('F j', $start) . ' - ' . date('F j, Y', $end);
}

function build_maps_url(array $stop): string
{
    $query_parts = array_filter([
        $stop['venue'] ?? '',
        $stop['location'] ?? '',
        'NL',
    ]);

    return 'https://www.google.com/maps/search/?api=1&query=' . urlencode(implode(' ', $query_parts));
}

function clean_phone_link(string $phone): string
{
    return preg_replace('/[^0-9+]/', '', $phone);
}
