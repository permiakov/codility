<?php


function solution(array $a)
{
    $cnt = [];
    $n = count($a);
    for ($i = 0; $i < $n; $i++) {
        @$cnt[$a[$i]]++;
    }
    $leader = null;
    foreach ($cnt as $value => $count) {
        if ($count > $n / 2) {
            $leader = $value;
        }
    }
    return is_null($leader) ? -1 : $leader;
}


echo solution([6, 8, 4, 6, 8, 6, 6]);