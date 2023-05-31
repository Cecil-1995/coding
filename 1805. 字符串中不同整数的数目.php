<?php

class Solution
{

    /**
     * @param String $word
     * @return Integer
     */
    function numDifferentIntegers($word)
    {
        $map  = [];
        $temp = '';
        for ($i = 0, $len = strlen($word); $i < $len; ++$i) {
            if ($word[$i] >= '0' && $word[$i] <= '9') {
                $temp .= $word[$i];
            } elseif ($temp != '') {
                $flag  = true;
                $tempR = '';
                for ($j = 0; $j < strlen($temp); ++$j) {
                    if (!$flag || $temp[$j] !== '0') {
                        $tempR .= $temp[$j];
                    }
                    if ($temp[$j] !== '0') {
                        $flag = false;
                    }
                }

                if (strlen($tempR) === 0) {
                    $tempR = '0';
                }
                $map[$tempR] = true;
                $temp        = '';
            }
        }
        if ($temp != '') {
            $flag  = true;
            $tempR = '';
            for ($j = 0; $j < strlen($temp); ++$j) {
                if (!$flag || $temp[$j] !== '0') {
                    $tempR .= $temp[$j];
                }
                if ($temp[$j] !== '0') {
                    $flag = false;
                }
            }
            if (strlen($tempR) === 0) {
                $tempR = '0';
            }
            $map[$tempR] = true;
        }

        return count($map);
    }
}