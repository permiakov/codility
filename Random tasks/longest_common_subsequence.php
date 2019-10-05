<?php

function solution(string $s1, string $s2): int
{
    return getCommon($s1, $s2, strlen($s1), strlen($s2));
}

function getCommon(string $p, string $q, int $n, int $m): int
{
    if ($n == 0 || $m == 0) {
        $result = 0;
    } elseif ($p[$n - 1] == $q[$m - 1]) {
        $result = 1 + getCommon($p, $q, $n - 1, $m - 1);
    } elseif ($p[$n - 1] != $q[$m - 1]) {
        $t1 = getCommon($p, $q, $n - 1, $m);
        $t2 = getCommon($p, $q, $n, $m - 1);
        $result = max($t1, $t2);
    }
    return $result;

}

echo solution('BATD', 'ABACD');