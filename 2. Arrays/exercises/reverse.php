<?php
function solution1(array $a)
{
    $n = count($a);
    for ($i = 0, $l = $n; $i < $n; $i++) {
        $l--;
        if ($l < $i) {
            break;
        }
        $t = $a[$i];
        $a[$i] = $a[$l];
        $a[$l] = $t;
    }
    return $a;
}

function solution2(array $a)
{
    $n = count($a);
    $m = intdiv(count($a), 2);

    for ($i = 0; $i < $m; $i++) {
        $j = $n - $i - 1;
        $t = $a[$i];
        $a[$i] = $a[$j];
        $a[$j] = $t;
    }

    return $a;
}

var_dump(solution2([1, 2, 3, 4, 5]));
var_dump(solution2([1, 2, 3, 4, 5, 6]));


