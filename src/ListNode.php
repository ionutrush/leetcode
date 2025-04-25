<?php

namespace Rushdevelopment\Leetcode;

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
         $this->val = $val;
         $this->next = $next;
    }

    public static function convertArrayToListNode(array $values): ?ListNode
    {
        $head = null;
        $tail = null;
        foreach ($values as $value) {
            $node = new ListNode($value);
            if ($head === null) {
                $head = $node;
                $tail = $node;
            } else {
                $tail->next = $node;
                $tail = $node;
            }
        }

        return $head;
    }

    public function count(): int
    {
        $count = 0;
        $node = $this;
        while ($node !== null) {
            $count++;
            $node = $node->next;
        }

        return $count;
    }
}