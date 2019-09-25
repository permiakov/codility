<?php
//The idea: Find the minimal element and swap it with the first element of an array.
//Next, just sort the rest of the array, without the first element, in the same way.
function solution(array $a)
{
    $n = count($a);
    for ($i = 0; $i < $n; $i++) {
        $min = $minIndex = 0;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($a[$i] > $a[$j]) {
                $min = $a[$j];
                $minIndex = $j;
            }
        }
        if ($min) {
            $t = $a[$i];
            $a[$i] = $min;
            $a[$minIndex] = $t;
        }
    }
    return $a;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution([2, 3, 1, 5]) === [1, 2, 3, 5]);
echo 'Success';
