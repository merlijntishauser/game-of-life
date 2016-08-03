<?php
declare(strict_types=1);
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
    public function __invoke(int $signal)
    {
        $this->signal = $signal;
    }

    /**
     * @return integer
     */
    public function getSignal() : int
    {
        return $this->signal;
    }
}
