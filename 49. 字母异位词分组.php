<?php

class Solution
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs)
    {
        $result = [];
        $map    = [];

        foreach ($strs as $str) {
            $code = $this->encode($str);
            var_dump($code);
            if (!isset($map[$code])) {
                $map[$code] = [$str];
            } else {
                $map[$code][] = $str;
            }
        }
        die();

        foreach ($map as $item) {
            $result[] = $item;
        }

        return $result;
    }

    function encode($str)
    {
        $result = array_fill(0, 26, 0);
        for ($i = 0; $i < strlen($str); ++$i) {
            ++$result[ord($str[$i]) - ord('a')];
        }

        return implode(',', $result);
    }
}

var_dump((new Solution())->groupAnagrams(["bdddddddddd","bbbbbbbbbbc"]));