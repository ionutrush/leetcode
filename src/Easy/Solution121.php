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
        $minPrice = $prices[0];

        for ($i = 0; $i < count($prices); $i++) {
            if (isset($minPrice)) {
                $maxProfit = max($maxProfit, $prices[$i] - $minPrice);
            }

            if ($i === count($prices) - 1) {
                break;
            }

            $minPrice = (
                $i === 0 ||
                $prices[$i] < $prices[$i - 1]
            )
                ? min($minPrice, $prices[$i])
                : min($minPrice, $prices[$i - 1]);
        }

        return $maxProfit;
    }

    public function run(...$args): int
    {
        return $this->maxProfit(...$args);
    }
}