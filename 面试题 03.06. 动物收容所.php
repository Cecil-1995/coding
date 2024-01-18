<?php

class AnimalShelf
{
    public $cat;
    public $dog;

    /**
     */
    function __construct()
    {
        $this->cat = [];
        $this->dog = [];
    }

    /**
     * @param Integer[] $animal
     * @return NULL
     */
    function enqueue($animal)
    {
        if ($animal[1] === 0) {
            $this->cat[] = $animal[0];
        } else {
            $this->dog[] = $animal[0];
        }

        return null;
    }

    /**
     * @return Integer[]
     */
    function dequeueAny()
    {
        if (!empty($this->dog)) {
            $dog = $this->dog[0];
        }
        if (!empty($this->cat)) {
            $cat = $this->cat[0];
        }

        if (isset($dog) && isset($cat)) {
            if ($dog < $cat) {
                return $this->dequeueDog();
            } else {
                return $this->dequeueCat();
            }
        } elseif (isset($dog)) {
            return $this->dequeueDog();
        } elseif (isset($cat)) {
            return $this->dequeueCat();
        } else {
            return [-1, -1];
        }
    }

    /**
     * @return Integer[]
     */
    function dequeueDog()
    {
        if (empty($this->dog)) {
            return [-1, -1];
        } else {
            return [array_shift($this->dog), 1];
        }
    }

    /**
     * @return Integer[]
     */
    function dequeueCat()
    {
        if (empty($this->cat)) {
            return [-1, -1];
        } else {
            return [array_shift($this->cat), 0];
        }
    }
}

/**
 * Your AnimalShelf object will be instantiated and called as such:
 * $obj = AnimalShelf();
 * $obj->enqueue($animal);
 * $ret_2 = $obj->dequeueAny();
 * $ret_3 = $obj->dequeueDog();
 * $ret_4 = $obj->dequeueCat();
 */