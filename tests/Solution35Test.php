<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution35;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution35Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution35();
    }

    public function testSearchInsertExample1(): void
    {
        $nums = [1,3,5,6];
        $target = 5;

        $this->assertSame(2, $this->solution->searchInsert($nums, $target));
    }

    public function testSearchInsertExample2(): void
    {
        $nums = [1,3,5,6];
        $target = 2;

        $this->assertSame(1, $this->solution->searchInsert($nums, $target));
    }

    public function testSearchInsertExample3(): void
    {
        $nums = [1,3,5,6];
        $target = 7;

        $this->assertSame(4, $this->solution->searchInsert($nums, $target));
    }
}
