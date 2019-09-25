<?php
//Problem: You are given a zero-indexed array A consisting of n > 0 integers; 
//you must return the number of unique values in array A.

function solution(array $a)
{
    sort($a);
    $n = count($a);
    $result = 1;
    for ($i = 1; $i < $n; $i++) {
        if ($a[$i] !== $a[$i - 1]) {
            $result++;
        }
    }
    return $result;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution([1, 2, 1, 2, 3, 4, 5]) == 5);
echo 'Success';
