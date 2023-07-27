<?php

class Solution
{

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        $ans = [];
        $this->backtrack($s, [], 0, $ans);

        return $ans;
    }

    function backtrack($s, $curr, $index, &$ans)
    {
//        if (!empty($curr)) {
//            $item = $curr[count($curr) - 1];
//            if ($item[0] === '0' && strlen($item) !== 1) {
//                return;
//            }
//            if (intval($item) > 255) {
//                return;
//            }
//        }

        if (count($curr) === 4) {
            if ($index === strlen($s) && $this->isIp($curr)) {
                // 判断
                $ans[] = implode('.', $curr);
            }

            return;
        }

        for ($j = 1; $j <= 3; ++$j) {
            // 选择
            $curr[] = substr($s, $index, $j);
            $this->backtrack($s, $curr, $index + $j, $ans);
            // 撤销
            array_pop($curr);
        }
    }

    function isIp($arr)
    {
        foreach ($arr as $item) {
            if ($item[0] === '0' && strlen($item) !== 1) {
                return false;
            }
            if (intval($item) > 255) {
                return false;
            }
        }

        return true;
    }
}

var_dump((new Solution())->restoreIpAddresses('25525511135'));