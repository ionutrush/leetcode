<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution219;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution219Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution219();
    }

    public function testContainsNearbyDuplicateExample1(): void
    {
        $nums = [1,2,3,1];
        $this->assertTrue($this->solution->containsNearbyDuplicate($nums, 3));
    }

    public function testContainsNearbyDuplicateExample2(): void
    {
        $nums = [1,0,1,1];
        $this->assertTrue($this->solution->containsNearbyDuplicate($nums, 1));
    }

    public function testContainsNearbyDuplicateExample3(): void
    {
        $nums = [1,2,3,1,2,3];
        $this->assertFalse($this->solution->containsNearbyDuplicate($nums, 2));
    }
}