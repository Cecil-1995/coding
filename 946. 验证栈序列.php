<?php

class Solution
{

    /**
     * @param Integer[] $pushed
     * @param Integer[] $popped
     * @return Boolean
     */
    function validateStackSequences($pushed, $popped)
    {
        $arr = [$pushed[0]];

        $i = 1;
        foreach ($popped as $item) {
            while ($arr[count($arr) - 1] !== $item && $i < count($pushed)) {
                $arr[] = $pushed[$i++];
            }

            if ($arr[count($arr) - 1] === $item) {
                array_pop($arr);
            } elseif ($i === count($pushed)) {
                return false;
            }
        }

        return true;
    }
}