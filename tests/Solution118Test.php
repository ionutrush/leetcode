<?php

namespace Rushdevelopment\Leetcode\Tests;

require "vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution118;
use Rushdevelopment\Leetcode\SolutionInterface;

class Solution118Test extends TestCase
{
    private ?SolutionInterface $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution118();
    }

   public function testGenerateExample1(): void
   {
       $this->assertEquals(
           [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]],
           $this->solution->generate(5)
       );
   }

   public function testGenerateExample2(): void
   {
       $this->assertEquals(
           [[1]],
           $this->solution->generate(1)
       );
   }
}