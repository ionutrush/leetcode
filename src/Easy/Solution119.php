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
        $row = [1];

        for ($i = 1; $i <= $rowIndex; $i++) {
            $newRow = [1];

            for ($j = 1; $j < $i; $j++) {
                $newRow[] = $row[$j - 1] + $row[$j];
            }

            $newRow[] = 1;
            $row = $newRow;
        }

        return $row;
    }

    function getRowMemoryOptimized(int $rowIndex): array {
        $row = array_fill(0, $rowIndex + 1, 0);
        $row[0] = 1;

        for ($i = 1; $i <= $rowIndex; $i++) {
            for ($j = $i; $j > 0; $j--) {
                $row[$j] += $row[$j - 1];
            }
        }

        return $row;
    }

    public function run(...$args): array
    {
        return $this->getRowMemoryOptimized(...$args);
    }
}