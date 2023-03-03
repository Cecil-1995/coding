<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $res = '';

        for ($i = 0; $i < strlen($s); ++$i) {
            $res1 = $this->palindrome($s, $i, $i);
            //            $res2 = $this->palindrome($s, $i, $i + 1);
            var_dump($res1);

            $res = strlen($res1) > strlen($res) ? $res1 : $res;
            //            $res = strlen($res2) > strlen($res) ? $res2 : $res;
        }

        return $res;
    }

    function palindrome($s, $l, $r)
    {
        while ($l >= 0 && $r <= strlen($s) - 1 && $s[$l] === $s[$r]) {
            --$l;
            ++$r;
        }

        return substr($s, $l + 1, $r - 1 - ($l + 1) + 1);
    }
}

var_dump((new Solution())->longestPalindrome('babad'));