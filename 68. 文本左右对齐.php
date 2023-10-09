<?php

class Solution
{

    /**
     * @param String[] $words
     * @param Integer $maxWidth
     * @return String[]
     */
    function fullJustify($words, $maxWidth)
    {
        $ans = [];
        $n   = count($words);

        $temp   = [];
        $length = 0;
        for ($i = 0; $i < $n; ++$i) {
            if ($length + count($temp) + strlen($words[$i]) <= $maxWidth) {
                $temp[] = $words[$i];
                $length += strlen($words[$i]);
            } else {
                if (count($temp) === 1) {
                    // 左对齐
                    $ans[] = str_pad($temp[0], $maxWidth, ' ');
                } else {
                    // 左右对齐
                    $black  = floor(($maxWidth - $length) / (count($temp) - 1));
                    $blackR = ($maxWidth - $length) % (count($temp) - 1);
                    $r      = '';
                    for ($j = 0; $j < count($temp); ++$j) {
                        if ($j === 0) {
                        } elseif ($j <= $blackR) {
                            $r .= str_pad('', $black + 1, ' ');
                        } else {
                            $r .= str_pad('', $black, ' ');;
                        }
                        $r .= $temp[$j];
                    }
                    $ans[] = $r;
                }

                $temp   = [];
                $length = 0;
                --$i;
            }
        }

        $ans[] = str_pad(implode(' ', $temp), $maxWidth, ' ');

        return $ans;
    }
}