<?php

function format_money($money)
{
    if(!$money) {
        return "KES 0.00";
    }

    $money = number_format($money, 2);

    if(strpos($money, '-') !== false) {
        $formatted = explode('-', $money);
        return "-\ KES $formatted[1]";
    }

    return "KES $money";
}
