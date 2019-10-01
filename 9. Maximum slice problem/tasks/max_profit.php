<?php

function solution1(array $a)
{
    $n = count($a);
    $max = null;
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {

            $diff = $a[$j] - $a[$i];
            if (is_null($max)) {
                $max = $diff;
            }
            $max = max($diff, $max);
        }
    }
    return $max > 0 ? $max : 0;
}

function solution2(array $a)
{
    $min = 200000;
    $diff = 0;
    foreach ($a as $day) {
        $min = min($day, $min);
        $diff = max($diff, $day - $min);
    }
    return $diff;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution2([23171, 21011, 21123, 21366, 21013, 21367]) == 356);
echo 'Success';
