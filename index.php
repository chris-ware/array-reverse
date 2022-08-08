<?php
declare(strict_types = 1);

// #1 - Indexed array
$inputArray = [1, 2, 3, 4, 5];
//print_r(arrayReverse($inputArray));

// #2 - Associative array
$inputArray = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
//print_r(arrayReverse($inputArray));

// #3 - Multidimensional. Please recursively reverse to a max depth of 2 child levels
$inputArray = ['a' => [1, 2, 3, 'a' => ['a', 'b', 'c' => ['a', 'b', 'c', 'd' => [1, 2, 3]]]], 2, 'c' => 3, 4, 5];
//print_r(arrayReverse($inputArray, maxDepth: 2));

/**
 * Full PHPUnit tests are in place should you wish to verify before submitting
 *
 * Install using composer:
 *    composer install
 *
 * Run tests from the project root:
 *    vendor/bin/phpunit
 */
function arrayReverse(array $inputArray, ?int $maxDepth = null): array
{
    return []; // TODO
}
