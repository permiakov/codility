<?php

function solution(array &$a)
{
    $n = count($a);
    merge_sort($a, 0, $n - 1);
}

function merge_sort(array &$a, int $leftPos, int $rightPos)
{
    if ($leftPos < $rightPos) {
        $m = intdiv($leftPos + $rightPos, 2);
        merge_sort($a, $leftPos, $m);
        merge_sort($a, $m + 1, $rightPos);
        merge($a, $leftPos, $m, $rightPos);
    }
}

function merge(array &$arr, int $l, int $m, int $r)
{
    $left = $right = [];
    $leftSize = $m - $l + 1;
    $rightSize = $r - $m;
    $left[] = [];
    $right[] = [];

    for ($i = 0; $i < $leftSize; ++$i) {
        $left[$i] = $arr[$l + $i];
    }
    for ($j = 0; $j < $rightSize; ++$j) {
        $right[$j] = $arr[$m + 1 + $j];
    }

    $i = $j = 0;
    $main = $l;
    while ($i < $leftSize && $j < $rightSize) {
        if ($left[$i] <= $right[$j]) {
            $arr[$main] = $left[$i];
            $i++;
        } else {
            $arr[$main] = $right[$j];
            $j++;
        }
        $main++;
    }
    while ($i < $leftSize) {
        $arr[$main] = $left[$i];
        $i++;
        $main++;
    }
    while ($j < $rightSize) {
        $arr[$main] = $right[$j];
        $j++;
        $main++;
    }
}

assert_options(ASSERT_EXCEPTION, 1);
$a = [1, 3, 5, 4, 1];
solution($a);
assert($a == [1, 1, 3, 4, 5]);
var_dump($a);
echo 'Success';
