<?php
namespace GameOfLife;

class RuleTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function cellsDieWhenHavingLessThanTwoNeighbours()
    {
        $cell = new Rule(true, 1);
        $this->assertFalse($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsDieWhenHavingMoreThanThreeNeighbours()
    {
        $cell = new Rule(true, 4);
        $this->assertFalse($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingTwoNeighbours()
    {
        $cell = new Rule(true, 2);
        $this->assertTrue($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsStayDeadWhenHavingTwoNeighbours()
    {
        $cell = new Rule(false, 2);
        $this->assertFalse($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingThreeNeighbours()
    {
        $cell = new Rule(true, 3);
        $this->assertTrue($cell->willLive());
    }

    /**
     * @test
     */
    public function cellsBecomeAliveWhenHavingThreeNeighbours()
    {
        $cell = new Rule(false, 3);
        $this->assertTrue($cell->willLive());
    }
}
