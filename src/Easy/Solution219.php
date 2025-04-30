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
        return $this->containsNearbyDuplicateUsingSlidingWindow($nums, $k);
    }

    // 45.98% - not bad for a first solution; memory could be heavily optimized though
    function containsNearbyDuplicateUsingHashMap(array $nums, int $k): bool
    {
        $seen = [];
        foreach ($nums as $i => $num) {
            if (array_key_exists($num, $seen) && abs($i - $seen[$num]) <= $k) {
                return true;
            }

            $seen[$num] = $i;
        }

        return false;
    }

    // 45.98% - identical in runtime to the hash map solution, but better in memory
    function containsNearbyDuplicateUsingSlidingWindow(array $nums, int $k): bool
    {
        $window = [];

        foreach ($nums as $i => $num) {
            // If we found the number in our current window, return true
            if (isset($window[$num])) {
                return true;
            }

            // Add current element to window
            $window[$num] = true;

            // Remove elements outside the sliding window (more than k positions away)
            if ($i >= $k) {
                unset($window[$nums[$i - $k]]);
            }
        }

        return false;
    }

    public function run(...$args): bool
    {
        return $this->containsNearbyDuplicate(...$args);
    }
}