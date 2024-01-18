<?php

class Solution
{

    /**
     * @param String $solution
     * @param String $guess
     * @return Integer[]
     */
    function masterMind($solution, $guess)
    {
        $map1   = ['R' => 0, 'Y' => 0, 'G' => 0, 'B' => 0];
        $map2   = $map1;
        $answer = [0, 0];
        for ($i = 0; $i < 4; ++$i) {
            if ($solution[$i] === $guess[$i]) {
                ++$answer[0];
            } else {
                if ($map1[$guess[$i]]) {
                    --$map1[$guess[$i]];
                    ++$answer[1];
                } else {
                    ++$map2[$guess[$i]];
                }
                if ($map2[$solution[$i]]) {
                    --$map2[$solution[$i]];
                    ++$answer[1];
                } else {
                    ++$map1[$solution[$i]];
                }
            }
        }

        return $answer;
    }
}