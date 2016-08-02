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
     * @dataProvider setOfGridsForRandomPoints
     * @param $x
     * @param $y
     */
    public function gridGetRandomPointReturnsValidArray($x, $y)
    {
        $grid = new Grid($x,$y);

        $point = $grid->getRandomPoint();
        $this->assertTrue($point['x'] > 0 && $point['x'] <= $x);
        $this->assertTrue($point['y'] > 0 && $point['y'] <= $y);

    }

    /**
     * @test
     */
    public function gridRandomBlobHasBeenMadeAlive()
    {
        $grid = new Grid(4,4);
        $referenceGrid = clone $grid;
        $grid->setRandomBlobAlive(1);
        
        $this->assertNotSame($referenceGrid, $grid);

    }

    /**
     * @test
     */
    public function gridRandomBlobDoesNotAcceptInsaneInput()
    {
        $grid = new Grid(4,8);
        $referenceGrid = clone $grid;
        $this->expectException(\Exception::class);
        $grid->setRandomBlobAlive(100);

        $this->assertNotSame($referenceGrid, $grid);

    }

    /**
     * @test
     */
    public function gridRandomBlobDoesNotAcceptNegativeInput()
    {
        $grid = new Grid(4,8);
        $referenceGrid = clone $grid;
        $this->expectException(\Exception::class);
        $grid->setRandomBlobAlive(-100);

        $this->assertNotSame($referenceGrid, $grid);

    }

    /**
     * @test
     * @dataProvider nonIntegerValues
     * @param $value
     */
    public function gridRandomBlobOnlyAcceptIntegers($value)
    {
        $grid = new Grid(1,1);
        $referenceGrid = clone $grid;
        $this->expectException(\Exception::class);
        $grid->setRandomBlobAlive($value);

        $this->assertNotSame($referenceGrid, $grid);

    }

    /**
     * @return array
     */
    public function nonIntegerValues() : array
    {
        return array(
            array("3.456"),
            array(3.4),
            array("string"),
            array(new \stdClass()),
        );
    }

    /**
     * @return array
     */
    public function setOfGridsForRandomPoints() : array
    {
        return array(
            array(1,1),
            array(10,10),
            array(100,100),
            array(1000,1000)
        );
    }
}

