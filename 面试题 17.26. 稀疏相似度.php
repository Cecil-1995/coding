<?php

class Solution
{

    /**
     * @param Integer[][] $docs
     * @return String[]
     */
    function computeSimilarities($docs)
    {
        $ans = [];
        $map = [];
        foreach ($docs as $i => $doc) {
            foreach ($doc as $item) {
                $map[$item][] = $i;
            }
        }

        for ($i = 0, $count = count($docs); $i < $count; ++$i) {
            $rel = [];
            foreach ($docs[$i] as $item) {
                foreach ($map[$item] as $value) {
                    $rel[$value] = isset($rel[$value]) ? $rel[$value] + 1 : 1;
                }
            }

            foreach ($rel as $num => $cnt) {
                if ($num <= $i) {
                    continue;
                }

                $countDoc1 = count($docs[$i]);
                $countDoc2 = count($docs[$num]);
                $ans[]     = $i . ',' . $num . ': ' . number_format($cnt / ($countDoc1 + $countDoc2 - $cnt), 4);
            }
        }

        return $ans;
    }

    function helper($doc1, $doc2)
    {
        sort($doc1);
        sort($doc2);

        $a = 0;
        $b = 0;
        for ($i = 0, $j = 0, $iLen = count($doc1), $jLen = count($doc2); $i < $iLen && $j < $jLen;) {
            if ($doc1[$i] === $doc2[$j]) {
                ++$a;
                ++$b;
                ++$i;
                ++$j;
            } elseif ($doc1[$i] > $doc2[$j]) {
                ++$b;
                ++$j;
            } else {
                ++$b;
                ++$i;
            }
        }
        if ($i < $iLen) {
            $b += $iLen - $i;
        }
        if ($j < $jLen) {
            $b += $jLen - $j;
        }

        return number_format($a / $b, 4);
    }

}