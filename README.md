# Write a function to reverse a provided array
Write a single, low-level function in PHP to reverse the order of items in a provided array *whilst maintaining their key associations*.

Please do this *without* looking for solutions online, Googling/Stackoverflow... We're looking to see your ability. Checking against php.net docs is fine if you need to.

This should be accomplished without using PHP's array_* functions, ArrayIterator as well as end(), next(), prev(), current() and sort() functions... Other PHP functions are fine.

To get you started here's the structure for the function we'd like you to code - if you'd like to add additional arguments for use in #3, that's fine:

```php
<?php
declare(strict_types = 1);

function arrayReverse(array $inputArray): array
{
    // TODO
}
```

Here are three inputs we will use to evaluate your submission - how many of these can you solve?

```php
// #1 - Indexed array
$inputArray = [1, 2, 3, 4, 5];

// #2 - Associative array
$inputArray = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

// #3 - Multidimensional. Please recursively reverse to a max depth of 2 levels
$inputArray = ['a' => [1, 2, 3, 'a' => ['a', 'b', 'c' => ['a', 'b', 'c', 'd' => [1, 2, 3]]]], 2, 'c' => 3, 4, 5];
```

_Feel free to write and test your code in your preferred environment/IDE before submitting it._

*_Your submission will be evaluated in a PHP 8.1 environment_*
