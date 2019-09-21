<?php
function solution(int $n)
{
    $s = base_convert($n, 10, 2);
    $n = strlen($s);
    $gap = 0;
    $len = 0;
    $max = null;
    for ($i = 0; $i < $n; $i++) {
        if ($s[$i] == '1') {
            if (!$gap) {
                $gap = 1;
            }
            if ($gap == 2) {
                if (is_null($max)) {
                    $max = $len;
                }
                $max = max($len, $max);
                $len = 0;
                $gap = 1;
            }
        } else {
            if ($gap == 1) {
                $gap = 2;
            }
            $len++;
        }
    }
    return is_null($max) ? 0 : $max;
}


echo solution(32);