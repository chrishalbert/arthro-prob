<?php

namespace ArthroProb\Models\Simulation;

abstract class Board implements BoardInterface
{
    protected array $positions;
    protected int $xStart;
    protected int $xEnd;
    protected int $yStart;
    protected int $yEnd;
    protected string $boardName;
    
    /**
     * Creates a board ranging from xStart..xEnd and yStart..yEnd.
     * @param int $xStart
     * @param int $xEnd
     * @param int $yStart
     * @param int $yEnd
     */
    public function __construct(int $xStart, int $xEnd, int $yStart, int $yEnd, string $boardName)
    {
        $this->xStart = $xStart;
        $this->xEnd = $xEnd;
        $this->yStart = $yStart;
        $this->yEnd = $yEnd;
        $this->boardName = $boardName;

        $this->positions = $this->createPositions();   
    }

    private function createPositions()
    {
        $positions = [];
        for ($x = $this->xStart; $x <= $this->xEnd; $x++) {
            for ($y = $this->yStart; $y <= $this->yEnd; $y++) {
                $positions["{$x}:{$y}"] = new BoardPosition($x,$y);
            }    
        }
        return $positions;   
    }

    /**d
     * @inheritDoc
     */
    public function getEmptyBoard(): self
    {
        return new static($this->xStart, $this->xEnd, $this->yStart, $this->yEnd);
    }

    /**
     * @inheritDoc
     */
    public function includes(BoardPosition $position): bool
    {
        return isset($this->positions["{$position->getX()}:{$position->getY()}"]);
    }

    /**
     * @inheritDoc
     */
    public function getPositions(): array
    {
        return $this->positions;
    }

    /**
     * 
     */
    public function getPositionByCoord(int $x, int $y)
    {
        return $this->positions["{$x}:{$y}"] ?? null;
    }

    public function set(int $x, int $y, $probability)
    {
        $this->positions["{$x}:{$y}"]->setProbability($probability);
    }

    public function getName()
    {
        return $this->boardName;
    }

    public function getVisualization()
    {
        $visual = PHP_EOL;
        for ($y = $this->yStart; $y <= $this->yEnd; $y++) {
            for ($x = $this->xStart; $x <= $this->xEnd; $x++) {
                $visual .= str_pad(round($this->positions["{$x}:{$y}"]->getProbability(), 7), 10, ' ', STR_PAD_BOTH);    
            }
            $visual .= PHP_EOL;
        }
        return $visual;
    }

    public function getDimensions()
    {
        return [
            'x' => $this->xEnd - $this->xStart + 1,
            'y' => $this->yEnd - $this->yStart + 1
        ];
    }
}
