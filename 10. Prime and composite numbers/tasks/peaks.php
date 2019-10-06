<?php
//O(N ** 2)
function solution(array $a)
{
    $peaks = [];
    $n = count($a);
    for ($i = 1; $i < $n - 1; $i++) {
        $mid = $a[$i];
        $left = $a[$i - 1];
        $right = $a[$i + 1];
        if (($mid > $left) && ($mid > $right)) {
            $peaks[$i] = $i;
        }

    }
    ksort($peaks);
    $arr = [];
    get_divisors($n, $arr);
    $min = null;
    foreach ($arr as $q) {
        $peakExists = true;
        if ($q > 1) {
            for ($i = 0; $i < $n; $i += $q) {
                $j = $i + $q;
                if (!check_peak($i, $j, $peaks)) {
                    $peakExists = false;
                    break;
                }
            }
            if ($peakExists) {
                $min = $n / $q;
            }
            if(!$peakExists) break;
        }
    }
    return $min ? $min : 0;
}

function check_peak($left, $right, $peaks)
{
    foreach ($peaks as $peak) {
        if ($peak >= $left && $peak <= $right) {
            return true;
        }
    }
    return false;
}

function get_divisors(int $n, &$arr)
{
    for ($i = 1; $i * $i < $n; $i++) {
        if ($n % $i == 0) {
            $arr[] = $i;
            $arr[] = $n / $i;
        }
    }
    if ($i * $i == $n) {
        $arr[] = $i;
    }
    rsort($arr);
}

echo solution([1, 2, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2]);