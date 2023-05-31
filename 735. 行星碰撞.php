<?php

class Solution
{

    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    function asteroidCollision($asteroids)
    {
        $stack = [];
        $ans   = [];
        foreach ($asteroids as $asteroid) {
            if ($asteroid > 0) {
                $stack[] = $asteroid;
            } else {
                $flag = true;
                while (!empty($stack)) {
                    $item = array_pop($stack);
                    if ($item > $asteroid * -1) {
                        $stack[] = $item;
                        $flag    = false;
                        break;
                    } elseif ($item === $asteroid * -1) {
                        $flag = false;
                        break;
                    }
                }

                if ($flag) {
                    $ans[] = $asteroid;
                }
            }
        }

        return array_merge($ans, $stack);
    }
}