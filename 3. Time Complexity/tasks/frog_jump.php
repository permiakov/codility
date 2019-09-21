<?php

function solution($x, $y, $d)
{
    return (int)ceil(($y - $x) / $d);
}

echo solution(10, 85, 30);