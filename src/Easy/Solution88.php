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
        $this->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
    }

    function mergeSimple(array &$nums1, int $m, array $nums2, int $n): void {
        // filter 0s out of nums1, but only from the end until we hit a number different to 0
        $nums1 = array_slice($nums1, 0, $m);

        $nums1 = array_merge($nums1, $nums2);
        sort($nums1);
        $nums1 = array_pad($nums1, $m + $n, 0);
    }

    function mergeUsingTwoPointers(array &$nums1, int $m, array $nums2, int $n): void {
        if ($n === 0) {
            return;
        }

        $p1 = $m - 1;      // Points to the last actual element in nums1
        $p2 = $n - 1;      // Points to the last element in nums2
        $p = $m + $n - 1;  // Points to the last position in the final merged array

        while ($p1 >= 0 && $p2 >= 0) { // stop when either of the arrays are emptied
            if ($nums1[$p1] > $nums2[$p2]) {
                $nums1[$p] = $nums1[$p1];
                $p1--;
            } else {
                $nums1[$p] = $nums2[$p2];
                $p2--;
            }
            $p--;
        }

        while ($p2 >= 0) {
            $nums1[$p] = $nums2[$p2];
            $p2--;
            $p--;
        }
    }

    public function run(...$args): void
    {
       $this->merge(...$args);
    }
}