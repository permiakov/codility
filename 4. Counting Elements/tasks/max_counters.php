<?php

function solution(int $n, array $a)
{
    $m = count($a);
    $r = array_fill(0, $n, 0);
    $max = 0;
    $maxZero = 0;
    for ($i = 0; $i < $m; $i++) {
        $index = $a[$i] - 1;
        if (($a[$i] <= $n)) {
            $r[$index] = max($maxZero, $r[$index]);
            $r[$index]++;
            $max = max($max, $r[$index]);
        } else {
            $maxZero = $max;
        }
    }
    foreach ($r as $i => $value) {
            $r[$i] = max($r[$i], $maxZero);
    }

    return $r;
}


assert_options(ASSERT_EXCEPTION, 1);
assert(solution(5, [3, 4, 4, 6, 1, 4, 4]) === [3, 2, 2, 4, 2]);
echo 'Success';