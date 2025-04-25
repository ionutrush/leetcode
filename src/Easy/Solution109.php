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
        $nums = $this->convertListNodeToSortedArray($head);

        // Handle empty array case
        if (empty($nums)) {
            return null;
        }

        // The recursive helper function is the best way to handle this
        // We'll use array indices to avoid creating subarrays
        return $this->constructBST($nums, 0, count($nums) - 1);
    }

    function convertListNodeToSortedArray(?ListNode $head): ?array {
        $values = [];
        while ($head !== null) {
            $values[] = $head->val;
            $head = $head->next;
        }

        return $values;
    }

    function convertArrayToListNode(array $values): ?ListNode
    {
        $head = null;
        $tail = null;
        foreach ($values as $value) {
            $node = new ListNode($value);
            if ($head === null) {
                $head = $node;
                $tail = $node;
            } else {
                $tail->next = $node;
                $tail = $node;
            }
        }

        return $head;
    }

    public function run(...$args): ?TreeNode
    {
        $payload = $this->convertArrayToListNode(current($args));
        return $this->sortedListToBST($payload);
    }
}