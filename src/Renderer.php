<?php

namespace GameOfLife;

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
    protected function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return integer
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * @param Grid $grid
     */
    abstract public function render(Grid $grid);
}
