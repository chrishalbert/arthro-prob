<?php

namespace ArthroProb\Models\Simulation;

abstract class Board implements BoardInterface
{
    protected array $positions;

    protected int $xStart;
    protected int $xEnd;
    protected int $yStart;
    protected int $yEnd;
    
    /**
     * Creates a board ranging from xStart..xEnd and yStart..yEnd.
     * @param int $xStart
     * @param int $xEnd
     * @param int $yStart
     * @param int $yEnd
     */
    public function __construct(int $xStart, int $xEnd, int $yStart, int $yEnd)
    {
        $this->xStart = $xStart;
        $this->xEnd = $xEnd;
        $this->yStart = $yStart;
        $this->yEnd = $yEnd;

        $this->positions = $this->createPositions();   
    }

    private function createPositions()
    {
        $positions = [];
        for ($x = $this->xStart; $x <= $this->xEnd; $x++) {
            for ($y = $this->yStart; $y <= $this->yEnd; $y++) {
                $positions[] = new BoardPosition($x,$y);
            }    
        }
        return $positions;   
    }

    /**
     * @inheritDoc
     */
    public function getEmptyBoard(): self
    {
        return new static($this->xStart, $this->xEnd, $this->yStart, $this->yEnd);
    }

    /**
     * Not efficient. Should use a hash map or refactor.
     * @inheritDoc
     */
    public function includes(BoardPosition $position): bool
    {
        foreach ($this->positions as $boardPosition) {
            if ($position->getX() === $boardPosition->getX() && $position->getY() === $boardPosition->getY()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getPositions(): array
    {
        return $this->positions;
    }
}
