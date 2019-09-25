<?php
function solution(array $a)
{
    $n = count($a) - 1;
    $sum = 0;
    $total = 0;
    for ($i = $n; $i >= 0; $i--) {
        if ($a[$i] == 1) {
            $sum++;
        } else {
            $total += $sum;
        }
        if ($total > 1000000) {
            return -1;
        }
    }
    return $total;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution([0, 1, 0, 1, 1]) == 5);
echo 'Success';