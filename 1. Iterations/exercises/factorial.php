<?php

function solution(int $n)
{
    $f = 1;
    for ($i = 1; $i <= $n; $i++) {
        $f *= $i;
    }
    return $f;
}

echo solution(4);
