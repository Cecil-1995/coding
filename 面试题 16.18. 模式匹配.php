<?php

class Solution
{

    /**
     * @param String $pattern
     * @param String $value
     * @return Boolean
     */
    function patternMatching($pattern, $value)
    {
        $aCount     = 0;
        $bCount     = 0;
        $lenPattern = strlen($pattern);
        $lenValue   = strlen($value);
        for ($i = 0; $i < $lenPattern; ++$i) {
            if ($pattern[$i] === 'a') {
                ++$aCount;
            } else {
                ++$bCount;
            }
        }

        if ($lenValue === 0) {
            return $aCount === 0 || $bCount === 0;
        }
        if ($lenPattern === 0) {
            return false;
        }

        for ($aLen = 0; $aLen * $aCount <= $lenValue; ++$aLen) {
            $rest = $lenValue - $aLen * $aCount;
            $bLen = 0;
            if (($bCount === 0 && $rest === 0) || ($bCount !== 0 && $rest % $bCount === 0)) {
                if ($bCount !== 0) {
                    $bLen = $rest / $bCount;
                }
                $pos  = 0;
                $a    = $b = '';
                $flag = true;
                for ($i = 0; $i < $lenPattern; ++$i) {
                    if ($pattern[$i] === 'a') {
                        if ($a === '') {
                            $a = substr($value, $pos, $aLen);
                        } elseif ($a !== substr($value, $pos, $aLen)) {
                            $flag = false;
                            break;
                        }
                        $pos += $aLen;
                    } else {
                        if ($b === '') {
                            $b = substr($value, $pos, $bLen);
                        } elseif ($b !== substr($value, $pos, $bLen)) {
                            $flag = false;
                            break;
                        }
                        $pos += $bLen;
                    }
                }

                if ($flag && $a !== $b) {
                    return true;
                }
            }

            if ($aCount === 0) {
                return false;
            }
        }

        return false;
    }
}

var_dump((new Solution())->patternMatching('bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'p'));