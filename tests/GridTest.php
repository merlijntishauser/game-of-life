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

    /**
     * @test
     */
    public function gridCellsCanBeSetAlive()
    {
        $grid = new Grid(1, 1);
        $grid->setAlive(0, 0);
        $this->assertTrue($grid->isAlive(0, 0));
    }

    /**
     * @return array
     */
    public function cellsOutsideOfGrid()
    {
        return array(
            array(-1, -1),
            array( 0, -1),
            array( 1, -1),
            array(-1,  0),
            array( 1,  0),
            array(-1,  1),
            array( 0,  1),
            array( 1,  1)
        );
    }

    /**
     * @test
     * @dataProvider cellsOutsideOfGrid
     */
    public function cellsOutsideOfGridAreNeverAlive($x, $y)
    {
        $grid = new Grid(1, 1);
        $grid->setAlive($x, $y);
        $this->assertFalse($grid->isAlive($x, $y));
    }

    /**
     * @test
     */
    public function gridCanCalculateTheAmountOfLivingNeighboursOfCells()
    {
        $grid = new Grid(3, 3);
        $grid->setAlive(0, 0);
        $grid->setAlive(0, 1);
        $grid->setAlive(0, 2);
        $this->assertEquals(3, $grid->getAmountOfLivingNeighbours(1, 1));
    }

    /**
     * @test
     */
    public function gridsCanCompareAnotherGrid()
    {
        $grid = new Grid(3, 3);
        $grid->setAlive(0, 1);

        $otherGrid = new Grid(3, 3);
        $otherGrid->setAlive(0, 1);

        $this->assertTrue($grid->equals($otherGrid));
    }

    /**
     * @test
     */
    public function cellsOutsideOfGridAreAlwaysDead()
    {
        $grid = new Grid(1,1);

	$grid->setAlive(0, -1);
        $this->assertFalse($grid->isAlive(0, -1), 'Cells above the grid should not be alive');

	$grid->setAlive(0, 1);
	$this->assertFalse($grid->isAlive(0, 1), 'Cells below the grid should not be alive');

	$grid->setAlive(-1, 0);
	$this->assertFalse($grid->isAlive(-1, 0), 'Cells on the left of the grid should not be alive');

	$grid->setAlive(1, 0);
        $this->assertFalse($grid->isAlive(1, 0), 'Cells on the right of the grid should not be alive');
    }
}
