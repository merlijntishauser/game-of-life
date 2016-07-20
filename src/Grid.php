<?php
namespace MerlijnTishauser\GameOfLife;

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
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
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
        if ($x < 0) {
            return false;
        }
        if ($y < 0) {
            return false;
        }
        if ($x >= $this->width) {
            return false;
        }
        if ($y >= $this->height) {
            return false;
        }
        return $this->grid[$x][$y];
    }

    /**
     * @param integer $cellX
     * @param integer $cellY
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

    /**
     * @param Grid $grid
     * @return boolean
     */
    public function equals(Grid $grid)
    {
        if (($this->width != $grid->getWidth()) || ($this->height != $grid->getHeight())) {
            return false;
        }

        for ($x = 0; $x < $this->width; $x ++) {
            for ($y = 0; $y < $this->height; $y ++) {
                if ($this->isAlive($x, $y) !== $grid->isAlive($x, $y)) {
                    return false;
                }
            }
        }

        return true;
    }
}
