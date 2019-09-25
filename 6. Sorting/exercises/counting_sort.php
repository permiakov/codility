<?php

//The idea: First, count the elements in the array of counters (see chapter 2). 
//Next, just iterate through the array of counters in increasing order.
//Notice that we have to know the range of the sorted values. 
//If all the elements are in the set {0, 1, . . . , k}, then the array used for counting should be of size k + 1. 
//The limitation here may be available memory.

function solution(array $a)
{
    $n = count($a);
    $count = array_fill(0, $n + 1, 0);
    for ($i = 0; $i < $n; $i++) {
        $count[$a[$i]]++;
    }
    $res = [];
    foreach ($count as $index => $value) {
        while ($value) {
            $res[] = $index;
            $value--;
        }
    }
    return $res;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution([2, 1, 1, 4, 5, 2]) == [1, 1, 2, 2, 4, 5]);
echo 'Success';