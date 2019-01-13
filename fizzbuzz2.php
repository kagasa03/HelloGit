<?php
function convFizzBuzz($n)
{
    $flg = 0;
    $str = '';
    if ($n % 3 == 0) {
        $flg = 1;
    }
    if ($n % 5 == 0) {
        if ($flg == 1) {
            $flg = 3;
        } else {
            $flg = 2;
        }
    }

    switch ($flg) {
    case 1:
        $str = 'Fizz';
        break;
    case 2:
        $str = 'Buzz';
        break;
    case 3:
        $str = 'FizzBuzz';
        break;
    default:
        $str = "{$n}";
    }

    return $str;
}

assert(convFizzBuzz(1) === '1');
assert(convFizzBuzz(3) === 'Fizz');
assert(convFizzBuzz(5) === 'Buzz');
assert(convFizzBuzz(15) === 'FizzBuzz');
assert(convFizzBuzz(90) === 'FizzBuzz');
assert(convFizzBuzz(98) === '98');
assert(convFizzBuzz(99) === 'Fizz');
assert(convFizzBuzz(100) === 'Buzz');

for ($i = 1; $i <= 100; $i++) {
    echo convFizzBuzz($i), "\n";
}
?>
