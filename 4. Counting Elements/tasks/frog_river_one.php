<?php
//O(n2)
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

////6
//echo solution1([1, 3, 1, 4, 2, 3, 5, 4], 5);
////-1
//echo solution1([1, 1, 1, 1], 2);
//// 4
//echo solution1([1, 3, 1, 3, 2, 1, 3], 3);

//O(n)
function solution2($a, $x)
{
    $n = count($a);
    $cnt = [];
    $max = null;
    $sum1 = 0;
    for ($i = 0; $i < $n; $i++) {
        $done = true;
        if (!isset($cnt[$a[$i]])) {
            $cnt[$a[$i]] = 1;
            $sum1 += $a[$i];
            $max = max($max, $a[$i]);
        }
        if (is_null($max)) {
            $max = $a[$i];
        }

        $sum2 = $max * ($max + 1) / 2;
        if ($sum1 != $sum2) {
            $done = false;
        }

        if ($done && $max == $x) {
            break;
        }
    }

    return ($done && $max == $x) ? $i : -1;
}
////6
echo solution2([1, 3, 1, 4, 2, 3, 5, 4], 5);
///-1
echo solution2([1, 1, 1, 1], 2);
///4
echo solution2([1, 3, 1, 3, 2, 1, 3], 3);