<?php
declare(strict_types=1);
namespace GameOfLife;

use phpmock\phpunit\PHPMock;


class GameTest extends \PHPUnit_Framework_TestCase
{
    use PHPMock;

    /**
     * @test
     */
    public function randomGridIsCreated()
    {
        $rand = $this->getFunctionMock(__NAMESPACE__, "mt_rand");
        $rand->expects($this->atLeastOnce())->willReturn(1);
        
        $referenceGrid = new Game();
        $referenceGrid = $referenceGrid->createRandomGrid(3, 3);

        $randomGrid = new Game();
        $randomGrid = $randomGrid->createRandomGrid(3, 3);

        $this->assertTrue($referenceGrid->equals($randomGrid));
    }

    /**
     * @test
     */
    public function randomGridIsCreatedWithRandISAllZeros()
    {
        $rand = $this->getFunctionMock(__NAMESPACE__, "mt_rand");
        $rand->expects($this->atLeastOnce())->willReturn(0);

        $referenceGrid = new Game();
        $referenceGrid = $referenceGrid->createRandomGrid(3, 3);

        $randomGrid = new Game();
        $randomGrid = $randomGrid->createRandomGrid(3, 3);

        $this->assertTrue($referenceGrid->equals($randomGrid));
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
