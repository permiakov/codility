<?php

//Constant time O(1)
function constantFunc(int $n)
{
    return $n * $n;
}

//Logarithmic time O(log n)
//2 ** $x = $n (4 iterations for $n = 16) 
function logarithmicFunc(int $n)
{
    $result = 0;
    while ($n > 1) {
        $n /= 2;
        $result += 1;
        echo $result . PHP_EOL;
    }
    return $result;
}

logarithmicFunc(16);

//Linear time O(n)
function linear(int $n, array $a)
{
    for ($i = 0; $i < $n; $i++) {
        if ($a[$i] == 1) {
            return false;
        }
    }
    return true;
}

//Quadratic time O(n2) 5 will give 25 iterations
function quadtraticFunc(int $n)
{
    $result = 0;
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $result += 1;
        }
    }
    return $result;
}

echo quadtraticFunc(5);
//Linear O(n + m) 
function linear2(int $n, int $m)
{
    $result = 0;
    for ($i = 0; $i < $n; $i++) {
        $result += 1;
    }
    for ($j = 0; $j < $m; $j++) {
        $result += 1;
    }
    return $result;
}

echo linear2(5, 5);

//It is worth knowing that there are other types of time complexity such as factorial time O(n!)
//and exponential time O(2n).
//Algorithms with such complexities can solve problems only for
//very small values of n, because they would take too long to execute for large values of n.