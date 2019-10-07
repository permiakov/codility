<?php
//finding prime numbers with Sieve of Eratosthenes
function solution(int $n)
{
    $sieve = array_fill(0, $n + 1, 1);
    $sieve[0] = $sieve[1] = 0;
    $i = 2;
    while ($i * $i <= $n) {
        if ($sieve[$i] == 1) {
            $k = $i * $i;
            while ($k <= $n) {
                $sieve[$k] = 0;
                $k += $i;
            }
            $i += 1;
        }
    }
    return $sieve;
}

print_r(solution(10));