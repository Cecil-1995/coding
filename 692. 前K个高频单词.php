<?php

class CustomerSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        if ($priority1['v'] < $priority2['v']) {
            return 1;
        } elseif ($priority1['v'] > $priority2['v']) {
            return -1;
        } else {
            return $this->compareWord($priority1['k'], $priority2['k']);
        }
    }

    /**
     * @param $word1
     * @param $word2
     * @return int 如果$word1排在$word2后面，返回正数，否则返回负数
     */
    function compareWord($word1, $word2)
    {
        $word1Len = strlen($word1);
        $word2Len = strlen($word2);
        $i        = 0;

        while ($i < $word1Len && $i < $word2Len) {
            if (ord($word1[$i]) > ord($word2[$i])) {
                return 1;
            } elseif (ord($word1[$i]) < ord($word2[$i])) {
                return -1;
            } else {
                ++$i;
            }
        }

        if ($i < $word1Len) {
            return 1;
        }
        if ($i < $word2Len) {
            return -1;
        }

        return 0;
    }
}

class Solution
{

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k)
    {
        // 最小堆
        $map = [];
        foreach ($words as $word) {
            $map[$word] = isset($map[$word]) ? ++$map[$word] : 1;
        }

        $queue = new CustomerSplPriorityQueue();
        $queue->setExtractFlags(CustomerSplPriorityQueue::EXTR_PRIORITY);
        foreach ($map as $key => $value) {
            if ($queue->count() < $k) {
                $queue->insert('', ['k' => $key, 'v' => $value]);
            } else {
                $top = $queue->top();
                if ($top['v'] < $value || ($top['v'] === $value && $queue->compareWord($top['k'], $key) >= 0)) {
                    $queue->extract();
                    $queue->insert('', ['k' => $key, 'v' => $value]);
                }
            }
        }

        $ans = [];
        while (!$queue->isEmpty()) {
            array_unshift($ans, $queue->extract()['k']);
        }

        return $ans;
    }
}

var_dump((new Solution())->topKFrequent(["i", "love", "leetcode", "i", "love", "coding"], 3));