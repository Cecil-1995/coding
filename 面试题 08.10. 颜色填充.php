<?php

class Solution
{

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $newColor
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $newColor)
    {
        $row = count($image);
        $col = count($image[0]);

        $this->backstack($image, $sr, $sc, $newColor, $row, $col);

        return $image;
    }

    function backstack(&$image, $sr, $sc, $newColor, $row, $col)
    {
        if ($image[$sr][$sc] === $newColor) {
            return ;
        }
        $oldColor        = $image[$sr][$sc];
        $image[$sr][$sc] = $newColor;

        if ($sr !== 0 && $image[$sr - 1][$sc] === $oldColor) {
            $this->backstack($image, $sr - 1, $sc, $newColor, $row, $col);
        }
        if ($sc !== 0 && $image[$sr][$sc - 1] === $oldColor) {
            $this->backstack($image, $sr, $sc - 1, $newColor, $row, $col);
        }
        if ($sr !== $row - 1 && $image[$sr + 1][$sc] === $oldColor) {
            $this->backstack($image, $sr + 1, $sc, $newColor, $row, $col);
        }
        if ($sc !== $col - 1 && $image[$sr][$sc + 1] === $oldColor) {
            $this->backstack($image, $sr, $sc + 1, $newColor, $row, $col);
        }
    }
}