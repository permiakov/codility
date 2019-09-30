<?php
function solution(array $a)
{
    $cnt = array_count_values($a);
    $n = count($a);
    if($n ==0) return -1;
    $leader = -1;
    $pos = -1;
    foreach ($cnt as $key => $value) {
        if ($value > intdiv($n, 2)) {
            $leader = $key;
        }
    }
    if($leader >= 0) {
        $pos = array_search($leader, $a);
    }
    return $pos;
}

echo solution([1,2,1]);