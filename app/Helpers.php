<?php

class Helpers
{
    public static function force_decimal($number, $place)
    {
        return number_format($number, $place);
    }

    public static function percentage($decimal, $place)
    {
        $multiplied = $decimal * 100;
        return number_format($multiplied, $place) . '%';
    }
    public static function ranked()
    {
    }
}
