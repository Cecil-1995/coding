<?php

class Solution
{

    /**
     * @param String[] $chars
     * @return Integer
     */
    function compress(&$chars)
    {
        if (count($chars) === 0) {
            return 0;
        }
        $last  = $chars[0];
        $count = 0;
        $start = 0;
        foreach ($chars as $char) {
            if ($char === $last) {
                ++$count;
            } else {
                $chars[$start++] = $last;
                if ($count > 1) {
                    $nums = [];
                    while ($count != 0) {
                        $nums[] = $count % 10;
                        $count  = floor($count / 10);
                    }
                    for ($i = count($nums) - 1; $i >= 0; --$i) {
                        $chars[$start++] = strval($nums[$i]);
                    }

                }
                $last  = $char;
                $count = 1;
            }
        }

        $chars[$start++] = $last;
        if ($count > 1) {
            $nums = [];
            while ($count != 0) {
                $nums[] = $count % 10;
                $count  = floor($count / 10);
            }
            for ($i = count($nums) - 1; $i >= 0; --$i) {
                $chars[$start++] = strval($nums[$i]);
            }

        }

        return $start;
    }
}