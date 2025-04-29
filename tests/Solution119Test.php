<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution119;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution119Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution119();
    }

   public function testGetRowExample1(): void
   {
       $this->assertEquals(
           [1,3,3,1],
           $this->solution->getRow(3)
       );
   }

   public function testGetRowExample2(): void
   {
       $this->assertEquals(
           [1],
           $this->solution->getRow(0)
       );
   }

   public function testGetRowExample3(): void
   {
       $this->assertEquals(
           [1,1],
           $this->solution->getRow(1)
       );
   }
}