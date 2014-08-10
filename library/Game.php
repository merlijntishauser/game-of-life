<?php
namespace GameOfLife;

class Game
{
    /**
     * @param Grid $grid
     * @return Grid
     */
    public function createNextGrid(Grid $grid)
    {
        $resultGrid = new Grid($grid->getWidth(), $grid->getHeight());
        for ($x = 0; $x < $grid->getWidth(); $x ++) {
            for ($y = 0; $y < $grid->getHeight(); $y ++) {
                $cell = new Cell($grid->isAlive($x, $y), $grid->getAmountOfLivingNeighbours($x, $y));
                if ($cell->willLive()) {
                    $resultGrid->setAlive($x, $y);
                }
            }
        }

        return $resultGrid;
    }
}
