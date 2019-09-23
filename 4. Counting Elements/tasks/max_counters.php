<?php

function solution1(int $n, array $a)
{
    $m = count($a);
    $r = array_fill(0, $n, 0);
    $max = 0;
    $visited = [];
    $maxZero = 0;
    for ($i = 0; $i < $m; $i++) {
        $index = $a[$i] - 1;
        if (($a[$i] <= $n)) {
            if ($r[$index] == 0 && $maxZero > 0) {
                $r[$index] = $maxZero;
            }
            $r[$index]++;
            $max = max($max, $r[$index]);
            $visited[] = $index;
        } else {
            $maxZero = $max;
            foreach ($visited as $visIndex) {
                $r[$visIndex] = $max;
            }
        }
    }
    foreach ($r as $i => $value) {
        if ($r[$i] == 0) {
            $r[$i] += $maxZero;
        }
    }

    return $r;
}


assert_options(ASSERT_EXCEPTION, 1);
assert(solution(5, [3, 4, 4, 6, 1, 4, 4]) === [3, 2, 2, 4, 2]);
echo 'Success';