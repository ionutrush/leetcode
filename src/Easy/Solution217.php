<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution217 extends Solution
{
    /**
     * Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.
     *
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate(array $nums): bool {
        $vals = array_count_values($nums);
        arsort($vals);

        return reset($vals) > 1;
    }

    public function run(...$args): bool
    {
        return $this->containsDuplicate(...$args);
    }
}