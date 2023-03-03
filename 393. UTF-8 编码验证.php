<?php

class Solution
{

    /**
     * @param Integer[] $data
     * @return Boolean
     */
    function validUtf8($data)
    {
        $arr = [];
        foreach ($data as $item) {
            $arr[] = $this->decbin($item);
        }
        $count = count($arr);

        for ($i = 0; $i < $count; ++$i) {
            if ($arr[$i][0] === '0') {
            } elseif ($arr[$i][0] === '1' && $arr[$i][1] === '1' && $arr[$i][2] === '0') {
                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }
            } elseif ($arr[$i][0] === '1' && $arr[$i][1] === '1' && $arr[$i][2] === '1' && $arr[$i][3] === '0') {
                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }

                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }
            } elseif ($arr[$i][0] === '1' && $arr[$i][1] === '1' && $arr[$i][2] === '1' && $arr[$i][3] === '1' && $arr[$i][4] === '0') {
                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }

                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }

                ++$i;
                if ($i === $count) {
                    return false;
                }
                if ($arr[$i][0] !== '1' || $arr[$i][1] !== '0') {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    function decbin($num)
    {
        if ($num == 0) {
            return '00000000';
        }
        $result = '';
        while ($num) {
            $result .= $num % 2;
            $num    = floor($num / 2);
        }
        $result = str_pad($result, 8, '0');

        return strrev($result);
    }
}

var_dump((new Solution())->validUtf8([10]));

//var_dump((new Solution())->decbin(1));