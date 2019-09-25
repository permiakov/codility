<?php
//simple solution
function mushrooms(array $a, int $k, int $m)
{
    $n = count($a);
    $max = 0;
    for ($p = 0; $p < $m; $p++) {
        $sum = 0;
        $stepsRight = $m - $p;
        $stepsLeft = $p;

        $leftStart = $k - 1;
        while ($stepsLeft > 0 && $leftStart >= 0 && isset($a[$leftStart])) {
            $sum += $a[$leftStart];
            $leftStart--;
            $stepsLeft--;
        }
        //determine where to start after moving left

        // if we didn't move left
        if ($p == 0) {
            $rightStart = $k + 1;
        } else {
            $leftStepsDone = $p - $stepsLeft;
            $rightStart = $k - $leftStepsDone + 1;
        }
        while ($stepsRight > 0 && $rightStart <= $n && isset($a[$rightStart])) {
            if ($rightStart >= $k) {
                $sum += $a[$rightStart];
            }
            $rightStart++;
            $stepsRight--;
        }
        $max = max($sum, $max);
    }
    return $max;
}

assert(ASSERT_EXCEPTION, 1);
assert(mushrooms([2, 3, 7, 5, 1, 3, 9], 4, 6) == 25);
echo 'Success';