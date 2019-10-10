<?php
//my solution 100%
function solution1(int $n, int $m)
{
    if ($n == 1) {
        return 1;
    }
    if ($m == 1) {
        return $n;
    }
    $i = 1;
    $x = $n;
    while ($x > 0) {
        $total = $n * $i;
        $x = $total % $m;
        if ($x == 0) {
            return $total / $m;
        }
        $i++;
    }

}

//from the web
function solution($n, $m)
{

    if ($n === 1) {
        return 1;
    }

    if ($m === 1) {
        return $n;
    }

    return $n / gcd($n, $m);
}

function gcd($a, $b)
{
    if ($a % $b === 0) {
        return $b;
    } else {
        return gcd($b, $a % $b);
    }
}

//echo solution(1000000000, 1);
//echo solution(1, 1000000000);
//echo solution(12, 21);
//echo solution(10, 4);
