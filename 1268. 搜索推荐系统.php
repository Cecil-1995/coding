<?php

class Solution
{

    /**
     * @param String[] $products
     * @param String $searchWord
     * @return String[][]
     */
    function suggestedProducts($products, $searchWord)
    {
        sort($products);
        $count = count($products);

        $ans = [];
        for ($i = 0, $len = strlen($searchWord); $i < $len; ++$i) {
            $left  = 0;
            $right = $count - 1;

            while ($left <= $right) {
                $middle = floor($left + ($right - $left) / 2);
                $comp   = $this->comp(substr($searchWord, 0, $i + 1), $products[$middle]);
                if ($comp === -1) {
                    // $searchWord < $products[$middle]
                    $right = $middle - 1;
                } elseif ($comp === 1) {
                    // $searchWord > $products[$middle]
                    $left = $middle + 1;
                } else {
                    // $searchWord = $products[$middle]
                    $right = $middle - 1;
                }
            }

            if ($right < 0) {
                $start = 0;
            } elseif ($left > $count - 1) {
                $start = $count - 1;
            } else {
                $start = $right + 1;
            }

            $item = [];
            for ($j = 0; $j < 3; ++$j) {
                if (isset($products[$start + $j]) && $this->comp(
                        substr($searchWord, 0, $i + 1), $products[$start + $j], false
                    )) {
                    $item[] = $products[$start + $j];
                }
            }

            $ans[] = $item;
        }

        return $ans;
    }

    function comp($a, $b, $flag = true)
    {
        $aLen = strlen($a);
        $bLen = strlen($b);

        $i = $j = 0;
        while ($i < $aLen && $j < $bLen) {
            if ($a[$i] > $b[$j]) {
                if (!$flag) {
                    return false;
                }

                return 1;
            } elseif ($a[$i] < $b[$j]) {
                if (!$flag) {
                    return false;
                }

                return -1;
            }
            ++$i;
            ++$j;
        }

        if ($i < $aLen) {
            if (!$flag) {
                return false;
            }

            return 1;
        } elseif ($j < $bLen) {
            if (!$flag) {
                return true;
            }

            return -1;
        } else {
            if (!$flag) {
                return true;
            }

            return 0;
        }

    }
}

var_dump((new Solution())->suggestedProducts(["mobile", "mouse", "moneypot", "monitor", "mousepad"], 'mouse'));