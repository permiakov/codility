<?php

function count_digits(int $n)
{
    $result = 0;
    while ($n > 0) {
        $n = intdiv($n, 10);
        $result++;
    }
    return $result;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(count_digits(100) == 3);
echo 'Success';