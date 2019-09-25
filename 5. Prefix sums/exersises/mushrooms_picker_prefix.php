<?php

function prefix_sums(array $a)
{
    $n = count($a);
    $p = array_fill(0, $n + 1, 0);
    for ($i = 1; $i <= $n; $i++) {
        $p[$i] = $p[$i - 1] + $a[$i - 1];
    }
    return $p;
}

function count_total($p, $x, $y)
{
    return $p[$y + 1] - $p[$x];
}

function mushrooms(array $a, int $k, int $m)
{
    $n = count($a) - 1;
    $max = 0;
    $sums = prefix_sums($a);
    //start  moving to the left and then the right
    for ($p = 0; $p < $m; $p++) {
        $stepsLeft = $p;
        $realStepsLeft = min($k, $stepsLeft);
        $leftBorder = $k - $realStepsLeft;

        $stepsRight = $m - $stepsLeft;
        $realStepsRight = min($n - $leftBorder, $stepsRight);
        $rightBorder = $leftBorder + $realStepsRight;

        $max = max($max, count_total($sums, $leftBorder, $rightBorder));
    }
    //moving to the right and then the left
    for ($p = 0; $p < $m; $p++) {
        $stepsRight = $p;
        $realStepsRight = min($p, $n - $k);
        $rightBorder = $k + $realStepsRight;

        $stepsLeft = $m - $stepsRight;
        $realStepsLeft = min(($k + $realStepsRight), $stepsLeft);
        $leftBorder = $rightBorder - $realStepsLeft;

        $max = max($max, count_total($sums, $leftBorder, $rightBorder));
    }
    return $max;
}

assert(ASSERT_EXCEPTION, 1);
assert(mushrooms([2, 3, 7, 5, 1, 3, 9], 4, 6) == 25);

echo 'Success';