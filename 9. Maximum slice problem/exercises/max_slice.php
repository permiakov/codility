<?php
function solution1(array $a)
{
    $n = count($a);
    $max = null;
    for ($i = 0; $i < $n; $i++) {
        if (is_null($max)) {
            $max = $a[$i];
        }
        $sum = $a[$i];
        for ($j = $i + 1; $j < $n; $j++) {
            $sum += $a[$j];
            $max = max($sum, $max);
        }
    }
    return $max;
}

echo solution2([5, -7, 3, 5, -2, 4]);

function solution2(array $a)
{
    $end = $slice = 0;
    foreach ($a as $v) {
        $end = max(0, $end + $v);
        $slice = max($slice, $end);
    }
    return $slice;
}