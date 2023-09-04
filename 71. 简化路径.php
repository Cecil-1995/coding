<?php

class Solution
{

    /**
     * @param String $path
     * @return String
     */
    function simplifyPath($path)
    {
        $stack = [];
        $len   = strlen($path);
        $item  = '';
        for ($i = 0; $i < $len; ++$i) {
            if ($path[$i] === '/') {
                if ($item === '..') {
                    if (!empty($stack)) {
                        array_pop($stack);
                    }
                } elseif ($item !== '' && $item !== '.') {
                    array_push($stack, $item);
                }
                $item = '';
            } else {
                $item .= $path[$i];
            }
        }
        if ($item === '..') {
            if (!empty($stack)) {
                array_pop($stack);
            }
        } elseif ($item !== '' && $item !== '.') {
            array_push($stack, $item);
        }

        $ans = '';
        foreach ($stack as $item) {
            $ans .= '/' . $item;
        }

        return $ans === '' ? '/' : $ans;
    }
}

var_dump((new Solution())->simplifyPath("/a//b////c/d//././/.."));