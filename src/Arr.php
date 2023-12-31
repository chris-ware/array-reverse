<?php

namespace Src;

class Arr
{
    public static function reverse(array $inputArray, ?int $maxDepth = null): array
    {
        $count = $i = count($inputArray);

        $mutatedArray = [];
        foreach ($inputArray as $key => $value) {
            $mutatedArray[$i] = [
                'key' => $key,
                'value' => is_array($value) && intval($maxDepth) > 0 ? self::reverse($value, $maxDepth - 1) : $value,
            ];
            $i--;
        }

        $finalArray = [];
        for ($j = 1; $j <= $count; $j++) {
            $finalArray[$mutatedArray[$j]['key']] = $mutatedArray[$j]['value'];
        }

        return $finalArray;
    }

}