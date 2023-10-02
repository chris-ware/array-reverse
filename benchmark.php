<?php
declare(strict_types = 1);

use Src\Arr;

require_once 'vendor/autoload.php';

// #1 - Indexed array
$inputArray = [1, 2, 3, 4, 5];
benchmark(10000, $inputArray);

// #2 - Associative array
$inputArray = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
benchmark(10000, $inputArray);

// #3 - Multidimensional. Please recursively reverse to a max depth of 2 child levels
$inputArray = ['a' => [1, 2, 3, 'a' => ['a', 'b', 'c' => ['a', 'b', 'c', 'd' => [1, 2, 3]]]], 2, 'c' => 3, 4, 5];
benchmark(10000, $inputArray);

function benchmark($iterations, $array) {
    $local_start = microtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        Arr::reverse($array);
    }
    $local_finish = microtime(true);
    $local_taken = ($local_finish - $local_start) * 1000;

    echo sprintf('%s ms/call for Arr\Reverse', $local_taken).PHP_EOL;

    $start = microtime(true);
    for ($i = 0; $i < $iterations; $i++) {
        array_reverse($array, true);
    }
    $finish = microtime(true);
    $taken = ($finish - $start) * 1000;

    echo sprintf('%s ms/call for array_reverse', $taken / $iterations).PHP_EOL;

    $diff = ($local_taken / $taken) * 100;
    echo sprintf('%s%% faster/call for array_reverse', number_format($diff, 2)).PHP_EOL;

    echo PHP_EOL;

}
