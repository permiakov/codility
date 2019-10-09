<?php


function substraction(int $a, int $b)
{
    if ($a == $b) {
        return $a;
    }
    if ($a > $b) {
        return substraction($a - $b, $b);
    } else {
        return substraction($a, $b - $a);
    }
}

function modular(int $a, int $b)
{
    if ($a % $b == 0) {
        return $b;
    } else {
        return modular($b, $a % $b);
    }
}

//Binary Euclidean algorithm
//optimal for values
// it has O(log N) where modular has O(log N * log log N)
function optimal(int $a, int $b, int $res)
{
    if ($a == $b) {
        return $res * $a;
    } elseif ($a % 2 == 0 && $b % 2 == 0) {
        return optimal($a / 2, $b / 2, 2 * $res);
    } elseif ($a % 2 == 0) {
        return optimal($a / 2, $b, $res);
    } elseif ($b % 2 == 0) {
        return optimal($a, $b / 2, $res);
    } elseif ($a > $b) {
        return optimal($a - $b, $b, $res);
    } else {
        return optimal($a, $b - $a, $res);
    }
}

var_dump(optimal(20, 10, 1));
