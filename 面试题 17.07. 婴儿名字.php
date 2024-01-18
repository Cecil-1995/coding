<?php

class Solution
{

    /**
     * @param String[] $names
     * @param String[] $synonyms
     * @return String[]
     */
    function trulyMostPopular($names, $synonyms)
    {
        $map = [];
        foreach ($synonyms as $synonym) {
            $synonym    = explode(',', trim(trim($synonym, '('), ')'));
            $synonym[0] = $this->findParent($map, $synonym[0]);
            $synonym[1] = $this->findParent($map, $synonym[1]);
            if ($synonym[1] === $synonym[0]) {
                continue;
            }
            $flag = $this->compare($synonym[0], $synonym[1]);
            if ($flag === 1) {
                $map[$synonym[0]] = $synonym[1];
            } else {
                $map[$synonym[1]] = $synonym[0];
            }
        }

        $ans = [];
        foreach ($names as $name) {
            $name          = trim($name, ')');
            $name          = explode('(', $name);
            $name[0]       = $this->findParent($map, $name[0]);
            $ans[$name[0]] = isset($ans[$name[0]]) ? $ans[$name[0]] + $name[1] : $name[1];
        }

        $result = [];
        foreach ($ans as $name => $num) {
            $result[] = $name . "({$num})";
        }
        sort($result);

        return $result;
    }

    function findParent(&$map, $name)
    {
        while (isset($map[$name])) {
            $name = $map[$name];
        }

        return $name;
    }

    function compare($a, $b)
    {
        $i    = 0;
        $j    = 0;
        $aLen = strlen($a);
        $bLen = strlen($b);
        while ($i < $aLen && $j < $bLen) {
            if ($a[$i] > $b[$j]) {
                return 1;
            } elseif ($a[$i] < $b[$j]) {
                return -1;
            } else {
                ++$i;
                ++$j;
            }
        }

        if ($i < $aLen) {
            return 1;
        }
        if ($j < $bLen) {
            return -1;
        }

        return 0;
    }
}