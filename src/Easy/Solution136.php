<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution136 extends Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber(array $nums): int {
        $length = count($nums);
        if ($length === 0) {
            throw new \InvalidArgumentException('Array is empty');
        }
        if ($length > 30000) {
            throw new \InvalidArgumentException('Array is too big');
        }
        if ($length === 1) {
            return $nums[0];
        }

        $alreadySeen = [];

        foreach ($nums as $num) {
            if (isset($alreadySeen[$num])) {
                $alreadySeen[$num]++;
            } else {
                $alreadySeen[$num] = 1;
            }
        }

        return key(
            array_filter($alreadySeen, function ($value, $key) {
                return $value === 1;
            }, ARRAY_FILTER_USE_BOTH)
        );
    }

    public function run(...$args): int
    {
        return $this->singleNumber(...$args);
    }
}