<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution217;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution217Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution217();
    }

    public function testContainsDuplicateExample1(): void
    {
        $nums = [1,2,3,1];
        $this->assertTrue($this->solution->containsDuplicate($nums));
    }

    public function testContainsDuplicateExample2(): void
    {
        $nums = [1,2,3,4];
        $this->assertFalse($this->solution->containsDuplicate($nums));
    }

    public function testContainsDuplicateExample3(): void
    {
        $nums = [1,1,1,3,3,4,3,2,4,2];
        $this->assertTrue($this->solution->containsDuplicate($nums));

    }
}