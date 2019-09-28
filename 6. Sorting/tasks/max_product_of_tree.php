<?php

function wrong_solution_made_by_values(array $arr)
{
    $n = count($arr);
    $a1 = null;
    $b1 = null;
    $c1 = null;
    $r = [];
    $max = 0;
    for ($i = 2; $i < $n; $i++) {
        $a = $arr[$i - 2];
        $b = $arr[$i - 1];
        $c = $arr[$i];
        if ($a1 && $b1) {
            if ($b1 <= $c) {
                $max = max($max, $a1 * $b1 * $c);
                $a1 = $b1;
                $b1 = null;
            }
        }
        if ($a1) {
            if ($a1 <= $b && $b <= $c) {
                $max = max($max, $a1 * $b * $c);
                $a1 = null;
            }
        }
        if ($a <= $b && $b <= $c) {
            $max = max($max, $a * $b * $c);
            //$r[] = [$a, $b, $c];
        } elseif ($a <= $b) {
            $a1 = $a;
            $b1 = $b;
        } else {
            $a1 = $a;
        }
    }
    return $max;
}


function solution(array $arr)
{
    $n = count($arr);
    sort($arr);
    return max($arr[0] * $arr[1] * $arr[$n - 1],
        $arr[$n - 1] * $arr[$n - 2] * $arr[$n - 3]);

}


assert_options(ASSERT_EXCEPTION, 1);
assert(solution([-3, 1, 2, -2, 5, 6]) == 60);


