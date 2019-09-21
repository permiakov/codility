<?php
//https://codility.com/media/train/2-CountingElements.pdf
//Problem: You are given an integer m (1 <= m <= 1 000 000) and two non-empty, zero-indexed
//arrays A and B of n integers, a0, a1, . . . , an−1 and b0, b1, . . . , bn−1 respectively (0 <= ai, bi <= m).
//The goal is to check whether there is a swap operation which can be performed on these
//arrays in such a way that the sum of elements in array A equals the sum of elements in
//array B after the swap. By swap operation we mean picking one element from array A and
//one element from array B and exchanging them


//get sum of both arrays first
//iterate and check difference between each pair
//add difference to sumA and distract from sumB
//if sums are equals  we found the pair
function solution1($a, $b, $m)
{
    $sumA = array_sum($a);
    $sumB = array_sum($b);
    $n = count($a);

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $diff = $b[$j] - $a[$i];
            if (($sumA + $diff) == ($sumB - $diff)) {
                return true;
            }
        }
    }

}

//better solution
//get both sums
//get counts array of array a
//difference between needed pair must equal difference between sums divided on 2
//(sum(a) - sum(b))/2 == $a[x] - $b[$y]
function solution2($a, $b, $m)
{
    $sumA = array_sum($a);
    $sumB = array_sum($b);
    $n = count($a);
    $cntA = array_fill(0, $m, 0);
    for ($i = 0; $i < $n; $i++) {
        $cntA[$a[$i]]++;
    }
    $diff = $sumA - $sumB;
    // if it's not odd we will get float - but diff between integers ($a[x] - $b[$y]) can't be float
    if ($diff % 2 != 0) {
        return false;
    }
    $diff /= 2;

    for ($i = 0; $i < $n; $i++) {
        $possible = $b[$i] - $diff;
        if (0 < $possible && $possible < $m && $cntA[$possible] > 0) {
            return true;
        }
    }
    return false;
}

echo solution2([1, 2, 2, 4, 5, 6], [1, 3, 3, 4, 5, 6], 10);
echo solution1([1, 2, 2, 4, 5, 6], [1, 3, 3, 4, 5, 6], 10);
