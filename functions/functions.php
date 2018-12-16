<?php

function cut_num($price)
{
    $num = ceil($price);

    if ($num > 1000) {
        $price = number_format($num, 0, null, ' ');
        $price .= " ₽";
    }
    return $price;
}
