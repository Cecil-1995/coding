<?php

class Solution
{
    public $result = [];
    public $map    = [
        '2' => ['a', 'b', 'c'],
        '3' => ['d', 'e', 'f'],
        '4' => ['g', 'h', 'i'],
        '5' => ['j', 'k', 'l'],
        '6' => ['m', 'n', 'o'],
        '7' => ['p', 'q', 'r', 's'],
        '8' => ['t', 'u', 'v'],
        '9' => ['w', 'x', 'y', 'z'],
    ];

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        $this->backtrack($digits, 0, []);

        return $this->result;
    }

    function backtrack($digits, $start, $current)
    {
        if ($start === strlen($digits)) {
            if (!empty($current)) {
                $this->result[] = implode('', $current);
            }

            return;
        }

        for ($i = $start; $i < strlen($digits); ++$i) {
            $map = $this->map[$digits[$i]];
            foreach ($map as $item) {
                // 选择
                $current[] = $item;
                // 递归
                $this->backtrack($digits, $start + 1, $current);
                // 撤销
                array_pop($current);
            }
            break;
        }
    }
}

var_dump((new Solution())->letterCombinations('23'));