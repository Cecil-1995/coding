<?php

class Solution
{
    public $visited  = [];
    public $path     = [];
    public $hasCycle = false;

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites)
    {
        $graph = [];
        for ($i = 0; $i < $numCourses; ++$i) {
            $graph[$i] = [];
        }
        foreach ($prerequisites as $prerequisite) {
            $graph[$prerequisite[0]][] = $prerequisite[1];
        }

        for ($i = 0; $i < count($graph); ++$i) {
            $this->traverse($graph, $i);
        }

        return !$this->hasCycle;
    }

    function traverse($graph, $i)
    {
        if (isset($this->path[$i]) && $this->path[$i]) {
            $this->hasCycle = true;

            return;
        }
        if (isset($this->visited[$i]) || $this->hasCycle) {
            return;
        }

        $this->path[$i]    = true;
        $this->visited[$i] = true;
        foreach ($graph[$i] as $item) {
            $this->traverse($graph, $item);
        }
        $this->path[$i] = false;


    }
}