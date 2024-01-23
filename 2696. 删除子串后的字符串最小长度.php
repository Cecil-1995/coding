<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function minLength($s)
    {
        $len = strlen($s);
        for ($i = 0; $i < $len - 1; ++$i) {
            if ($s[$i] === 'A' && $s[$i + 1] === 'B' || $s[$i] === 'C' && $s[$i + 1] === 'D') {
                $s   = substr($s, 0, $i) . substr($s, $i + 2);
                $len -= 2;
                if ($i > 0 && ($s[$i - 1] === 'A' || $s[$i - 1] === 'C')) {
                    $i -= 2;
                } else {
                    --$i;
                }
            }
        }

        return $len;
    }
}