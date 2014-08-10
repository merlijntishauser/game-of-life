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
}
