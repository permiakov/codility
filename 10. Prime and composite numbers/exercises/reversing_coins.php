<?php
// 10 coins with heads up
// 0 0 0 0 0 0 0 0 0 0 
// 10 people (with serial number 1<= $i <=10 )
// each reverses coins with numbers $i * 2, $i * 3, $i * 4....
// in the end of it looks like
//1 0 0 1 0 0 0 0 1 0

//simple iterative approach
function coins_simple($n)
{
    $result = 0;
    $coins = array_fill(1, 10, 0);

    for ($people = 1; $people <= $n; $people++) {
        $coinToReverse = $people;
        while ($coinToReverse <= $n) {
            $coins[$coinToReverse] = ($coins[$coinToReverse] + 1) % 2;
            $coinToReverse += $people;
        }
        $result += $coins[$people];
    }
    return $result;
}

//assert_options(ASSERT_EXCEPTION, 1);
//assert(coins_simple(10) == 3);

//if we look at each stage of reversing the coins
// each coin turned over exactly as many times as number of its divisors
//1 - 1 divisor, 2 - 2 divisors, 3 - 2 divisors, 4 - 3 divisors
//coins with odd numbers will give tails in the end
//odd numbers only when number has symmetric divisor 2 * 2 = 4, 3 * 3 = 9 and etc
function coins_count_of_divisors_based($n)
{
    $total = 0;
    for ($i = 1; $i <= $n; $i++) {
        //if number has symmetric divisor
        $j = sqrt($i);
        $digits = strlen(substr(strrchr($j, "."), 1));
        if ($digits == 0) {
            $total += 1;
            //echo "$i " . PHP_EOL;
        }
    }

    return $total;
}


function shortest($n)
{
    // shortest way to count number of symmetric divisors for 1 to N
    return floor(sqrt($n));
}

assert_options(ASSERT_EXCEPTION, 1);
assert(coins_count_of_divisors_based(10) == 3);
echo 'Success';