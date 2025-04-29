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
        if (empty($prices)) {
            return 0;
        }

        $maxProfit = 0;
        $minPrice = $prices[0];
        $length = count($prices);

        for ($i = 0; $i < $length; $i++) {
            $maxProfit = max($maxProfit, $prices[$i] - $minPrice);

            $minPrice = min($minPrice, $prices[$i]);
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}