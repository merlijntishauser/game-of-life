<?php
namespace GameOfLife;

class Rule
{
    /**
     * @var boolean
     */
    private $isAlive;

    /**
     * @var integer
     */
    private $amountOfLivingNeighbours;

    /**
     * @param boolean $isAlive
     * @param integer $amountOfLivingNeighbours
     */
    public function __construct($isAlive, $amountOfLivingNeighbours)
    {
        $this->isAlive = $isAlive;
        $this->amountOfLivingNeighbours = $amountOfLivingNeighbours;
    }

    /**
     * @return boolean
     */
    public function willLive()
    {
        if ($this->amountOfLivingNeighbours == 3) {
            return true;
        }

        if ($this->isAlive && $this->amountOfLivingNeighbours == 2) {
            return true;
        }

        return false;
    }
}
