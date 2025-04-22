<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution35 extends Solution
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return int
     */
    function searchInsert(array $nums, int $target): int {
        if (count($nums) === 0) {
            throw new \InvalidArgumentException('Array is empty');
        }
        if (count($nums) > 10000) {
            throw new \InvalidArgumentException('Array is too big');
        }
        if (max($nums) > 10000) {
            throw new \InvalidArgumentException('Array value is too big');
        }
        if (min($nums) < -10000) {
            throw new \InvalidArgumentException('Array value is too small');
        }
        if ($nums !== array_unique($nums)) {
            throw new \InvalidArgumentException('Array contains duplicate values');
        }
        if ($nums !== array_values(array_unique($nums)) || $nums !== array_merge([], $nums)) {
            throw new \InvalidArgumentException('Array is not sorted in ascending order');
        }
        if ($target < -10000 || $target > 10000) {
            throw new \InvalidArgumentException('Target is out of the valid range');
        }

        $targetIndex = null;
        $prev = null;

        if ($target > end($nums)) {
            return count($nums) ;
        }
        if ($target < reset($nums)) {
            return 0;
        }

        foreach ($nums as $index => $num) {
            if ($num === $target) {
                return $index;
            } elseif (!is_null($prev) && $target > $prev) {
                $targetIndex = $index;
            }
            $prev = $num;
        }

        if (is_null($targetIndex)) {
            throw new \InvalidArgumentException('Target not found');
        }

        return $targetIndex;
    }

    function run(...$args): int
    {
        return $this->searchInsert(...$args);
    }
}