<?php
//simple prefix sums
//allows to calculate quickly the sum of needed slice of array
function prefix_sums(array $a)
{
    $n = count($a);
    //array +1 size of original array
    $p = array_fill(0, $n + 1, 0);
    //starting from 1
    for ($i = 1; $i <= $n; $i++) {
        //p[3] = a[0] + a[1] + a[2]
        $p[$i] = $p[$i - 1] + $a[$i - 1];
    }
    return $p;
}

//total between x and y 
function count_total($p, $x, $y)
{
    return $p[$y + 1] - $p[$x];
}

//$p = prefix_sums([1, 2, 3]);
//echo count_total($p, 0, 2);
