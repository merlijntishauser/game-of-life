<?php
declare(strict_types=1);
namespace GameOfLife;

class FuzzyRenderer extends Renderer
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
    public function __construct(string $alive = 'A', array $dead = ['.', '+', 'x'])
    {
        parent::__construct();
        $this->alive = $alive;
        $this->dead = $dead;
    }

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        $this->setHeight($grid->getHeight());

        for ($y = 0; $y < $grid->getHeight(); $y ++) {
            for ($x = 0; $x < $grid->getWidth(); $x ++) {
                $amount = $grid->getAmountOfLivingNeighbours($x, $y);

                $deadValue = end($this->dead);
                if (array_key_exists($amount, $this->dead)) {
                    $deadValue = "\e[38;5;67m" . $this->dead[$amount];
                }

                if ($grid->isAlive($x, $y)) {
                    echo "\e[38;5;117m";
                    echo $this->alive;
                } else {
                    echo $deadValue;
                }
            }
            echo "\e[0m\n";
        }
    }
}
