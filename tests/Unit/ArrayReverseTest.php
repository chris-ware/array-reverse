<?php

use Src\Arr;

test('one indexed array', function () {
    $expected = [
        4 => 5,
        3 => 4,
        2 => 3,
        1 => 2,
        0 => 1,
    ];

    $actual = Arr::reverse([1, 2, 3, 4, 5]);

    expect($actual)->toEqual($expected);
});

test('two associative array', function () {
    $expected = [
        'e' => 5,
        'd' => 4,
        'c' => 3,
        'b' => 2,
        'a' => 1,
    ];

    $actual = Arr::reverse([
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'e' => 5,
    ]);

    expect($actual)->toEqual($expected);
});

test('three multidimensional array limited to two child levels', function () {
    $expected = [
        2 => 5,
        1 => 4,
        'c' => 3,
        0 => 2,
        'a' => [
            'a' => [
                'c' => [
                    0 => 'a',
                    1 => 'b',
                    2 => 'c',
                    'd' => [
                        1,
                        2,
                        3,
                    ],
                ],
                1 => 'b',
                0 => 'a',
            ],
            2 => 3,
            1 => 2,
            0 => 1,
        ],
    ];

    $maxDepth = 2;
    $actual = Arr::reverse([
        'a' => [
            1,
            2,
            3,
            'a' => [
                'a',
                'b',
                'c' => [
                    'a',
                    'b',
                    'c',
                    'd' => [
                        1,
                        2,
                        3,
                    ],
                ],
            ],
        ],
        2,
        'c' => 3,
        4,
        5,
    ], $maxDepth);

    // Both assertions are required
    expect($actual)->toEqual($expected);
    // Doesn't detect strict order
    expect($expected === $actual)->toBeTrue('Order of array properties does not match');
    // Used to assert correct order
});

//Additional Arch testing
test('ensure banned functions are not used')
    ->expect([
        'array_change_key_case',
        'array_chunk',
        'array_column',
        'array_combine',
        'array_count_values',
        'array_diff_assoc',
        'array_diff_key',
        'array_diff_uassoc',
        'array_diff_ukey',
        'array_diff',
        'array_fill_keys',
        'array_fill',
        'array_filter',
        'array_flip',
        'array_intersect_assoc',
        'array_intersect_key',
        'array_intersect_uassoc',
        'array_intersect_ukey',
        'array_intersect',
        'array_is_list',
        'array_key_exists',
        'array_key_first',
        'array_key_last',
        'array_keys',
        'array_map',
        'array_merge_recursive',
        'array_merge',
        'array_multisort',
        'array_pad',
        'array_pop',
        'array_product',
        'array_push',
        'array_rand',
        'array_reduce',
        'array_replace_recursive',
        'array_replace',
        'array_reverse',
        'array_search',
        'array_shift',
        'array_slice',
        'array_splice',
        'array_sum',
        'array_udiff_assoc',
        'array_udiff_uassoc',
        'array_udiff',
        'array_uintersect_assoc',
        'array_uintersect_uassoc',
        'array_uintersect',
        'array_unique',
        'array_unshift',
        'array_values',
        'array_walk_recursive',
        'array_walk',
        'end',
        'next',
        'prev',
        'current',
        'asort',
        'arsort',
        'ksort',
        'krsort',
        'natcasesort',
        'natsort',
        'rsort',
        'sort',
        'uasort',
        'uksort',
        'usort',
    ])
    ->not->toBeUsedIn('Src\Arr');

// Faker test for fun

test('array reverse matches with faker data', function () {
    $faker = Faker\Factory::create();
    $wordsArray = $faker->words($faker->numberBetween(5, 50));

    expect(array_reverse($wordsArray, true))->toEqual(Arr::reverse($wordsArray));
});