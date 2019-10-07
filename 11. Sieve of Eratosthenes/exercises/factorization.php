<?php

function solution($x)
{
    $arr = array_factorized($x);

    $primeFactors = [];
    while ($arr[$x] > 0) {
        $primeFactors[] = $arr[$x];
        $x /= $arr[$x];
    }

    $primeFactors[] = $x;
    return $primeFactors;
}

function array_factorized($n)
{
    $arr = array_fill(0, $n + 1, 0);
    $i = 2;

    while ($i * $i <= $n) {
        if ($arr[$i] == 0) {
            $k = $i * $i;
            while ($k <= $n) {
                if ($arr[$k] == 0) {
                    $arr[$k] = $i;
                }
                $k += $i;
            }
        }
        $i += 1;
    }
    return $arr;

}

print_r(solution(20));