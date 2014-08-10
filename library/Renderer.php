<?php
namespace GameOfLife;

class Renderer
{
    /**
     * @var string
     */
    private $alive;

    /**
     * @var string
     */
    private $dead;

    /**
     * @param string $alive
     * @param string $dead
     */
    public function __construct($alive = 'X', $dead = '.')
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
                echo $grid->isAlive($x, $y) ? $this->alive : $this->dead;
            }
            echo "\n";
        }
        echo "\e[{$grid->getHeight()}A";
    }
}