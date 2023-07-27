<?php

use Carbon\Carbon;

if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'd/m/Y')
    {
        if ($date instanceof Carbon) {
            return $date->format($format);
        } else {
            return Carbon::parse($date)->format($format);
        }

        return $date;
    }
}
