<?php

class Solution
{

    /**
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findRedundantConnection($edges)
    {
        $grape = [];
        for ($i = 1; $i <= count($edges); ++$i) {
            $grape[$i] = $i;
        }

        $ans = [];
        foreach ($edges as $edge) {
            $from = $this->find($grape, $edge[0]);
            $to   = $this->find($grape, $edge[1]);
            if ($from === $to) {
                $ans[] = $edge;
            } else {
                $grape[$from] = $to;
            }
        }

        return array_pop($ans);
    }

    function find($grape, $i)
    {
        while ($i != $grape[$i]) {
            $i = $grape[$i];
        }

        return $grape[$i];
    }
}