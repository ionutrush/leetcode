<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution66;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution66Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution66();
    }

    public function testPlusOneExample1(): void
    {
        $this->assertSame([1,2,4], $this->solution->plusOne([1,2,3]));
    }

    public function testPlusOneExample2(): void
    {
        $this->assertSame([4,3,2,2], $this->solution->plusOne([4,3,2,1]));
    }

    public function testPlusOneExample3(): void
    {
        $this->assertSame([1,0], $this->solution->plusOne([9]));
    }

    public function testPlusOneExample4(): void
    {
        $this->assertSame(
            [7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,7],
            $this->solution->plusOne([7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,6])
        );
    }
}
