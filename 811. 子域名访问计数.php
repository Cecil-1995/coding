<?php

class Solution
{

    /**
     * @param String[] $cpdomains
     * @return String[]
     */
    function subdomainVisits($cpdomains)
    {
        $map = [];
        foreach ($cpdomains as $cpdomain) {
            $cpdomain          = explode(' ', $cpdomain);
            $map[$cpdomain[1]] = isset($map[$cpdomain[1]]) ? $map[$cpdomain[1]] + $cpdomain[0] : $cpdomain[0];

            $cpdomain[1] = explode('.', $cpdomain[1]);
            if (count($cpdomain[1]) === 3) {
                $map[$cpdomain[1][1] . '.' . $cpdomain[1][2]] = isset($map[$cpdomain[1][1] . '.' . $cpdomain[1][2]]) ? $map[$cpdomain[1][1] . '.' . $cpdomain[1][2]] + $cpdomain[0] : $cpdomain[0];
                $map[$cpdomain[1][2]]                         = isset($map[$cpdomain[1][2]]) ? $map[$cpdomain[1][2]] + $cpdomain[0] : $cpdomain[0];
            } else {
                $map[$cpdomain[1][1]] = isset($map[$cpdomain[1][1]]) ? $map[$cpdomain[1][1]] + $cpdomain[0] : $cpdomain[0];
            }
        }

        $ans = [];
        foreach ($map as $k => $v) {
            $ans[] = "{$v} {$k}";
        }

        return $ans;
    }
}