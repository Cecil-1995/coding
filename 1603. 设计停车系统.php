<?php

class ParkingSystem
{
    public $map = [];

    /**
     * @param Integer $big
     * @param Integer $medium
     * @param Integer $small
     */
    function __construct($big, $medium, $small)
    {
        $this->map = [1 => $big, 2 => $medium, 3 => $small];
    }

    /**
     * @param Integer $carType
     * @return Boolean
     */
    function addCar($carType)
    {
        if ($this->map[$carType] > 0) {
            --$this->map[$carType];

            return true;
        }

        return false;
    }
}

/**
 * Your ParkingSystem object will be instantiated and called as such:
 * $obj = ParkingSystem($big, $medium, $small);
 * $ret_1 = $obj->addCar($carType);
 */