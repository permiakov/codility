<?php

function solution1(int $w)
{

    $arr = [];
    $a = ord('A') + 1;
    $prev = 1;
    $arr['A'] = 1;

    for ($i = 2; $prev <= $w; $i++, $a++) {
        $cur = $i * $prev + $prev;
        if ($cur <= $w) {
            $arr[chr($a)] = $cur;
        }
        $prev = $cur;
    }

    $r = '';
    arsort($arr);

    foreach ($arr as $k => $v) {
        if ($v <= $w) {
            $l = $w % $v;
            $c = intdiv($w, $v);
            $r .= str_repeat($k, $c);
            $w = $l;
        }
        if ($w == 0) {
            break;
        }
    }
    return $r;
}

function solution2(int $weight)
{
    return f('A', 1, $weight, 1);
}

function f(string $char, int $currentWeight, int &$weight, int $index): string
{
    if ($currentWeight > $weight) {
        return '';
    }
    $nextIndex = $index + 1;
    $nextWeight = $nextIndex * $currentWeight + $currentWeight;
    $nextChar = chr(ord($char) + 1);
    
    $result = f($nextChar, $nextWeight, $weight, $nextIndex);
    if ($currentWeight <= $weight) {
        $weight -= $currentWeight;
        return f($char, $currentWeight, $weight, $index) . $char . $result;
    }

    return $result;
}
//Each letter has weight = PREV * $i + PREV
// A = 1, B = 3, C = 12, D = 60
// you are given weight for example 25, you need to find the shortest string with such weight like ACC

echo solution2(25);