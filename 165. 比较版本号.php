<?php

class Solution
{

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion1($version1, $version2)
    {
        $len1 = strlen($version1);
        $len2 = strlen($version2);

        $a = $b = 0;
        $i = $j = 0;
        for (; $i < $len1; ++$i) {
            if ($version1[$i] !== '.') {
                $a = $a * pow(10, strlen($a)) + $version1[$i];
            } else {
                for (; $j < $len2; ++$j) {
                    if ($version2[$j] !== '.') {
                        $b = $b * pow(10, strlen($b)) + $version2[$j];
                    } else {
                        if ($a > $b) {
                            return 1;
                        } elseif ($a < $b) {
                            return -1;
                        } else {
                            $a = $b = 0;
                            ++$j;
                            break;
                        }
                    }
                }

                if ($a > $b) {
                    return 1;
                } elseif ($a < $b) {
                    return -1;
                } else {
                    $a = $b = 0;
                }
            }
        }

        for (; $j < $len2; ++$j) {
            if ($version2[$j] !== '.') {
                $b = $b * pow(10, strlen($b)) + $version2[$j];
            } else {
                if ($a > $b) {
                    return 1;
                } elseif ($a < $b) {
                    return -1;
                } else {
                    $a = $b = 0;
                }
            }

        }

        if ($a > $b) {
            return 1;
        } elseif ($a < $b) {
            return -1;
        } else {
            return 0;
        }
    }

    function compareVersion($version1, $version2) {
        $array1 = explode('.', $version1);
        $array2 = explode('.', $version2);
        $x = $y = 0;
        for($i = 0; $i < count($array1) || $i < count($array2); ++$i) {
            $x = intval($array1[$i] ?? 0);
            $y = intval($array2[$i] ?? 0);
            if ($x > $y) {
                return 1;
            } elseif ($x < $y) {
                return -1;
            }
        }

        if ($x > $y) {
            return 1;
        } elseif ($x < $y) {
            return -1;
        } else {
            return 0;
        }
    }
}

var_dump((new Solution())->compareVersion('1.0', '1'));