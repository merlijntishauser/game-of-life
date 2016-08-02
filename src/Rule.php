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
    
    
    public function __construct($isAlive, $amountOfLivingNeighbours)
    {
        $this->setIsAlive($isAlive);
        $this->setAmountOfLivingNeighbours($amountOfLivingNeighbours);
    }

    /**
     * @return boolean
     */
    public function isAlive()
    {
        return $this->isAlive;
    }

    /**
     * @param boolean $isAlive
     */
    public function setIsAlive($isAlive)
    {
        $this->isAlive = $isAlive;
    }

    /**
     * @return int
     */
    public function getAmountOfLivingNeighbours()
    {
        return $this->amountOfLivingNeighbours;
    }

    /**
     * @param int $amountOfLivingNeighbours
     */
    public function setAmountOfLivingNeighbours($amountOfLivingNeighbours)
    {
        $this->amountOfLivingNeighbours = $amountOfLivingNeighbours;
    }
    
    /**
     * @return boolean
     */
    public function cellStaysAlive()
    {
        if ($this->getAmountOfLivingNeighbours() == 3) {
            return true;
        }

        if ($this->isAlive() && $this->getAmountOfLivingNeighbours() == 2) {
            return true;
        }

        return false;
    }
}
