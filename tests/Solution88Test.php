<?php

use PHPUnit\Framework\TestCase;
use Rushdevelopment\Leetcode\Easy\Solution88;

class Solution88Test extends TestCase
{
    private ?Solution88 $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution88();
    }

    /**
     * Test basic merging functionality
     */
    public function testBasicMerge(): void
    {
        // Arrange
        $nums1 = [1, 3, 5, 0, 0, 0];
        $m = 3;
        $nums2 = [2, 4, 6];
        $n = 3;
        
        // Act
        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        
        // Assert
        $this->assertEquals([1, 2, 3, 4, 5, 6], $nums1);
    }
    
    /**
     * Test when one array is empty
     */
    public function testEmptyArray(): void
    {
        // Case 1: Empty nums2
        $nums1 = [1, 2, 3];
        $m = 3;
        $nums2 = [];
        $n = 0;

        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        $this->assertEquals([1, 2, 3], $nums1);
        
        // Case 2: Empty nums1
        $nums1 = [0, 0, 0];
        $m = 0;
        $nums2 = [1, 2, 3];
        $n = 3;

        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        $this->assertEquals([1, 2, 3], $nums1);
    }
    
    /**
     * Test with duplicate values
     */
    public function testDuplicateValues(): void
    {
        $nums1 = [1, 2, 2, 0, 0, 0];
        $m = 3;
        $nums2 = [2, 5, 6];
        $n = 3;

        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        $this->assertEquals([1, 2, 2, 2, 5, 6], $nums1);
    }
    
    /**
     * Test with negative values
     */
    public function testNegativeValues(): void
    {
        $nums1 = [-1, 0, 1, 0, 0, 0];
        $m = 3;
        $nums2 = [-2, 3, 4];
        $n = 3;

        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        $this->assertEquals([-2, -1, 0, 1, 3, 4], $nums1);
    }
    
    /**
     * Test your specific example
     */
    public function testSpecificExample(): void
    {
        $nums1 = [-1, -1, 0, 0, 0, 0];
        $m = 4;
        $nums2 = [-1, 0];
        $n = 2;

        $this->solution->mergeUsingTwoPointers($nums1, $m, $nums2, $n);
        $this->assertEquals([-1, -1, -1, 0, 0, 0], $nums1);
    }
}