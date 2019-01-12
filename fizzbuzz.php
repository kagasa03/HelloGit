<?php
function convFizzBuzz($n)
{
    $str = '';
    if ($n % 3 == 0) {
        $str .= 'Fizz';
    }
    if ($n % 5 == 0) {
        $str .= 'Buzz';
    }
    if ($str === '') {
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
