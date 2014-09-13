<?php
namespace GameOfLife;

class Rule
{
    /**
     * @return boolean
     */
    public function cellStaysAlive($isAlive, $amountOfLivingNeighbours)
    {
        if ($amountOfLivingNeighbours == 3) {
            return true;
        }

        if ($isAlive && $amountOfLivingNeighbours == 2) {
            return true;
        }

        return false;
    }
}
