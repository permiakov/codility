<?php

//if A is a divisor of N then N / A is also a divisor
// one of two divisors must be less than or equal to sqrt(N)
// we iterate from 1 to sqrt(N)
// if  N % A ==0 then we found two different divisors like 2*3=6 (count as 2)
// $i * $i is equal to N then we found symmetric divisor(it should be count as 1)
function solution(int $n)
{
    $result = 0;
    for ($i = 1; $i * $i < $n; $i++) {
        if ($n % $i == 0) {
            $result += 2;
        }
    }
    if ($i * $i == $n) {
        $result += 1;
    }
    return $result;
}

//divisors are 1,2,3,4,6,9,12,18,36
echo solution(36);
