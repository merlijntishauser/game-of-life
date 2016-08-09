<?php
declare(strict_types=1);
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
     * Rule constructor.
     *
     * @param $isAlive
     * @param $livingNeighbours
     */
    public function __construct(bool $isAlive, int $livingNeighbours)
    {
        $this->setIsAlive($isAlive);
        $this->setAmountOfLivingNeighbours($livingNeighbours);
    }

    /**
     * @return boolean
     */
    public function isAlive() : bool
    {
        return $this->isAlive;
    }

    /**
     * @param boolean $isAlive
     */
    public function setIsAlive(bool $isAlive)
    {
        $this->isAlive = $isAlive;
    }

    /**
     * @return int
     */
    public function getAmountOfLivingNeighbours() : int
    {
        return $this->amountOfLivingNeighbours;
    }

    /**
     * @param int $livingNeighbours
     */
    public function setAmountOfLivingNeighbours(int $livingNeighbours)
    {
        $this->amountOfLivingNeighbours = $livingNeighbours;
    }
    
    /**
     * @return boolean
     */
    public function cellStaysAlive() : bool
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
