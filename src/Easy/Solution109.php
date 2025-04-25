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
     * @param ListNode $head
     * @return TreeNode|null
     */
    function sortedListToBST(?ListNode $head): ?TreeNode {
        // Get the length of the linked list
        $length = $head->count();

        // Build the BST bottom-up with inorder traversal
        return $this->buildTreeFromListNodeInorder($head,0, $length - 1);
    }

    public function run(...$args): ?TreeNode
    {
        $payload = ListNode::convertArrayToListNode(current($args));
        return $this->sortedListToBST($payload);
    }
}