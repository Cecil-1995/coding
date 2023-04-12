<?php

class Solution
{

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens)
    {
        $stack = [];
        foreach ($tokens as $token) {
            if ($token === '+' || $token === '-' || $token === '*' || $token === '/') {
                $b = array_pop($stack);
                $a = array_pop($stack);
                switch ($token) {
                    case '+':
                        array_push($stack, $a + $b);
                        break;
                    case '-':
                        array_push($stack, $a - $b);
                        break;
                    case '*':
                        array_push($stack, $a * $b);
                        break;
                    case '/':
                        array_push($stack, intval($a / $b));
                        break;
                }
            } else {
                array_push($stack, $token);
            }
        }

        return $stack[0];
    }
}