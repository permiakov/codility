<?php
//https://app.codility.com/programmers/lessons/3-time_complexity/tape_equilibrium/
//i did 
function solution1(array $a)
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
//i found and it's easy 
function solution2(array $a)
{
    $n = count($a);
    $head = $a[0];
    $tail = array_sum($a) - $head;

    $min = null;
    for ($p = 1; $p < $n; $p++) {
        $diff = abs($tail - $head);
        if (is_null($min)) {
            $min = $diff;
        }
        $min = min($min, $diff);
        $tail -= $a[$p];
        $head += $a[$p];
    }
    return $min;
}

//1
echo solution2([3, 1, 2, 4, 3]);
//1
echo solution2([3, 1, 1]);
//0
echo solution2([1, 2, 3, 4, 2]);