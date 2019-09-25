<?php

function fibonacci(int $n) {
    $a = 0;
    $b = 1;
    while($a <= $n) {
        print $a;
        $sum = $a + $b;
        $a = $b;
        $b = $sum;
    }
}

fibonacci(10);