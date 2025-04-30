<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution169;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution169Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution169();
    }

    public function testMajorityElementExample1(): void
    {
        $nums = [3,2,3];
        $this->assertSame(3, $this->solution->majorityElement($nums));
    }

    public function testMajorityElementExample2(): void
    {
        $nums = [2,2,1,1,1,2,2];
        $this->assertSame(2, $this->solution->majorityElement($nums));
    }
}