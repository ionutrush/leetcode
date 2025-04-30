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
        return $this->containsDuplicateUsingSets($nums);
    }

    // 9.40% runtime - readable, but slow
    function containsDuplicateUsingArrayCountValues(array $nums): bool {
        $vals = array_count_values($nums);
        arsort($vals);

        return reset($vals) > 1;
    }

    // this works great for small and medium arrays, but fails on big ones on leetcode
    function containsDuplicateUsingHashMap(array $nums): bool {
        $alreadySeen = [];
        foreach ($nums as $num) {
            if (in_array($num, $alreadySeen)) {
                return true;
            }
            $alreadySeen[] = $num;
        }

        return false;
    }

    // 56.43% runtime - this is better both in time and space complexity
    function containsDuplicateUsingSets(array $nums): bool {
        return count($nums) !== count(array_flip($nums));
    }

    // 47.02% - this improves our solution using array_count_values(C++ implementation)
    function containsDuplicateUsingArrayCountValuesSimplified(array $nums): bool {
        // Only works efficiently for integer or string keys
        $counts = array_count_values($nums);
        return max($counts) > 1;

    }

    public function run(...$args): bool
    {
        return $this->containsDuplicate(...$args);
    }
}