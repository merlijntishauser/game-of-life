<?php
declare(strict_types=1);
namespace GameOfLife;

final class SignalHandlerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function defaultSignalIsZero()
    {
        $signalHandler = new SignalHandler();
        $this->assertTrue($signalHandler->getSignal() === 0);
    }

    /**
     * @test
     */
    public function signalCanBeSet()
    {
        $signalHandler = new SignalHandler();
        $signalHandler(5);
        $this->assertTrue($signalHandler->getSignal() === 5 );
    }

}
