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
        if (count($prices) < 2) {
            return 0;
        }

        $maxProfit = 0;
        $minPrice = $prices[0];

        // Start from index 1 since we already set minPrice to prices[0]
        for ($i = 1, $length = count($prices); $i < $length; $i++) {
            // Only calculate maxProfit if current price is higher than minPrice
            if ($prices[$i] > $minPrice) {
                $profit = $prices[$i] - $minPrice;
                if ($profit > $maxProfit) {
                    $maxProfit = $profit;
                }
            } elseif ($prices[$i] < $minPrice) {
                $minPrice = $prices[$i];
            }
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}