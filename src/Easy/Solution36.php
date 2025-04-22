<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution36 extends Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function removeDuplicates(array &$nums): int {
        $length = count($nums);
        if ($length === 0) {
            throw new \InvalidArgumentException('Array is empty');
        }
        if ($length > 30000) {
            throw new \InvalidArgumentException('Array is too big');
        }
        if ($length === 1) {
            return 1;
        }

        $uniqueIndex = 0;
        for ($i = 1; $i < $length; $i++) {
            if ($nums[$i] !== $nums[$uniqueIndex]) {
                $uniqueIndex++;
                $nums[$uniqueIndex] = $nums[$i];
            }
        }

        return $uniqueIndex + 1;
    }

    public function run(...$args): int
    {
        return $this->removeDuplicates(...$args);
    }
}