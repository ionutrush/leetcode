<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution27 extends Solution
{
    /**
     * @param int[] $nums
     * @param int $val
     * @return int
     */
    public function removeElement(array &$nums, int $val): int
    {
        $nums = array_filter($nums, function ($item) use ($val) {
            return $item !== $val;
        });

        return count($nums);
    }

    public function run(...$args)
    {
        return $this->removeElement(...$args);
    }
}