<?php

function solution(array $a, int $k)
{
    if(empty($a)) return [];
    $n = count($a);
    while ($k > 0) {
        $t = $a[$n - 1];
        for ($j = $n - 1; $j > 0; $j--) {
           $a[$j] =  $a[$j - 1];
        }
        $a[0] = $t;
        $k--;
    }
    return $a;

}

//9, 7, 6, 3, 8
var_dump(solution([3, 8, 9, 7, 6], 3));