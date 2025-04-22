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
        $k = 0;

        foreach ($nums as $num) {
            if ($num !== $val) {
                $nums[$k++] = $num;
            }
        }

        return $k;
    }

    public function run(...$args)
    {
        return $this->removeElement(...$args);
    }
}