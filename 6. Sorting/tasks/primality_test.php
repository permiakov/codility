<?php
//if N divides only on N and on 1 - it's prime number, otherwise it's a composite number
// we go from opposite, if 6 completely divided on 2 (3) then it's a composite number
function is_prime_number($n)
{
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

echo is_prime_number(5);