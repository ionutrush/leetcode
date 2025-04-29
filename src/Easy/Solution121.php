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
        $maxProfit = 0;
        foreach ($prices as $i => $price) {
            for ($j = $i + 1; $j < count($prices); $j++) {
                $maxProfit = max($maxProfit, $prices[$j] - $price);
            }
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}