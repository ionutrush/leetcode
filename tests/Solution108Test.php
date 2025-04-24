<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution108;
use Rushdevelopment\Leetcode\SolutionInterface;
use Rushdevelopment\Leetcode\TreeNode;

class Solution108Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution108();
    }

    public function testConvertSortedArrayToBinarySearchTreeExample1(): void
    {
        $input = [-10,-3,0,5,9];
        $this->assertEquals(
            new TreeNode(
                0,
                new TreeNode(-10, null, new TreeNode(-3)),
                new TreeNode(5, null, new TreeNode(9))
            ),
            $this->solution->sortedArrayToBST($input)
        );
    }

    public function testConvertSortedArrayToBinarySearchTreeExample2(): void
    {
        $input = [1,3];
        $this->assertEquals(
            new TreeNode(
                1,
                null,
                new TreeNode(3)
            ),
            $this->solution->sortedArrayToBST($input)
        );
    }
}