<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\BinarySearchTreeTrait;
use Rushdevelopment\Leetcode\Solution;
use Rushdevelopment\Leetcode\TreeNode;

class Solution108 extends Solution
{
    use BinarySearchTreeTrait;
    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST(array $nums): ?TreeNode {
        // Handle empty array case
        if (empty($nums)) {
            return null;
        }

        // The recursive helper function is the best way to handle this
        // We'll use array indices to avoid creating subarrays
        return $this->constructBST($nums, 0, count($nums) - 1);
    }

    public function run(...$args): ?TreeNode
    {
        return $this->sortedArrayToBST(...$args);
    }
}