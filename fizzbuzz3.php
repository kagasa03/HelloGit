<?php
function convFizzBuzz($n)
{
    $str = '';

    if ($n % 3 === 0) {
        if ($n % 5 === 0) {
            $str = 'FizzBuzz';
        } else {
            $str = 'Fizz';
        }
    } else if ($n % 5 === 0) {
        $str = 'Buzz';
    } else if (preg_match('/^1+$/', "{$n}")) {
        $str = 'bow wow!';
    } else if (preg_match('/^2+$/', "{$n}")) {
        $str = 'meow meow!';
    } else {
        $str = "{$n}";
    }

    return $str;
}

assert(convFizzBuzz(1) === 'bow wow!');
assert(convFizzBuzz(2) === 'meow meow!');
assert(convFizzBuzz(3) === 'Fizz');
assert(convFizzBuzz(5) === 'Buzz');
assert(convFizzBuzz(11) === 'bow wow!');
assert(convFizzBuzz(15) === 'FizzBuzz');
assert(convFizzBuzz(22) === 'meow meow!');
assert(convFizzBuzz(90) === 'FizzBuzz');
assert(convFizzBuzz(98) === '98');
assert(convFizzBuzz(99) === 'Fizz');
assert(convFizzBuzz(100) === 'Buzz');

for ($i = 1; $i <= 100; $i++) {
    echo convFizzBuzz($i), "\n";
}
?>
