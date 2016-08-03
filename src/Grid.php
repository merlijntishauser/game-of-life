<?php
declare(strict_types=1);
namespace GameOfLife;

class Grid
{
    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $height;

    /**
     * @var array
     */
    private $grid;

    /**
     * @param integer $width
     * @param integer $height
     */
    public function __construct(int $width, int $height)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        $this->grid = array_fill(0, $this->width, array_fill(0, $this->height, false));
    }

    /**
     * @param int $width
     * @throws \Exception
     */
    public function setWidth(int $width)
    {
        if ($width < 0 ) {
            throw new \Exception("width cannot be negative");
        }
        $this->width = $width;
    }

    /**
     * @param int $height
     * @throws \Exception
     */
    public function setHeight(int $height)
    {
        if ($height < 0 ) {
            throw new \Exception("height cannot be negative");
        }
        $this->height = $height;
    }

    /**
     * @return integer
     */
    public function getWidth() : int
    {
        return $this->width;
    }

    /**
     * @return integer
     */
    public function getHeight() : int
    {
        return $this->height;
    }

    /**
     * @param integer $x
     * @param integer $y
     */
    public function setAlive(int $x, int $y)
    {
        $this->grid[$x][$y] = true;
    }

    /**
     * @param integer $amount
     * @throws \Exception
     */
    public function setRandomBlobAlive(int $amount)
    {
        $this->validateAmountInput($amount);

        for ($i=0; $i < $amount; $i++) {
            $coords = $this->getRandomPoint();

            // create a living blob, not a single point
            // and throw in some randomness
            for ($j=0; $j < 10; $j++) {
                $this->setAlive($coords["x"] + rand(1, 4), $coords["y"] + rand(1, 4));
            }
        }
    }

    /**
     * pick a random point, avoid edges
     *
     * @return array x,y
     */
    public function getRandomPoint() : array
    {

        $minX = $this->getWidth()-1;
        if ($minX < 1) {
            $minX = 1;
        }
        $minY = $this->getHeight()-1;
        if ($minY < 1) {
            $minY = 1;
        }

        $x = rand(1, $minX);
        $y = rand(1, $minY);

        return array("x" => $x, "y" => $y);
    }


    /**
     * @param integer $x
     * @param integer $y
     * @return boolean
     */
    public function isAlive(int $x, int $y) : bool
    {
        if ($x < 0) {
            return false;
        }
        if ($y < 0) {
            return false;
        }
        if ($x >= $this->width) {
            return false;
        }
        if ($y >= $this->height) {
            return false;
        }
        return $this->grid[$x][$y];
    }

    /**
     * @param integer $cellX
     * @param integer $cellY
     * @return integer
     */
    public function getAmountOfLivingNeighbours($cellX, $cellY) : int
    {
        $startColumn = max($cellX - 1, 0);
        $endColumn = min($cellX + 1, $this->width - 1);
        $startRow = max($cellY - 1, 0);
        $endRow = min($cellY + 1, $this->height - 1);

        $amount = 0;
        for ($x = $startColumn; $x <= $endColumn; $x++) {
            for ($y = $startRow; $y <= $endRow; $y++) {
                if (($x == $cellX) && $y == $cellY) {
                    continue;
                }
                if ($this->isAlive($x, $y)) {
                    $amount ++;
                }
            }
        }
        return $amount;
    }

    /**
     * @param Grid $grid
     * @return boolean
     */
    public function equals(Grid $grid) : bool
    {
        if (($this->width != $grid->getWidth()) || ($this->height != $grid->getHeight())) {
            return false;
        }

        for ($x = 0; $x < $this->width; $x ++) {
            for ($y = 0; $y < $this->height; $y ++) {
                if ($this->isAlive($x, $y) !== $grid->isAlive($x, $y)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param $amount
     * @throws \Exception
     * @return boolean true if valid
     */
    public function validateAmountInput(int $amount) : bool
    {
        if ($amount < 0) {
            throw new \Exception("Amount should be an positive integer");
        }

        if ($amount > (sqrt($this->height * $this->width))) {
            throw new \Exception("Amount does not make sense in grid of this size");
        }

        return true;
    }
}
