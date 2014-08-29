<?php

namespace GameOfLife;


class SubRenderer implements Renderer
{
    private $blocks = array(' ', '▗', '▖', '▄', '▝', '▐', '▞', '▟', '▘', '▚', '▌', '▙', '▀', '▜', '▛', '█');

    /**
     * @var integer
     */
    private $height;

    /**
     * @param Grid $grid
     */
    public function render(Grid $grid)
    {
        $this->height = ceil($grid->getHeight() / 2);
        for ($y = 0; $y < ceil($this->height); $y ++) {
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

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }
}