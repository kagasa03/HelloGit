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
    } else {
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

if ($argc === 2 && $argv[1] >= 1) {
    $players = intval($argv[1]);
    $turn = 1;

    $len = strlen($argv[1]);
    $turnformat = "%0{$len}d";

    for ($i = 1; $i <= 100; $i++) {
        echo sprintf("[{$turnformat}]", $turn);
        echo convFizzBuzz($i), "\n";
        if ($turn === $players) {
            $turn = 1;
        } else {
            $turn++;
        }
    }
} else {
    echo "Usage: php fizzbuzz4.php <param1>\n";
    echo "<param1> Number of players. Must be 1 or more.\n";
}
?>
