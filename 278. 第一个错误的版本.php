<?php
/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n)
    {
        $left  = 1;
        $right = $n;

        while ($left <= $right) {
            $mid = floor(($right - $left) / 2 + $left);
            if ($this->isBadVersion($mid)) {
                // 坏版本
                $right = $mid - 1;
            } else {
                // 好版本
                $left = $mid + 1;
            }
        }

        return $left;
    }
}