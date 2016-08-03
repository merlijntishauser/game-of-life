<?php
declare(strict_types=1);
namespace GameOfLife;

class SubRenderer extends Renderer
{
    private $blocks = array(' ', '▗', '▖', '▄', '▝', '▐', '▞', '▟', '▘', '▚', '▌', '▙', '▀', '▜', '▛', '█');

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        $this->setHeight(ceil($grid->getHeight() / 2));
        for ($y = 0; $y < ceil($this->getHeight()); $y ++) {
            for ($x = 0; $x < ceil($grid->getWidth() / 2); $x ++) {
                $binaryValue = (int)$grid->isAlive($x * 2, $y * 2)
                    . (int)$grid->isAlive($x * 2 + 1, $y * 2)
                    . (int)$grid->isAlive($x * 2, $y * 2 + 1)
                    . (int)$grid->isAlive($x * 2 + 1, $y * 2 + 1);

                echo $this->blocks[bindec($binaryValue)];
            }
            echo "\n";
        }
    }
}
