<?php

namespace Rushdevelopment\Leetcode;

trait BinarySearchTreeTrait
{
    /**
     * Helper function to recursively construct the BST
     * @param array $nums The sorted array
     * @param int $start Start index of current subarray
     * @param int $end End index of current subarray
     * @return TreeNode|null The root of the constructed BST
     */
    function constructBST(array $nums, int $start, int $end): ?TreeNode {
        // Base case: if start exceeds end, we've processed all elements
        if ($start > $end) {
            return null;
        }

        // Find the middle element - this will be the root of the current subtree
        // Using integer division to find the middle (rounds down for even lengths)
        $mid = $start + intdiv($end - $start, 2);

        // Create a new node with the middle value
        $root = new TreeNode($nums[$mid]);

        // Recursively construct the left subtree with elements before the middle
        $root->left = $this->constructBST($nums, $start, $mid - 1);

        // Recursively construct the right subtree with elements after the middle
        $root->right = $this->constructBST($nums, $mid + 1, $end);

        // Return the root of the constructed subtree
        return $root;
    }
}