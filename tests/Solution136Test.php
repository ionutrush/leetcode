<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution136;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution136Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution136();
    }

    public function testSingleNumberExample1(): void
    {
        $nums = [2,2,1];
        $this->assertSame(1, $this->solution->singleNumber($nums));
    }

    public function testSingleNumberExample2(): void
    {
        $nums = [4,1,2,1,2];
        $this->assertSame(4, $this->solution->singleNumber($nums));
    }

    public function testSingleNumberExample3(): void {
        $nums = [1];
        $this->assertSame(1, $this->solution->singleNumber($nums));
    }
}