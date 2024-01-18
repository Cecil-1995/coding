<?php

class Solution
{

    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num)
    {
        if ($num == 0) {
            return 'Zero';
        }
        $arr = [];
        $cur = [];
        while ($num) {
            array_unshift($cur, $num % 10);
            if (count($cur) === 3) {
                array_push($arr, $cur);
                $cur = [];
            }
            $num = floor($num / 10);
        }
        if (!empty($cur)) {
            array_push($arr, $cur);
        }
        $arr = array_pad($arr, 4, []);

        $ans = '';
        $map = ['', ' Thousand ', ' Million ', ' Billion '];
        foreach ($arr as $i => $item) {
            $cur = $this->helper($item);
            if ($cur !== '') {
                $ans = $cur . $map[$i] . $ans;
            }
        }

        return trim($ans);
    }

    function helper($arr)
    {
        $arr = ltrim(implode('', $arr), '0');
        $arr = ltrim($arr, '0');
        $arr = ltrim($arr, '0');
        if (strlen($arr) === 3) {
            $two = $this->helper2(substr($arr, 1, 2));
            if ($two == '') {
                return $this->helper2(substr($arr, 0, 1)) . ' Hundred';
            }

            return $this->helper2(substr($arr, 0, 1)) . ' Hundred ' . $two;
        } elseif (strlen($arr) === 2) {
            return $this->helper2($arr);
        } elseif (strlen($arr) === 1) {
            return $this->helper2($arr);
        } else {
            return '';
        }
    }

    function helper2($num)
    {
        $num  = intval($num);
        $map  = [
            '',
            'One',
            'Two',
            'Three',
            'Four',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Nine',
            'Ten',
            'Eleven',
            'Twelve',
            'Thirteen',
            'Fourteen',
            'Fifteen',
            'Sixteen',
            'Seventeen',
            'Eighteen',
            'Nineteen'
        ];
        $map2 = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
        if ($num < 20) {
            return $map[$num];
        } else {
            return $map2[intval($num / 10) - 2] . ($num % 10 === 0 ? '' : (' ' . $map[$num % 10]));
        }
    }
}