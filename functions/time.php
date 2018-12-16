<?php

function time_before_tomorrow()
{
    $ts_midnight = strtotime('tomorrow');
    $sec_to_midnight = $ts_midnight - time();

    $hours = floor($sec_to_midnight / 3600);
    $minutes = floor(($sec_to_midnight % 3600) / 60);

    return sprintf('%02d', $hours) . ':' . sprintf('%02d', $minutes);
}
