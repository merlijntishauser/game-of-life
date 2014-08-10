<?php
namespace GameOfLife;

class Cell
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

    public function willLive()
    {
        return !($this->amountOfLivingNeighbours < 2)
            && !($this->amountOfLivingNeighbours > 3);
    }
}
