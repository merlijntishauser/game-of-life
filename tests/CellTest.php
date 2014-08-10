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

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingTwoNeighbours()
    {
        $cell = new Cell(true, 2);
        $this->assertTrue($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsStayDeadWhenHavingTwoNeighbours()
    {
        $cell = new Cell(false, 2);
        $this->assertFalse($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingThreeNeighbours()
    {
        $cell = new Cell(true, 3);
        $this->assertTrue($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsBecomeAliveWhenHavingThreeNeighbours()
    {
        $cell = new Cell(false, 3);
        $this->assertTrue($cell->willLive());
    }
}
