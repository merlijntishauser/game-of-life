<?php

namespace MerlijnTishauser\GameOfLife;

abstract class Renderer
{
    /**
     * @var integer
     */
    private $height;

    public function __construct()
    {
        $this->height = 0;
    }

    /**
     * @param integer $height
     */
    protected function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param Grid $grid
     */
    abstract public function render(Grid $grid);
}
