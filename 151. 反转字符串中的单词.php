<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
        $s   = trim($s);
        $len = strlen($s);
        $a   = '';
        for ($i = 0; $i < $len; ++$i) {
            if ($s[$i] === ' ' && isset($s[$i - 1]) && $s[$i - 1] === ' ') {
            } else {
                $a .= $s[$i];
            }
        }
        $s = $a;
        $len = strlen($s);

        $this->reverseStr($s, 0, $len - 1);

        $start = 0;
        for ($end = 1; $end < $len; ++$end) {
            if ($s[$end] === ' ') {
                $this->reverseStr($s, $start, $end - 1);
                $start = $end + 1;
            }
        }
        $this->reverseStr($s, $start, $len - 1);


        return $s;
    }

    function reverseStr(&$str, $start, $end)
    {
        while ($start < $end) {
            $temp        = $str[$start];
            $str[$start] = $str[$end];
            $str[$end]   = $temp;

            ++$start;
            --$end;
        }
        var_dump($str);
    }
}

var_dump((new Solution())->reverseWords('a good   example'));