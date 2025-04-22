<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;
class Solution66 extends Solution
{
    /**
     * @param int[] $digits
     * @return int[]
     */
    function plusOne(array $digits): array {
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            if ($digits[$i] < 9) {
                $digits[$i]++;
                return $digits;
            }

            $digits[$i] = 0;
        }

        $digits[0] = 1;
        $digits[] = 0;
        return $digits;
    }

    public function run(...$args)
    {
        return $this->plusOne(...$args);
    }
}