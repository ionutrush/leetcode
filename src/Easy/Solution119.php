<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution119 extends Solution
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow(int $rowIndex): array {
        if ($rowIndex === 0) {
            return [1];
        }
        if ($rowIndex === 1) {
            return [1, 1];
        }

        $output = [];

        for ($i = 1; $i <= $rowIndex + 1; $i++) {
            $temp = [];
            for ($j = 1; $j <= $i; $j++) {
                if ($j === 1 || $j === $i) {
                    $temp[] = 1;
                    continue;
                }
                $temp[] = $output[$i - 2][$j - 2] + $output[$i - 2][$j - 1];
            }
            $output[] = $temp;
        }

        return $output[$rowIndex];
    }

    public function run(...$args): array
    {
        return $this->getRow(...$args);
    }
}