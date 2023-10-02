<?php

test('one indexed array', function () {
    $expected = [
        4 => 5,
        3 => 4,
        2 => 3,
        1 => 2,
        0 => 1,
    ];

    $actual = arrayReverse([1, 2, 3, 4, 5]);

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

    $actual = arrayReverse([
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
    $actual = arrayReverse([
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
