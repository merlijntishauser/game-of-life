<?php
namespace GameOfLife;

class CellTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function cellsDieWhenHavingLessThanTwoNeighbours()
    {
        $cell = new Cell(true, 1);
        $this->assertFalse($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsDieWhenHavingMoreThanThreeNeighbours()
    {
        $cell = new Cell(true, 4);
        $this->assertFalse($cell->willLive());
    }
}
