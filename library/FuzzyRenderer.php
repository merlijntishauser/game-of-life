<?php
namespace GameOfLife;

class FuzzyRenderer implements Renderer
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
     * @var integer
     */
    private $height;

    /**
     * @param string $alive
     * @param array $dead
     */
    public function __construct($alive = 'X', array $dead = array('-', '+'))
    {
        $this->alive = $alive;
        $this->dead = $dead;
        $this->height = 0;
    }

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        $this->height = $grid->getHeight();
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

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }
}