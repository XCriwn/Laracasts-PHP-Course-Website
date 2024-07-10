<?php

namespace core;
class Validator{
    public static function stringMinMax($value, $min = 0, $max = INF): bool
    {
        $value = trim($value);
        return !(strlen($value) > $min && strlen($value) < $max);
    }

    public static function email($value): bool
    {
        if(str_contains($value, '@') && strlen($value) > 3) return false;
        else return true;
    }

}