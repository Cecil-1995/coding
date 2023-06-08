<?php
/**
 * The API guess is defined in the parent class.
 * @param num   your guess
 * @return         -1 if num is higher than the picked number
 *                  1 if num is lower than the picked number
 *               otherwise return 0
 * public function guess($num){}
 */

class Solution extends GuessGame
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function guessNumber($n)
    {
        $left  = 1;
        $right = $n;

        while ($left <= $right) {
            $middle = floor($left + ($right - $left) / 2);
            if ($this->guess($middle) === 0) {
                return $middle;
            } elseif ($this->guess($middle) === -1) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        }

        return -1;
    }
}