<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution136 extends Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber(array $nums): int {
        $length = count($nums);
        if ($length === 0) {
            throw new \InvalidArgumentException('Array is empty');
        }
        if ($length > 30000) {
            throw new \InvalidArgumentException('Array is too big');
        }
        if ($length === 1) {
            return $nums[0];
        }

        // Initialize result to 0 since any number XORed with 0 equals itself
        $result = 0;

        // XOR all numbers in the array
        foreach ($nums as $num) {
            // XOR has these key properties that make it perfect for this problem:
            // 1. a ^ a = 0 (a number XORed with itself gives 0)
            // 2. a ^ 0 = a (a number XORed with 0 remains unchanged)
            // 3. a ^ b ^ a = b (duplicates cancel each other out)
            //
            // Since all numbers except one appear exactly twice,
            // all duplicates will cancel out to 0, leaving only the single number

            $result ^= $num;
        }

        // After XORing all numbers, only the single number remains
        return $result;
    }

    public function run(...$args): int
    {
        return $this->singleNumber(...$args);
    }
}