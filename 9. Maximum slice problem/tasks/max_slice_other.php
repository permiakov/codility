<?php
//Kadane's Algorythm
//https://www.youtube.com/watch?v=86CQq3pKSUw
function solution(array $a)
{
    $global = $current = $a[0];
    $n = count($a);
    for ($i = 1; $i < $n; $i++) {
        $current = max($a[$i], $current + $a[$i]);
        if ($current > $global) {
            $global = $current;
        }
    }
    return $global;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution([1, 1]) == 2);
echo 'Success';

