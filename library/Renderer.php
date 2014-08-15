<?php

namespace GameOfLife;


interface Renderer
{
    /**
     * @param Grid $grid
     */
    public function render(Grid $grid);
}
