<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\BinarySearchTreeTrait;
use Rushdevelopment\Leetcode\Solution;
use Rushdevelopment\Leetcode\ListNode;
Use Rushdevelopment\Leetcode\TreeNode;

class Solution109 extends Solution
{
    use BinarySearchTreeTrait;

    private ?ListNode $currentNode;

    /**
     * @param ListNode $head
     * @return TreeNode|null
     */
    function sortedListToBST(?ListNode $head): ?TreeNode {
        // Get the length of the linked list
        $length = 0;
        $current = $head;
        while ($current !== null) {
            $length++;
            $current = $current->next;
        }

        // Store the head pointer in a class property to track current position
        $this->currentNode = $head;

        // Build the BST bottom-up with inorder traversal
        return $this->buildTreeInorder(0, $length - 1);
    }

    public function run(...$args): ?TreeNode
    {
        $payload = ListNode::convertArrayToListNode(current($args));
        return $this->sortedListToBST($payload);
    }
}