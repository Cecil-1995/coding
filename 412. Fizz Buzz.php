<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    function fizzBuzz($n)
    {
        $answer = [];
        for ($i = 1; $i <= $n; ++$i) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $answer[$i - 1] = 'FizzBuzz';
            } elseif ($i % 3 === 0) {
                $answer[$i - 1] = 'Fizz';
            } elseif ($i % 5 === 0) {
                $answer[$i - 1] = 'Buzz';
            } else {
                $answer[$i - 1] = strval($i);
            }
        }

        return $answer;
    }
}