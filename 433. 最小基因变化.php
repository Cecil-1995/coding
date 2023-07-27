<?php

class Solution
{
    public $ans = -1;
    public $map = [];

    /**
     * @param String $startGene
     * @param String $endGene
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($startGene, $endGene, $bank)
    {
        $this->backtrack($startGene, $endGene, $bank, 0);

        return $this->ans;
    }

    function backtrack($startGene, $endGene, $bank, $ans)
    {
        if (isset($this->map[$startGene])) {
            return;
        }
        $this->map[$startGene] = true;
        if ($startGene === $endGene) {
            $this->ans = $ans;

            return;
        }

        for ($i = 0; $i < 8; ++$i) {
            $chars = ['A' => 1, 'C' => 1, 'G' => 1, 'T' => 1];
            unset($chars[$startGene[$i]]);
            $chars = array_keys($chars);

            $old = $startGene[$i];
            foreach ($chars as $char) {
                $startGene[$i] = $char;
                ++$ans;
                if (in_array($startGene, $bank)) {
                    $this->backtrack($startGene, $endGene, $bank, $ans);
                }
                $startGene[$i] = $old;
                --$ans;
            }
        }
    }
}