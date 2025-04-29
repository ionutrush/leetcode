<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution118 extends Solution
{
    const int VALUE = 1;

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate(int $numRows): array {
        $output = [];

        for ($i = 1; $i <= $numRows; $i++) {
            $temp = [];
            for ($j = 1; $j <= $i; $j++) {
                if ($j === 1 || $j === $i) {
                    $temp[] = self::VALUE;
                    continue;
                }
                $temp[] = $output[$i - 2][$j - 2] + $output[$i - 2][$j - 1];
            }
            $output[] = $temp;
        }

        return $output;
    }

    public function run(...$args): array
    {
        return $this->generate(...$args);
    }
}