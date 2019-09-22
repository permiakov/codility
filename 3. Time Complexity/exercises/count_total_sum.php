<?php
//O(n2)
function slow(int $n)
{
    $result = 0;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $i + 1; $j++) {
            $result += 1;
        }
    }
    return $result;
}

echo slow(100);
//O(n)
function fast(int $n)
{
    $result = 0;
    for ($i = 0; $i < $n; $i++) {
        $result += $i + 1;
    }
    return $result;
}

echo fast(100);
//O(1)
function fastest(int $n)
{
    return $n * ($n + 1) / 2;
}

echo fastest(100);