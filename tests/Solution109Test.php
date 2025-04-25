<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution109;
use Rushdevelopment\Leetcode\ListNode;
use Rushdevelopment\Leetcode\SolutionInterface;
use Rushdevelopment\Leetcode\TreeNode;

class Solution109Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution109();
    }

    public function testConvertSortedListToBinarySearchTreeExample1(): void
    {
        $input = [-10, -3, 0, 5, 9];
        $this->assertEquals(
            new TreeNode(
                0,
                new TreeNode(-10, null, new TreeNode(-3)),
                new TreeNode(5, null, new TreeNode(9))
            ),
            $this->solution->sortedListToBST(
                ListNode::convertArrayToListNode($input)
            )
        );
    }

    public function testConvertSortedListToBinarySearchTreeExample2(): void
    {
        $input = [];
        $this->assertEquals(
            new TreeNode(),
            $this->solution->sortedListToBST(
                ListNode::convertArrayToListNode($input)
            )
        );
    }
}