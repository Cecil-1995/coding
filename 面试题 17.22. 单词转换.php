<?php

class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return String[]
     */
    function findLadders($beginWord, $endWord, $wordList)
    {
        if (!in_array($endWord, $wordList)) {
            return [];
        }

        $visited = [$beginWord => true];
        return $this->helper($beginWord, $endWord, $wordList, [$beginWord], $visited);
    }

    function helper($beginWord, $endWord, &$wordList, $cur, &$visited)
    {
        if ($beginWord === $endWord) {
            return $cur;
        }

        foreach ($wordList as $word) {
            if (!isset($visited[$word]) && $this->canChange($word, $beginWord)) {
                $visited[$word] = true;
                $cur[]          = $word;
                $ans            = $this->helper($word, $endWord, $wordList, $cur, $visited);
                if ($ans) {
                    return $ans;
                }
                array_pop($cur);
            }
        }

        return [];
    }

    function canChange($a, $b)
    {
        $diff = 0;
        for ($i = 0, $len = strlen($a); $i < $len; ++$i) {
            if ($a[$i] !== $b[$i]) {
                ++$diff;
                if ($diff > 1) {
                    return false;
                }
            }
        }

        return true;
    }

}

var_dump((new Solution())->findLadders('qa', 'sq', ["si","go","se","cm","so","ph","mt","db","mb","sb","kr","ln","tm","le","av","sm","ar","ci","ca","br","ti","ba","to","ra","fa","yo","ow","sn","ya","cr","po","fe","ho","ma","re","or","rn","au","ur","rh","sr","tc","lt","lo","as","fr","nb","yb","if","pb","ge","th","pm","rb","sh","co","ga","li","ha","hz","no","bi","di","hi","qa","pi","os","uh","wm","an","me","mo","na","la","st","er","sc","ne","mn","mi","am","ex","pt","io","be","fm","ta","tb","ni","mr","pa","he","lr","sq","ye"]));