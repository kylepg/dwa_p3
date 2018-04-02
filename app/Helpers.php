<?php

class Helpers
{
    public static function force_decimal($number, $place)
    {
        if (gettype($number) == "string" || $number == null) {
            return $number;
        } else {
            return number_format($number, $place);
        }
    }

    public static function percentage($decimal, $place)
    {
        if (gettype($decimal) == "string" || $decimal == null) {
            return $decimal;
        } else {
            $multiplied = $decimal * 100;
            return number_format($multiplied, $place) . '%';
        }
    }
    public static function ranked()
    {
        
    }
}
