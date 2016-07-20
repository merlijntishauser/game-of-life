<?php
namespace GameOfLife;

class RuleTest extends \PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function cellsDieWhenHavingLessThanTwoNeighbours()
    {
        $rule = new Rule(true, 1);
        $this->assertFalse($rule->cellStaysAlive());
    }

    /**
     * @test
     */
    public function cellsDieWhenHavingMoreThanThreeNeighbours()
    {
        $rule = new Rule(true, 4);
        $this->assertFalse($rule->cellStaysAlive());
    }

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingTwoNeighbours()
    {
        $rule = new Rule(true, 2);
        $this->assertTrue($rule->cellStaysAlive());
    }

    /**
     * @test
     */
    public function cellsStayDeadWhenHavingTwoNeighbours()
    {
        $rule = new Rule(false, 2);
        $this->assertFalse($rule->cellStaysAlive());
    }

    /**
     * @test
     */
    public function cellsStayAliveWhenHavingThreeNeighbours()
    {
        $rule = new Rule(true, 3);
        $this->assertTrue($rule->cellStaysAlive());
    }

    /**
     * @test
     */
    public function cellsBecomeAliveWhenHavingThreeNeighbours()
    {
        $rule = new Rule(false, 3);
        $this->assertTrue($rule->cellStaysAlive());
    }
}
