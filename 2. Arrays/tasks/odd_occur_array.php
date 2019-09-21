<?php

function solution(array $a)
{
    $n = count($a);
    if ($n == 1) {
        return $a[0];
    }
    if ($n == 2) {
        return 0;
    }
    sort($a);
    //iterate through sorted aray with step 2 to see 
    for ($i = 0; $i < $n; $i += 2) {
        //if next index is outside of array
        //or next item != current item
        if ($n == ($i + 1) || $a[$i + 1] != $a[$i]) {
            return $a[$i];
        }
    }
}

echo solution([9, 3, 9, 3, 9, 7, 9]);
echo solution([1, 1, 2]);
