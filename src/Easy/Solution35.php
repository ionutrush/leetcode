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
        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = (int)floor(($left + $right) / 2);

            if ($nums[$mid] === $target) {
                return $mid;
            } elseif ($nums[$mid] < $target) {
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return $left;
    }

    function run(...$args): int
    {
        return $this->searchInsert(...$args);
    }
}