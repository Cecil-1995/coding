<?php

class Solution
{

    /**
     * @param String $s
     * @param String[][] $knowledge
     * @return String
     */
    function evaluate($s, $knowledge)
    {
        $map = [];
        foreach ($knowledge as $item) {
            $map[$item[0]] = $item[1];
        }
        $result = '';
        $word   = '';
        $flag   = false;
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if ($s[$i] === '(') {
                $flag = true;
            } elseif ($s[$i] === ')') {
                $result .= $map[$word] ?? '?';
                $word   = '';
                $flag   = false;
            } elseif ($flag) {
                $word .= $s[$i];
            } else {
                $result .= $s[$i];
            }
        }

        return $result;
    }
}