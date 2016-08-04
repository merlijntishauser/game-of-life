<?php
declare(strict_types=1);
namespace GameOfLife;

class Game
{
    /**
     * @param integer $width
     * @param integer $height
     * @return Grid
     */
    public function createRandomGrid(int $width, int $height) : Grid
    {
        $grid = new Grid($width, $height);

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                if (mt_rand(0, 1) > 0) {
                    $grid->setAlive($x, $y);
                }
            }
        }

        return $grid;
    }

    /**
     * @param Grid $grid
     * @return Grid
     */
    public function createNextGrid(Grid $grid) : Grid
    {
        $resultGrid = new Grid($grid->getWidth(), $grid->getHeight());
        for ($x = 0; $x < $grid->getWidth(); $x++) {
            for ($y = 0; $y < $grid->getHeight(); $y++) {
                $rule = new Rule($grid->isAlive($x, $y), $grid->getAmountOfLivingNeighbours($x, $y));
                if ($rule->cellStaysAlive()) {
                    $resultGrid->setAlive($x, $y);
                }
            }
        }

        return $resultGrid;
    }
}
