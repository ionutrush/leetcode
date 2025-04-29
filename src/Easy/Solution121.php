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
        $count = count($prices);
        if ($count <= 1) {
            return 0;
        }

        $minPrice = PHP_INT_MAX;
        $maxProfit = 0;

        foreach ($prices as $price) {
            // Check if we can do better with current price
            if ($price < $minPrice) {
                $minPrice = $price;
            } else {
                $currentProfit = $price - $minPrice;
                if ($currentProfit > $maxProfit) {
                    $maxProfit = $currentProfit;
                }
            }
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}