<?php
//An array A consisting of N different integers is given. 
//The array contains integers in the range [1..(N + 1)], which means that exactly one element is missing.
//Your goal is to find that missing element.

function solution(array $a)
{
    $n = count($a) + 1;
    return (($n * ($n + 1) / 2) - array_sum($a));
}

echo solution([2, 3, 1, 5]);