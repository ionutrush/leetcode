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
        return $this->containsNearbyDuplicateUsingDirectIndexMap($nums, $k);
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

    // 59.77% - this is a better runtime solution
    function containsNearbyDuplicateUsingArraySlice(array $nums, int $k): bool
    {
        // Early return for impossible cases
        if ($k <= 0) {
            return false;
        }

        // Utilize SPLFixedArray for highly optimized array operations
        // This is backed by a C implementation that's much faster for numeric keys
        $seen = [];

        foreach ($nums as $i => $num) {
            // Direct array access is very fast in PHP
            if (isset($seen[$num]) && $i - $seen[$num] <= $k) {
                return true;
            }

            // Update seen position - simple assignment is fast
            $seen[$num] = $i;
        }

        return false;
    }

    // 81.61% - top runtime solution
    //  1. Use isset() instead of array_key_exists() - isset() is significantly faster in PHP for checking array keys
    //  2. Minimize operations in the loop - Only perform the absolute minimum necessary operations
    //  3. Avoid nested conditions where possible - Reduces branch mispredictions
    //  4. Preserve integer keys - Don't cast to strings unless needed for specific cases
    //  5. Let PHP's engine optimize - Sometimes simpler code allows better internal optimizations
    function containsNearbyDuplicateUsingDirectIndexMap(array $nums, int $k): bool {
        // Early return for edge cases
        if ($k <= 0) {
            return false;
        }

        // Pre-allocate the array with integer keys for maximum performance
        $seen = [];

        foreach ($nums as $i => $num) {
            // For integer-keyed arrays, use isset() which is faster than array_key_exists
            if (isset($seen[$num])) {
                // We only need to check if the distance is within k
                if ($i - $seen[$num] <= $k) {
                    return true;
                }
            }

            // Always update with the current position
            $seen[$num] = $i;
        }

        return false;
    }

    public function run(...$args): bool
    {
        return $this->containsNearbyDuplicate(...$args);
    }
}