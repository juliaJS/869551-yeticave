<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function time_before_tomorrow()
{
    $ts_midnight = strtotime('tomorrow');
    $sec_to_midnight = $ts_midnight - time();

    $hours = floor($sec_to_midnight / 3600);
    $minutes = floor(($sec_to_midnight % 3600) / 60);

    return sprintf('%02d', $hours) . ':' . sprintf('%02d', $minutes);
}

function cut_num($price)
{
    $num = ceil($price);

    if ($num > 1000) {
        $price = number_format($num, 0, null, ' ');
        $price .= " ₽";
    }
    return $price;
}