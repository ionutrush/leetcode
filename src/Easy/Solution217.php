<?php

namespace Rushdevelopment\Leetcode\Easy;

use Rushdevelopment\Leetcode\Solution;

class Solution217 extends Solution
{
    /**
     * Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.
     *
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate(array $nums): bool {
        return $this->containsDuplicateUsingSets($nums);
    }

    // 9.40% runtime - readable, but slow
    function containsDuplicateUsingArrayCountValues(array $nums): bool {
        $vals = array_count_values($nums);
        arsort($vals);

        return reset($vals) > 1;
    }

    // this works great for small and medium arrays, but fails on big ones on leetcode
    function containsDuplicateUsingHashMap(array $nums): bool {
        $alreadySeen = [];
        foreach ($nums as $num) {
            if (in_array($num, $alreadySeen)) {
                return true;
            }
            $alreadySeen[] = $num;
        }

        return false;
    }

    // 56.43% runtime - this is better both in time and space complexity
    function containsDuplicateUsingSets(array $nums): bool {
        return count($nums) !== count(array_flip($nums));
    }

    // 47.02% - this improves our solution using array_count_values(C++ implementation)
    function containsDuplicateUsingArrayCountValuesSimplified(array $nums): bool {
        // Only works efficiently for integer or string keys
        $counts = array_count_values($nums);
        return max($counts) > 1;

    }

    // 52.66% - not bad, but still not the most optimal
    function containsDuplicatesUsingHashMapFixed(array $nums): bool {
        $seen = [];

        foreach ($nums as $num) {
            // Direct isset check is much faster than in_array
            if (isset($seen[$num])) {
                return true;
            }
            $seen[$num] = true;
        }

        return false;
    }

    // 35.11% - this looked to perform the best in my CLI, but not on leetcode
    function containsDuplicatesUsingBloomFilterPreCheck(array $nums): bool {
        $len = count($nums);

        // Empty or single element arrays can't have duplicates
        if ($len <= 1) return false;

        // For medium-sized arrays, try a randomized approach first
        if ($len > 100 && $len < 10000) {
            // Quick check - look at some random pairs
            // This can catch duplicates without processing the whole array
            $samples = min(500, $len);
            for ($i = 0; $i < $samples; $i++) {
                $idx1 = mt_rand(0, $len - 1);
                $idx2 = mt_rand(0, $len - 1);
                if ($idx1 !== $idx2 && $nums[$idx1] === $nums[$idx2]) {
                    return true;
                }
            }
        }

        // For very small arrays, use direct comparison
        if ($len < 50) {
            for ($i = 0; $i < $len; $i++) {
                for ($j = $i + 1; $j < $len; $j++) {
                    if ($nums[$i] === $nums[$j]) {
                        return true;
                    }
                }
            }
            return false;
        }

        // Main algorithm - Process in chunks with early exit
        // Using chunks can improve CPU cache performance
        $chunkSize = 256;
        $seen = [];

        for ($i = 0; $i < $len; $i += $chunkSize) {
            $chunk = array_slice($nums, $i, min($chunkSize, $len - $i));

            // Check this chunk for duplicates against our seen values
            foreach ($chunk as $num) {
                if (isset($seen[$num])) {
                    return true;
                }
            }

            // Check for duplicates within this chunk
            $chunkLen = count($chunk);
            if ($chunkLen !== count(array_flip($chunk))) {
                return true;
            }

            // Add all values from this chunk to seen
            foreach ($chunk as $num) {
                $seen[$num] = true;
            }
        }

        return false;
    }

    // 9.09% - sucky solution
    function containsDuplicatesUsingHashMapWithMinimalOverhead(array $nums): bool {
        $len = count($nums);

        // Empty or single element arrays can't have duplicates
        if ($len <= 1) return false;

        // Optimize hash size based on array length
        // Using a power of 2 for modulo optimization
        $hashSize = 1;
        while ($hashSize < $len * 3) {
            $hashSize <<= 1;
        }
        $hashMask = $hashSize - 1;

        // Initialize hash buckets
        $buckets = array_fill(0, $hashSize, null);

        // Insert each element into the hash table
        foreach ($nums as $num) {
            // Simple hash function
            $hash = ($num ^ ($num >> 16)) & $hashMask;

            // Check for collision
            $bucket = &$buckets[$hash];
            if ($bucket === null) {
                $bucket = [$num];
            } else {
                // Linear search is faster for small buckets
                foreach ($bucket as $item) {
                    if ($item === $num) {
                        return true;
                    }
                }
                $bucket[] = $num;
            }
        }

        return false;
    }

    // fails!
    function containsDuplicatesUsingSPLDataStructures(array $nums): bool {
        $len = count($nums);

        // Empty or single element arrays can't have duplicates
        if ($len <= 1) return false;

        // SPL structures are implemented in C and can be faster
        $set = new \SplObjectStorage();

        foreach ($nums as $num) {
            // We need to wrap integers as objects for SplObjectStorage
            $obj = (object)['value' => $num];

            // Check if we've seen this value before
            foreach ($set as $item) {
                if ($item->value === $num) {
                    return true;
                }
            }

            $set->attach($obj);
        }

        return false;
    }

    // 5.33% - slow, not good
    function containsDuplicatesUsingSort(array $nums): bool {
        $len = count($nums);

        // Empty or single element arrays can't have duplicates
        if ($len <= 1) return false;

        // For small arrays, early return with direct comparison
        if ($len < 20) {
            for ($i = 0; $i < $len; $i++) {
                for ($j = $i + 1; $j < $len; $j++) {
                    if ($nums[$i] === $nums[$j]) {
                        return true;
                    }
                }
            }
            return false;
        }

        // For large arrays, use sort+compare
        // Using non-stable sort which is faster
        sort($nums, SORT_NUMERIC);

        // Now compare adjacent elements in one pass
        $prev = $nums[0];
        for ($i = 1; $i < $len; $i++) {
            if ($nums[$i] === $prev) {
                return true;
            }
            $prev = $nums[$i];
        }

        return false;
    }

    // 24.14% - pretty slow
    function containsDuplicatesUsingBitManipulation(array $nums): bool {
        $len = count($nums);

        // Empty or single element arrays can't have duplicates
        if ($len <= 1) return false;

        // For very small arrays
        if ($len < 10) {
            for ($i = 0; $i < $len; $i++) {
                for ($j = $i + 1; $j < $len; $j++) {
                    if ($nums[$i] === $nums[$j]) {
                        return true;
                    }
                }
            }
            return false;
        }

        // Find min/max in one pass
        $min = $max = $nums[0];
        for ($i = 1; $i < $len; $i++) {
            if ($nums[$i] < $min) $min = $nums[$i];
            elseif ($nums[$i] > $max) $max = $nums[$i];
        }

        $range = $max - $min + 1;

        // For small ranges, use bitmap
        if ($range <= 1000000 && $range <= $len * 100) {
            // For small numbers in a compact range, use a bitmap
            if ($min >= 0 && $max < 10000) {
                $bitmap = array_fill(0, $max + 1, false);
                foreach ($nums as $num) {
                    if ($bitmap[$num]) {
                        return true;
                    }
                    $bitmap[$num] = true;
                }
                return false;
            }

            // For wider range but still compact
            $bitmap = array_fill(0, $range, false);
            foreach ($nums as $num) {
                $idx = $num - $min;
                if ($bitmap[$idx]) {
                    return true;
                }
                $bitmap[$idx] = true;
            }
            return false;
        }

        // Last resort: modified hash map with optimized insertion
        $hashMap = [];
        foreach ($nums as $num) {
            // Turning number into string key
            $key = (string)$num;
            if (isset($hashMap[$key])) {
                return true;
            }
            $hashMap[$key] = 1;
        }

        return false;
    }

    public function run(...$args): bool
    {
        return $this->containsDuplicate(...$args);
    }
}