<?php
function solution(array $a)
{
    $n = count($a);
    $left = $right = [];
    $prev = $a[0];
    for ($i = 1; $i < $n; $i++) {
        $left[$i] = $prev;
        $prev += $a[$i];
    }

    $prev = 0;
    for ($i = $n - 1; $i > 0; $i--) {
        $prev += $a[$i];
        $right[$i] = $prev;
    }

    $min = null;
    for ($i = 1; $i < $n; $i++) {
        $diff = abs($left[$i] - $right[$i]);
        if (is_null($min)) {
            $min = $diff;
        }
        $min = min($min, $diff);
    }

    return $min;
}

//1
echo solution([3, 1, 2, 4, 3]);
//1
echo solution([3, 1, 1]);
//0
echo solution([1, 2, 3, 4, 2]);