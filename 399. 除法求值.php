<?php

class Solution
{

    /**
     * @param String[][] $equations
     * @param Float[] $values
     * @param String[][] $queries
     * @return Float[]
     */
    function calcEquation($equations, $values, $queries)
    {
        $unionFind = new UnionFind(2 * count($equations));
        $map       = [];
        $index     = 0;
        foreach ($equations as $i => $equation) {
            if (!isset($map[$equation[0]])) {
                $map[$equation[0]] = $index++;
            }
            if (!isset($map[$equation[1]])) {
                $map[$equation[1]] = $index++;
            }

            $unionFind->union($map[$equation[0]], $map[$equation[1]], $values[$i]);
        }

        $ans = [];
        foreach ($queries as $query) {
            if (!isset($map[$query[0]])) {
                $ans[] = -1.0;
                continue;
            }
            if (!isset($map[$query[1]])) {
                $ans[] = -1.0;
                continue;
            }

            $ans[] = $unionFind->isConnected($map[$query[0]], $map[$query[1]]);
        }

        return $ans;
    }
}

class UnionFind
{
    public $parent = [];
    public $weight = [];

    public function __construct($count)
    {
        for ($i = 0; $i < $count; ++$i) {
            $this->parent[$i] = $i;
            $this->weight[$i] = 1;
        }
    }

    public function union($x, $y, $value)
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX === $rootY) {
            return;
        }

        $this->parent[$rootX] = $rootY;
        $this->weight[$rootX] = $this->weight[$y] * $value / $this->weight[$x];
    }

    public function find($x)
    {
        if ($x !== $this->parent[$x]) {
            $parent = $this->parent[$x];
            $this->parent[$x] = $this->find($parent);
            $this->weight[$x] *= $this->weight[$parent];
        }

        return $this->parent[$x];
    }

    public function isConnected($x, $y)
    {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX === $rootY) {
            return $this->weight[$x] / $this->weight[$y];
        } else {
            return -1.0;
        }
    }
}

var_dump(
    (new Solution())->calcEquation(
        [["a", "b"], ["b", "c"]], [2.0, 3.0], [["a", "c"], ["b", "a"], ["a", "e"], ["a", "a"], ["x", "x"]]
    )
);