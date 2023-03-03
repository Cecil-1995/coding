<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function decodeString($s)
    {
        $arr = [];
        for ($i = 0; $i < strlen($s); ++$i) {
            if ($s[$i] !== ']') {
                $arr[] = $s[$i];
            } else {
                $str = '';
                while (true) {
                    $item = array_pop($arr);
                    if ($item === '[') {
                        break;
                    } else {
                        $str = $item . $str;
                    }
                }

                $num = '';
                while (true) {
                    $numTemp = array_pop($arr);
                    if ('0' <= $numTemp && $numTemp <= '9') {
                        $num = $numTemp . $num;
                    } else {
                        $arr[] = $numTemp;
                        break;
                    }
                }
                $num = intval($num);
                $str = str_pad($str, $num * strlen($str), $str);
                for ($j = 0; $j < strlen($str); ++$j) {
                    $arr[] = $str[$j];
                }
            }
        }

        return implode('', $arr);
    }
}

var_dump((new Solution())->decodeString('100[leetcode]'));