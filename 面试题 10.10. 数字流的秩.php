<?php


class StreamRank
{
    public $list;
    public $length;

    /**
     */
    function __construct()
    {
        $this->list   = [];
        $this->length = 0;
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function track($x)
    {
        $left  = 0;
        $right = $this->length - 1;
        while ($left <= $right) {
            $middle = floor($left + ($right - $left) / 2);
            if ($this->list[$middle] === $x) {
                $i = $this->length;
                while ($i > $middle) {
                    $this->list[$i] = $this->list[$i - 1];
                    --$i;
                }
                $this->list[$i] = $x;
                ++$this->length;

                return null;
            } elseif ($this->list[$middle] > $x) {
                $right = $middle - 1;
            } elseif ($this->list[$middle] < $x) {
                $left = $middle + 1;
            }
        }

        if ($right == -1) {
            // 所有的数都比x大
            for ($i = $this->length; $i > 0; --$i) {
                $this->list[$i] = $this->list[$i - 1];
            }
            $this->list[$i] = $x;
        } elseif ($left == $this->length) {
            // 所有的数都比x小
            $this->list[$this->length] = $x;
        } else {
            for ($i = $this->length; $i > $left; --$i) {
                $this->list[$i] = $this->list[$i - 1];
            }
            $this->list[$i] = $x;
        }

        ++$this->length;

        return null;
    }

    /**
     * @param Integer $x
     * @return Integer
     */
    function getRankOfNumber($x)
    {
        $left  = 0;
        $right = $this->length - 1;

        while ($left <= $right) {
            $middle = floor($left + ($right - $left) / 2);

            if ($this->list[$middle] > $x) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        }

        return $right + 1;

    }
}

/**
 * Your StreamRank object will be instantiated and called as such:
 * $obj = StreamRank();
 * $obj->track($x);
 * $ret_2 = $obj->getRankOfNumber($x);
 */