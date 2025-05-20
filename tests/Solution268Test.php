<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution268;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution268Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution268();
    }

    public function testMissingNumberExample1(): void
    {
        $input = [3,0,1];
        $this->assertSame(2, $this->solution->getMissingNumber($input));
    }

    public function testMissingNumberExample2(): void
    {
        $input = [0,1];
        $this->assertSame(2, $this->solution->getMissingNumber($input));
    }

    public function testMissingNumberExample3(): void
    {
        $input = [9,6,4,2,3,5,7,0,1];
        $this->assertSame(8, $this->solution->getMissingNumber($input));
    }
}