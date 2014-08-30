<?php
namespace GameOfLife;

class SignalHandler
{
    /**
     * @var integer
     */
    private $signal;

    public function __construct()
    {
        $this->signal = 0;
    }

    /**
     * @param integer $signal
     */
    public function __invoke($signal)
    {
        $this->signal = $signal;
    }

    /**
     * @return integer
     */
    public function getSignal()
    {
        return $this->signal;
    }
}
