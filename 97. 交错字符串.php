<?php

class Solution
{
    public $map = [];

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3)
    {
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        $len3 = strlen($s3);
        if ($len1 + $len2 !== $len3) {
            return false;
        }

        return $this->dp($s1, 0, $s2, 0, $s3);
    }

    function dp($s1, $i, $s2, $j, $s3)
    {
        if (isset($this->map[$i . '_' . $j])) {
            return $this->map[$i . '_' . $j];
        }
        $k = $i + $j;
        if ($k === strlen($s3)) {
            return true;
        }

        $res = false;
        if ($i < strlen($s1) && $s1[$i] === $s3[$k]) {
            $res = $this->dp($s1, $i + 1, $s2, $j, $s3);
        }
        if ($j < strlen($s2) && $s2[$j] === $s3[$k]) {
            $res = $res || $this->dp($s1, $i, $s2, $j + 1, $s3);
        }
        $this->map[$i . '_' . $j] = $res;

        return $res;
    }

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave2($s1, $s2, $s3)
    {
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        $len3 = strlen($s3);
        if ($len1 + $len2 !== $len3) {
            return false;
        }

        $f[0][0] = true;

        for ($i = 0; $i <= $len1; ++$i) {
            for ($j = 0; $j <= $len2; ++$j) {
                $k = $i + $j - 1;
                if ($j > 0) {
                    $f[$i][$j] = $f[$i][$j] || ($s2[$j - 1] === $s3[$k] && $f[$i][$j - 1]);
                }
                if ($i > 0) {
                    $f[$i][$j] = $f[$i][$j] || ($s1[$i - 1] === $s3[$k] && $f[$i - 1][$j]);
                }
            }
        }

        return $f[$len1][$len2];
    }

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave3($s1, $s2, $s3)
    {
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        $len3 = strlen($s3);
        if ($len1 + $len2 !== $len3) {
            return false;
        }

        $f[0] = true;
        for ($i = 0; $i <= $len1; ++$i) {
            for ($j = 0; $j <= $len2; ++$j) {
                $k = $i + $j - 1;
                if ($i > 0) {
                    $f[$j] = $s1[$i - 1] === $s3[$k] && $f[$j];
                }

                if ($j > 0) {
                    $f[$j] = $f[$j] || ($s2[$j - 1] === $s3[$k] && $f[$j - 1]);
                }
            }
        }

        return $f[$len2];
    }
}

var_dump((new Solution())->isInterleave2('aabcc', 'dbbca', 'aadbbcbcac'));