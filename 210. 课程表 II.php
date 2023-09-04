<?php

class Solution
{
    public $hasCycle = false;
    public $visited  = [];
    public $path     = [];
    public $order    = [];

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites)
    {
        $graph = $this->buildGraph($prerequisites);

        for ($i = 0; $i < $numCourses; ++$i) {
            $this->traver($graph, $i);
        }

        if ($this->hasCycle) {
            return [];
        }

        return $this->order;
    }

    function buildGraph($prerequisites)
    {
        $graph = [];

        foreach ($prerequisites as $prerequisite) {
            $graph[$prerequisite[0]][] = $prerequisite[1];
        }

        return $graph;
    }

    function traver($graph, $from)
    {
        if (isset($this->path[$from]) && $this->path[$from]) {
            $this->hasCycle = true;
        }
        if ($this->hasCycle || isset($this->visited[$from])) {
            return;
        }

        $this->visited[$from] = true;
        $this->path[$from]    = true;
        if (isset($graph[$from])) {
            foreach ($graph[$from] as $t) {
                $this->traver($graph, $t);
            }
        }
        $this->order[]     = $from;
        $this->path[$from] = false;
    }
}