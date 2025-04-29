<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution121;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution121Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution121();
    }

    public function testBestTimeToBuyAndSellStockExample1(): void
    {
        $prices = [7,1,5,3,6,4];
        $this->assertSame(5, $this->solution->maxProfit($prices));
    }

    public function testBestTimeToBuyAndSellStockExample2(): void
    {
        $prices = [7,6,4,3,1];
        $this->assertSame(0, $this->solution->maxProfit($prices));
    }

    public function testBestTimeToBuyAndSellStockExample3(): void
    {
        $prices = [2,4,1];
        $this->assertSame(2, $this->solution->maxProfit($prices));
    }
}