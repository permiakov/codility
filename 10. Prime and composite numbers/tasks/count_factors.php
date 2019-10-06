<?php

function solution($n)
{
    if($n==1) return 1;
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

assert_options(ASSERT_EXCEPTION, 1);
assert(solution(4) == 3);
echo 'Success';