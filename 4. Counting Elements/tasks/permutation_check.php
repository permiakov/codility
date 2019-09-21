<?php


function solution(array $a)
{
    $n = count($a);
    $cnt = array_count_values($a);
    foreach ($cnt as $value) {
        if ($value > 1) {
            return 0;
        }
    }
    return array_sum($a) == $n * ($n + 1) / 2;
}

echo solution([4, 3, 1]);
echo solution([4, 3, 1, 1]);