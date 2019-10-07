<?php
//55%
function get_semiprimal_between($x, $y, &$cache)
{
    $arr = array_fill($x, $y - $x + 1, 0);
    $i = 2;
    $total = 0;
    while ($i * $i <= $y) {
        if (is_prime_number($i, $cache)) {
            $k = $i * $i;
            while ($k <= $y) {
                if (isset($arr[$k]) && $arr[$k] == 0 && is_prime_number($k / $i, $cache)) {
                    $arr[$k] = 1;
                    $total++;
                }
                $k += $i;
            }
        }
        $i += 1;
    }
    return $total;
}

function is_prime_number($n, &$cache)
{
    if (isset($cache[$n])) {
        return $cache[$n];
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            $cache[$n] = false;
            return false;
        }
    }
    $cache[$n] = true;
    return true;
}

function solution($n, $p, $q)
{
    $res = $cache = [];
    foreach ($p as $k => $pv) {
        $res[] = get_semiprimal_between($pv, $q[$k], $cache);
    }
    return $res;
}

print_r(solution(26, [1, 4, 16], [26, 10, 20]));