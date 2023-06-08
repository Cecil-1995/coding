<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid)
    {
        $time = 0;
        while (true) {
            $flag = false;

            foreach ($grid as $i => $ii) {
                foreach ($ii as $j => $jj) {
                    if (!($time % 2) && $jj === 2) {
                        $tempFlag = $this->change($grid, $i, $j, 4);
                        $flag     = $flag ?: $tempFlag;
                    } elseif ($time % 2 && $jj === 4) {
                        $tempFlag = $this->change($grid, $i, $j, 2);
                        $flag     = $flag ?: $tempFlag;
                    }
                }
            }

            if (!$flag) {
                foreach ($grid as $i => $ii) {
                    foreach ($ii as $j => $jj) {
                        if ($jj === 1) {
                            return -1;
                        }
                    }
                }
                break;
            } else {
                ++$time;
            }
        }

        return $time;
    }

    function change(&$grid, $i, $j, $result)
    {
        $flag = false;
        if (isset($grid[$i - 1][$j]) && $grid[$i - 1][$j] === 1) {
            $grid[$i - 1][$j] = $result;
            $flag             = true;
        }
        if (isset($grid[$i + 1][$j]) && $grid[$i + 1][$j] === 1) {
            $grid[$i + 1][$j] = $result;
            $flag             = true;
        }
        if (isset($grid[$i][$j - 1]) && $grid[$i][$j - 1] === 1) {
            $grid[$i][$j - 1] = $result;
            $flag             = true;
        }
        if (isset($grid[$i][$j + 1]) && $grid[$i][$j + 1] === 1) {
            $grid[$i][$j + 1] = $result;
            $flag             = true;
        }

        return $flag;
    }
}