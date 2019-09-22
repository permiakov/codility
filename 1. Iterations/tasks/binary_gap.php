<?php
//straight approach
function solution(int $n)
{
    $s = base_convert($n, 10, 2);
    $n = strlen($s);
    $len = 0;
    $max = null;
    $gap = true;

    for ($i = 0; $i < $n; $i++) {
        if ($s[$i] == '1') {
            if (!$gap) {
                if (is_null($max)) {
                    $max = $len;
                }
                $max = max($len, $max);
                $len = 0;
                $gap = true;
            }
        } else {
            if ($gap) {
                $gap = false;
            }
            $len++;
        }
    }
    return is_null($max) ? 0 : $max;
}

assert(solution(529) == 4);
assert(solution(32) == 0);
echo 'Success';