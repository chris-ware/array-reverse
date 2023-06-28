# Write a function to reverse a provided array
Write a single, low-level function in PHP to reverse the order of items in a provided array **whilst maintaining their key associations**.

Please do this **without** looking for solutions online, Googling/Stackoverflow... We're looking to see your ability. Checking against php.net docs is fine if you need to.

This should be accomplished without using PHP's array_* functions, ArrayIterator as well as end(), next(), prev(), current() and sort() functions... Other PHP functions are fine.

To get you started here's the structure for the function we'd like you to code, the second argument is there for use in #3:

```php
<?php
declare(strict_types = 1);

function arrayReverse(array $inputArray, ?int $maxDepth = null): array
{
    return []; // TODO
}
```

Here are three inputs we will use to evaluate your submission. **How many of these can you solve with a single function?**

```php
// #1 - Indexed array
$inputArray = [1, 2, 3, 4, 5];
//print_r(arrayReverse($inputArray));

// #2 - Associative array
$inputArray = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
//print_r(arrayReverse($inputArray));

// #3 - Multidimensional. Please recursively reverse to a max depth of 2 child levels
$inputArray = ['a' => [1, 2, 3, 'a' => ['a', 'b', 'c' => ['a', 'b', 'c', 'd' => [1, 2, 3]]]], 2, 'c' => 3, 4, 5];
//print_r(arrayReverse($inputArray, maxDepth: 2));
```

_Feel free to write and test your code in your preferred environment/IDE before submitting it._

**_Your submission will be evaluated against the latest stable PHP version_**

## Testing & expected output
Full PHPUnit tests are in place should you wish to verify before submitting, this is not a requirement though.

### Install using composer:
```bash
composer install
```

### Run tests _(from your project root)_:
```bash
vendor/bin/phpunit
```
