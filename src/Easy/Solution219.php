<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution219 extends Solution
{
    /**
     * Given an integer array nums and an integer k,
     * return true if there are two distinct indices
     * i and j in the array such that nums[i] == nums[j] and abs(i - j) <= k.
     *
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate(array $nums, int $k): bool {
        return $this->containsNearbyDuplicateSimple($nums, $k);
    }

    function containsNearbyDuplicateSimple(array $nums, int $k): bool
    {
        return true;
    }

    public function run(...$args): bool
    {
        return $this->containsNearbyDuplicate(...$args);
    }
}