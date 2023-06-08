<?php

class Solution
{

    /**
     * @param String[][] $maze
     * @param Integer[] $entrance
     * @return Integer
     */
    function nearestExit($maze, $entrance)
    {
        $m = count($maze);
        $n = count($maze[0]);

        $list    = [$entrance];
        $step    = 0;
        $visited = [];

        while (!empty($list)) {
            ++$step;

            $current = $list;
            $list    = [];
            foreach ($current as $item) {
                $i = $item[0];
                $j = $item[1];
                if (($i === 0 || $i === $m - 1 || $j === 0 || $j === $n - 1) && ($i !== $entrance[0] || $j !== $entrance[1])) {
                    return $step - 1;
                }

                if (isset($maze[$i - 1][$j]) && $maze[$i - 1][$j] === '.' && !isset($visited[$i - 1][$j])) {
                    $list[]              = [$i - 1, $j];
                    $visited[$i - 1][$j] = true;
                }
                if (isset($maze[$i + 1][$j]) && $maze[$i + 1][$j] === '.' && !isset($visited[$i + 1][$j])) {
                    $list[]              = [$i + 1, $j];
                    $visited[$i + 1][$j] = true;
                }
                if (isset($maze[$i][$j - 1]) && $maze[$i][$j - 1] === '.' && !isset($visited[$i][$j - 1])) {
                    $list[]              = [$i, $j - 1];
                    $visited[$i][$j - 1] = true;
                }
                if (isset($maze[$i][$j + 1]) && $maze[$i][$j + 1] === '.' && !isset($visited[$i][$j + 1])) {
                    $list[]              = [$i, $j + 1];
                    $visited[$i][$j + 1] = true;
                }
            }
        }

        return -1;
    }

}