<?php
namespace GameOfLife;

class CellTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function CellsDieWhenHavingLessThanTwoNeighbours()
    {
        $cell = new Cell(true, 1);
        $this->assertFalse($cell->willLive());
    }
}
