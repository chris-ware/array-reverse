<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{

    public function test_one_indexed_array()
    {
        $expected = [
            4 => 5,
            3 => 4,
            2 => 3,
            1 => 2,
            0 => 1,
        ];

        $actual = arrayReverse([1, 2, 3, 4, 5]);

        $this->assertEquals($expected, $actual);
    }

    public function test_two_associative_array()
    {
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

        $this->assertEquals($expected, $actual);
    }

    public function test_three_multidimensional_array_limited_to_two_child_levels()
    {
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
        $this->assertEquals($expected, $actual); // Doesn't detect strict order
        $this->assertTrue($expected === $actual, 'Order of array properties does not match'); // Used to assert correct order
    }
}
