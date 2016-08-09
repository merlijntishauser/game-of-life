<?php
declare(strict_types=1);
namespace GameOfLife;

class SubRenderer extends Renderer
{
    private $blocks = [' ', '▗', '▖', '▄', '▝', '▐', '▞', '▟', '▘', '▚', '▌', '▙', '▀', '▜', '▛', '█'];

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        $this->setHeight((int) ceil($grid->getHeight() / 2));
        for ($y = 0; $y < (int) ceil($this->getHeight()); $y ++) {
            for ($x = 0; $x < (int) ceil($grid->getWidth() / 2); $x ++) {
                $binaryValue = (int) $grid->isAlive($x * 2, $y * 2)
                    . (int) $grid->isAlive($x * 2 + 1, $y * 2)
                    . (int) $grid->isAlive($x * 2, $y * 2 + 1)
                    . (int) $grid->isAlive($x * 2 + 1, $y * 2 + 1);

                echo $this->blocks[bindec($binaryValue)];
            }
            echo "\n";
        }
    }
}
