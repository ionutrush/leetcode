<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution36;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution36Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution36();
    }

    public function testRemoveDuplicatesExample1(): void
    {
        $nums = [1,1,2];
        $no = $this->solution->removeDuplicates($nums);

        $this->assertSame(2, $no, "Expected 2, got $no");
        $this->assertSame([1,2], array_slice($nums, 0, 2));
    }

    public function testRemoveDuplicatesExample2()
    {
        $nums = [0,0,1,1,1,2,2,3,3,4];
        $no = $this->solution->removeDuplicates($nums);

        $this->assertSame(5, $no, "Expected 5, got $no");
        $this->assertSame([0,1,2,3,4], array_slice($nums, 0, 5));
    }
}
