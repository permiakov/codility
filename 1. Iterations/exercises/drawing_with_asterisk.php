<?php
//*000
//**00
//***0
//****
function triangle(int $n)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j <= $i; $j++) {
            echo '* ';
        }
        echo PHP_EOL;
    }
}

//* * * * * * *
//0 * * * * * 0
//0 0 * * * 0 0
//0 0 0 * 0 0 0

function symmetric_triangle(int $n)
{
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if ($j >= $i && ($j < ($n - $i))) {
                echo '*';
            } else {
                echo ' ';
            }
        }
        echo PHP_EOL;
    }
}

triangle(4);
symmetric_triangle(5);