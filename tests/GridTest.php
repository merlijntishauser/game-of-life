<?php
namespace GameOfLife;

class GridTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function gridValueIsFalseByDefault()
    {
        $grid = new Grid(1, 1);
        $this->assertFalse($grid->isAlive(0, 0));
    }
}
