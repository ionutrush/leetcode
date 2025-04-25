<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\BinarySearchTreeTrait;
use Rushdevelopment\Leetcode\Solution;
use Rushdevelopment\Leetcode\ListNode;
Use Rushdevelopment\Leetcode\TreeNode;

class Solution109 extends Solution
{
    use BinarySearchTreeTrait;

    /**
     * @param ListNode|null $head
     * @return TreeNode|null
     */
    function sortedListToBST(?ListNode $head): ?TreeNode {
        if (is_null($head)) {
            return null;
        }

        // Get the length of the linked list
        $length = $head->count();

        // Store the head pointer in a class property to track current position
        $this->currentNode = $head;

        // Build the BST bottom-up with inorder traversal
        return $this->buildTreeFromListNodeInorder(0, $length - 1);
    }

    public function run(...$args): ?TreeNode
    {
        $payload = ListNode::convertArrayToListNode(current($args));
        return $this->sortedListToBST($payload);
    }
}