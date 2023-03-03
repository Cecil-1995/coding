<?php

class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Integer[]
     */
    function findAnagrams($s, $p)
    {
        $result = [];

        $sLen    = strlen($s);
        $pLen    = strlen($p);
        $windows = [];
        $needs   = [];

        for ($i = 0; $i < $pLen; ++$i) {
            $needs[$p[$i]] = isset($needs[$p[$i]]) ? $needs[$p[$i]] + 1 : 1;
        }

        $left    = 0;
        $right   = 0;
        $success = 0;
        while ($right < $sLen) {
            $char = $s[$right];
            ++$right;

            if (isset($needs[$char])) {
                $windows[$char] = isset($windows[$char]) ? $windows[$char] + 1 : 1;
                if ($windows[$char] === $needs[$char]) {
                    // $char 这个字符满足题目要求了
                    ++$success;
                }
            }

            while ($right - $left >= $pLen) {
                if ($success === count($needs)) {
                    $result[] = $left;
                }

                $char = $s[$left];
                ++$left;
                if (isset($needs[$char])) {
                    if ($windows[$char] === $needs[$char]) {
                        --$success;
                    }
                    --$windows[$char];
                }
            }
        }

        return $result;
    }
}

var_dump((new Solution())->findAnagrams('baa', 'aa'));