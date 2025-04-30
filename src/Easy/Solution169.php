<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution169 extends Solution
{
    /**
     * Given an array nums of size n, return the majority element.
     * The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.
     * @param Integer[] $nums
     * @return Integer
     */
    // Minimal code complexity: The solution is simple, readable, and maintainable.
    function majorityElement(array $nums): int {
        $minSize = floor(count($nums) / 2);

        // 1. PHP's C-level optimizations: `array_count_values()` is implemented at the C level in PHP's core, making it significantly faster than any manual counting implementation we might write in PHP.
        // 2. Single pass through data: The algorithm makes just one pass through the data to build the frequency map.
        // 3. Early termination: The implementation returns as soon as it finds the majority element, rather than continuing to process unnecessary counts.
        foreach (array_count_values($nums) as $value => $count) {
            if ($count > $minSize) {
                return $value;
            }
        }

        throw new \InvalidArgumentException('No majority element found');
    }

    // this performance worse in runtime :(
    function majorityElementUsingBoyerMoore(array $nums): int {
        // Initialize counter and candidate
        $count = 0;          // Tracks the "votes" for the current candidate
        $candidate = null;   // The current candidate for majority element

        // Single pass through the array - O(n) time complexity
        foreach ($nums as $num) {
            // When count reaches zero, select a new candidate
            // This is key to the algorithm - we "forget" previous history
            if ($count === 0) {
                $candidate = $num;
            }

            // Increment count if we see the current candidate,
            // decrement count if we see any other element
            // This is like a "voting" process
            $count += ($num === $candidate) ? 1 : -1;
        }

        // The candidate remaining at the end must be the majority element
        // (According to the problem constraints, majority element always exists)
        return $candidate;

    }

    // this performance worse in runtime :( , but much better in space complexity(memory)
    function majorityElementUsingEarlyReturn(array $nums): int {
        $counts = [];
        $threshold = floor(count($nums) / 2);

        // Process each element one at a time
        foreach ($nums as $num) {
            // Initialize counter if not exists
            if (!isset($counts[$num])) {
                $counts[$num] = 0;
            }

            // Increment counter for this element
            $counts[$num]++;

            // Check if current element has become the majority
            // This enables early return without processing the entire array
            if ($counts[$num] > $threshold) {
                return $num;
            }
        }

        throw new \InvalidArgumentException('No majority element found');

    }

    // this performance is as good as majorityElement, memory is worse though and majorityElement is much more readable
    function majorityElementUsingFrequencyConutingAndArrayOptimization(array $nums): int {
        // For small arrays (most test cases), just use the original approach
        $length = count($nums);
        $threshold = floor($length / 2);

        // Process in chunks to reduce peak memory usage
        $chunkSize = 1000; // Adjust based on your typical input size

        // Initialize frequency counter
        $frequencyMap = [];

        // Process array in chunks
        for ($i = 0; $i < $length; $i += $chunkSize) {
            $chunk = array_slice($nums, $i, min($chunkSize, $length - $i));
            $chunkCounts = array_count_values($chunk);

            // Merge counts with main frequency map
            foreach ($chunkCounts as $value => $count) {
                if (!isset($frequencyMap[$value])) {
                    $frequencyMap[$value] = 0;
                }
                $frequencyMap[$value] += $count;

                // Early return if we found the majority element
                if ($frequencyMap[$value] > $threshold) {
                    return $value;
                }
            }
        }

        throw new \InvalidArgumentException('No majority element found');
    }

    public function run(...$args): int
    {
        return $this->majorityElement(...$args);
    }
}