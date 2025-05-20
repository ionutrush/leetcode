<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

/**
 * Given an array nums containing n distinct numbers in the range [0, n], return the only number in the range that is missing from the array.
 * Constraints:
 * - n == nums.length
 * - 1 <= n <= 10^4
 * - All the numbers of nums are unique.
 *
 * @param Integer[] $nums
 * @return Integer
 */
class Solution268 extends Solution
{
    /**
     * @performance float 38.09
     */
    public function getMissingNumber(array $nums): int
    {
        return current(
            array_diff(
                range(0, count($nums)),
                $nums
            )
        );
    }
    public function run(...$args): int
    {
        return $this->getMissingNumber($args);
    }
}