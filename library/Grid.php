<?php
namespace GameOfLife;

class Grid
{
    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var array
     */
    private $grid;

    /**
     * @param integer $width
     * @param integer $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->grid = array_fill(0, $width, array_fill(0, $height, false));
    }

    /**
     * @param integer $x
     * @param integer $y
     */
    public function setAlive($x, $y)
    {
        $this->grid[$x][$y] = true;
    }

    /**
     * @param integer $x
     * @param integer $y
     * @return boolean
     */
    public function isAlive($x, $y)
    {
        return $this->grid[$x][$y];
    }

    /**
     * @param integer $x
     * @param integer $y
     * @return integer
     */
    public function getAmountOfLivingNeighbours($cellX, $cellY)
    {
        $startColumn = max($cellX - 1, 0);
        $endColumn = min($cellX + 1, $this->width - 1);
        $startRow = max($cellY - 1, 0);
        $endRow = min($cellY + 1, $this->height - 1);

        $amount = 0;
        for($x = $startColumn; $x <= $endColumn; $x++) {
            for($y = $startRow; $y <= $endRow; $y++) {
                if (($x == $cellX) && $y == $cellY) {
                    continue;
                }
                if ($this->isAlive($x, $y)) {
                    $amount ++;
                }
            }
        }
        return $amount;
    }
}
