<?php
declare(strict_types=1);
namespace GameOfLife;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * We assume random is really random and the chance of generating a
     * identical grid is < 0.00000001
     *
     * @test
     */
    public function randomGridIsCreated()
    {
        $referenceGrid = new Grid(300, 300);

        $game = new Game();
        $randomGrid = $game->createRandomGrid(300, 300);
        $this->assertFalse($referenceGrid->equals($randomGrid));
    }


    /**
     * @test
     */
    public function gridValueIsFalseByDefaultWithNoneSetAlive()
    {
        $originalGrid = new Grid(3, 3);
        $expectedGrid = new Grid(3, 3);

        $game = new Game();
        $resultGrid = $game->createNextGrid($originalGrid);
        $this->assertTrue($expectedGrid->equals($resultGrid));
    }

    /**
     * @test
     */
    public function gridValueIsFalseByDefaultWithCellsSetAlive()
    {
        $originalGrid = new Grid(3, 3);
        $originalGrid->setAlive(0, 1);
        $originalGrid->setAlive(1, 1);
        $originalGrid->setAlive(2, 1);

        $expectedGrid = new Grid(3, 3);
        $expectedGrid->setAlive(1, 0);
        $expectedGrid->setAlive(1, 1);
        $expectedGrid->setAlive(1, 2);

        $game = new Game();
        $resultGrid = $game->createNextGrid($originalGrid);
        $this->assertTrue($expectedGrid->equals($resultGrid));
    }

    /**
     * @test
     */
    public function equalsReturnsFalseWhenWidthIsChanged()
    {
        $originalGrid = new Grid(3, 3);
        $originalGrid->setAlive(0, 1);
        $originalGrid->setAlive(1, 1);
        $originalGrid->setAlive(2, 1);

        $expectedGrid = new Grid(4, 3);
        $expectedGrid->setAlive(1, 0);
        $expectedGrid->setAlive(1, 1);
        $expectedGrid->setAlive(1, 2);

        $game = new Game();
        $resultGrid = $game->createNextGrid($originalGrid);
        $this->assertFalse($expectedGrid->equals($resultGrid));
    }

    /**
     * @test
     */
    public function equalsReturnsFalseWhenHeigthIsChanged()
    {
        $originalGrid = new Grid(3, 3);
        $originalGrid->setAlive(0, 1);
        $originalGrid->setAlive(1, 1);
        $originalGrid->setAlive(2, 1);

        $expectedGrid = new Grid(3, 4);
        $expectedGrid->setAlive(1, 0);
        $expectedGrid->setAlive(1, 1);
        $expectedGrid->setAlive(1, 2);

        $game = new Game();
        $resultGrid = $game->createNextGrid($originalGrid);
        $this->assertFalse($expectedGrid->equals($resultGrid));
    }

    /**
     * @test
     */
    public function equalsReturnsFalseWhenCellisChanged()
    {
        $originalGrid = new Grid(3, 3);
        $originalGrid->setAlive(0, 1);
        $originalGrid->setAlive(1, 1);
        $originalGrid->setAlive(2, 1);

        $expectedGrid = new Grid(3, 3);
        $expectedGrid->setAlive(1, 0);
        $expectedGrid->setAlive(1, 1);
        $expectedGrid->setAlive(2, 2);

        $game = new Game();
        $resultGrid = $game->createNextGrid($originalGrid);
        $this->assertFalse($expectedGrid->equals($resultGrid));
    }
}
