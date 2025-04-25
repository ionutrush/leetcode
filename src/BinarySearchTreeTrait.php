<?php

namespace Rushdevelopment\Leetcode;

trait BinarySearchTreeTrait
{
    protected ?ListNode $currentNode;

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

    /**
     * Convert a sorted linked list to a balanced binary search tree
     * Works directly with the linked list without converting to array
     * @param ListNode|null $head The head of the sorted linked list
     * @return TreeNode|null The root of the converted BST
     */
    function convertListNodeToBST(?ListNode $head): ?TreeNode {
        // Base case: empty list
        if ($head === null) {
            return null;
        }

        // Base case: single node
        if ($head->next === null) {
            return new TreeNode($head->val);
        }

        // Find the middle node using slow/fast pointer technique
        $prev = null;
        $slow = $head;
        $fast = $head;

        while ($fast->next !== null && $fast->next->next !== null) {
            $fast = $fast->next->next;
            $prev = $slow;
            $slow = $slow->next;
        }

        // Create current node using the middle value
        $root = new TreeNode($slow->val);

        if ($prev !== null) {
            $prev->next = null;  // Disconnect left half from middle
            $root->left = $this->convertListNodeToBST($head);  // Process left half
        } else {
            // If prev is null, then slow is the head node
            // There is no left subtree in this case
            $root->left = null;
        }

        // Build right subtree from nodes after the middle
        $root->right = $this->convertListNodeToBST($slow->next);

        return $root;
    }

    /**
     * Helper method to build the BST using inorder traversal
     * @param int $start Start index
     * @param int $end End index
     * @return TreeNode|null The root of the subtree
     */
    function buildTreeFromListNodeInorder(int $start, int $end): ?TreeNode {
        // Base case
        if ($start > $end) {
            return null;
        }

        // Calculate the middle point
        $mid = $start + intdiv($end - $start, 2);

        // Recursively build the left subtree
        $left = $this->buildTreeFromListNodeInorder($start, $mid - 1);

        // Create the root node with the current list value
        $root = new TreeNode($this->currentNode->val);

        // Move to the next node in the linked list
        $this->currentNode = $this->currentNode->next;

        // Connect left subtree
        $root->left = $left;

        // Recursively build the right subtree
        $root->right = $this->buildTreeFromListNodeInorder($mid + 1, $end);

        return $root;
    }
}