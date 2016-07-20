<?php
namespace MerlijnTishauser\GameOfLife;

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function gridValueIsFalseByDefault()
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
}
