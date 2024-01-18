<?php

class Solution
{

    /**
     * @param Integer $length
     * @param Integer $w
     * @param Integer $x1
     * @param Integer $x2
     * @param Integer $y
     * @return Integer[]
     */
    function drawLine($length, $w, $x1, $x2, $y)
    {
        // 每行w个元素，总共y行，其中x1到x2为1，其余为0
        $arr = array_pad([], $w * $y + $x1, '0');
        $arr = array_pad($arr, $w * $y + $x2 + 1, '1');
        $arr = array_pad($arr, $w * ($y + 1), '0');

        $ans   = array_pad([], $length, 0);
        $index = 0;
        for ($i = 0; $i < count($arr); $i += 32) {
            $s = array_slice($arr, $i, 32);
            $s = implode('', $s);
            if ($s[0] === '0') {
                $ans[$index++] = bindec(substr($s, 1));
            } else {
                $ans[$index++] = -(pow(2, 31) - bindec(substr($s, 1)));
            }
        }

        return $ans;
    }
}