<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution121 extends Solution
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit(array $prices): int {
        // For very small arrays
        if (count($prices) <= 1) {
            return 0;
        }

        $minPrice = PHP_INT_MAX;
        $maxProfit = 0;

        foreach ($prices as $price) {
            if ($price < $minPrice) {
                $minPrice = $price;
                continue;
            }

            $profit = $price - $minPrice;
            if ($profit > $maxProfit) {
                $maxProfit = $profit;
            }
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}