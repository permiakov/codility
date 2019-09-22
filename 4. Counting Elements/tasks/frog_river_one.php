<?php


function solution1($a, $x)
{
    $n = count($a);
    $cnt = [];
    $max = null;
    for ($i = 0; $i < $n; $i++) {
        $done = true;
        $cnt[$a[$i]] = 1;
        if (is_null($max)) {
            $max = $a[$i];
        }
        $max = max($max, $a[$i]);
        for ($j = $max; $j > 0; $j--) {
            if (!isset($cnt[$j])) {
                $done = false;
                break;
            }
        }
        if ($done && $max == $x) {
            break;
        }

    }

    return ($done && $max == $x) ? $i : -1;
}

//6
echo solution1([1, 3, 1, 4, 2, 3, 5, 4], 5);
//-1
echo solution1([1, 1, 1, 1], 2);
// 4
echo solution1([1, 3, 1, 3, 2, 1, 3], 3);
