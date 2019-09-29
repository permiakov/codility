<?php
function solution(string $s)
{
    $n = strlen($s);
    if ($n == 0) {
        return 1;
    }
    $level = 0;
    $res = [];
    for ($i = 0; $i < $n; $i++) {
        $cur = $s[$i];
        if (in_array($s[$i], ['{', '[', '('])) {
            $level++;
            $res[$level][] = $cur;
        } elseif (in_array($cur, ['}', ']', ')'])) {
            if (isset($res[$level])) {
                $opened = matchClosingBracket($cur);
                if (($key = array_search($opened, $res[$level])) !== false) {
                    unset($res[$level][$key]);
                }
            } else {
                $res[$level][] = $cur;
            }
            if (empty($res[$level])) {
                unset($res[$level]);
            }
            $level--;
        }
    }
    return empty($res) ? 1 : 0;
}

function matchClosingBracket($char)
{
    switch ($char) {
        case '}':
            $open = '{';
            break;
        case ']':
            $open = '[';
            break;
        case ')':
            $open = '(';
            break;
    }
    return $open;
}

assert_options(ASSERT_EXCEPTION, 1);
assert(solution('{[({}[])({})]}') == 1);
assert(solution('([)()]') == 0);
assert(solution('') == 1);
echo 'Success';