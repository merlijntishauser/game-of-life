<?php
namespace GameOfLife;

class Renderer
{
    /**
     * @var string
     */
    private $alive;

    /**
     * @var array
     */
    private $dead;

    /**
     * @param string $alive
     * @param array $dead
     */
    public function __construct($alive = 'X', array $dead = array('.'))
    {
        $this->alive = $alive;
        $this->dead = $dead;
    }

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        for ($y = 0; $y < $grid->getHeight(); $y ++) {
            for ($x = 0; $x < $grid->getWidth(); $x ++) {
                $amount = $grid->getAmountOfLivingNeighbours($x, $y);
                $deadValue = array_key_exists($amount, $this->dead)
                    ? $this->dead[$amount]
                    : end($this->dead);
                echo $grid->isAlive($x, $y) ? $this->alive : $deadValue;
            }
            echo "\n";
        }
    }
}