<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution169 extends Solution
{
    /**
     * Given an array nums of size n, return the majority element.
     * The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement(array $nums): int {
        $minSize = floor(count($nums) / 2);
        foreach (array_count_values($nums) as $value => $count) {
            if ($count > $minSize) {
                return $value;
            }
        }

        throw new \InvalidArgumentException('No majority element found');
    }
    public function run(...$args): int
    {
        return $this->majorityElement(...$args);
    }
}