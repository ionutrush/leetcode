<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution88 extends Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return void
     */
    function merge(array &$nums1, int $m, array $nums2, int $n): void {
        $targetLength = $m + $n;
        $length = $targetLength;
        $targetIndex = $targetLength - 1;

        // filter 0s out of nums1, but only from the end until we hit a number different to 0
        while ($targetIndex >= 0 && $nums1[$targetIndex] === 0) {
            $targetIndex--;
            array_splice($nums1, $targetIndex + 1, 1);
        }

        $nums1 = array_merge($nums1, $nums2);
        sort($nums1);
        if (count($nums1) < $length) {
            $nums1 = array_pad($nums1, $length, 0);
        }
    }

    public function run(...$args): void
    {
       $this->merge(...$args);
    }
}