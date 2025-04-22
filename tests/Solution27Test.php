<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution27;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution27Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution27();
    }

    public function testRemoveDuplicatesExample1(): void
    {
        $nums = [3, 2, 2, 3];
        $val = 3;

        $this->assertSame(2, $this->solution->removeElement($nums, $val));
        $this->assertSame([2,2], array_slice($nums, 0, 2));
    }

    public function testRemoveDuplicatesExample2(): void
    {
        $nums = [0,1,2,2,3,0,4,2];
        $val = 2;

        $this->assertSame(5, $this->solution->removeElement($nums, $val));
        $this->assertSame([0,1,3,0,4], array_slice($nums, 0, 5));
    }
}
