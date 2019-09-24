<?php

function solution(array $a)
{
    $n = count($a);
    if ($n == 1) {
        if ($a[0] == 1) {
            return 2;
        }
        return 1;
    }
    sort($a);
    if ($a[0] > 1) {
        return 1;
    }
    $res = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($a[$i] <= 0) {
            unset($a[$i]);
            continue;
        }
        if (isset($a[$i + 1]) && ($a[$i + 1] - $a[$i]) > 1) {
            return $a[$i] + 1;
        }
        $res = isset($a[$i - 1]) ? ($a[$i] + 1) : 1;
    }
    return $res ? $res : 1;
}


assert_options(ASSERT_EXCEPTION, 1);
assert(solution([1, 3, 6, 4, 1, 2]) == 5);
assert(solution([1, 2, 3]) == 4);
assert(solution([2]) == 1);
assert(solution([4, 5, 6, 2]) == 1);
assert(solution([-1000000, 1000000]) == 1);
assert(solution([-1, -3]) == 1);
echo 'Success';