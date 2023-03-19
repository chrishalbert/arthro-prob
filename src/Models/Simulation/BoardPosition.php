<?php

namespace ArthroProb\Models\Simulation;

use ArthroProb\Models\Arthropods\Move;

class BoardPosition
{
    protected int $x;
    protected int $y;
    protected $probability = 0;

    public function __construct($x, $y, $probability = 0)
    {
        $this->x = $x;
        $this->y = $y;
        $this->probability = $probability;
    }

    public function plus(Move $move)
    {
        return new static($this->x+$move->horizontally(), $this->y + $move->vertically());
    }
    
    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getProbability()
    {
        return $this->probability;
    }

    public function addProbability($probability)
    {
        $this->probability += $probability;
    }

    public function setProbability($probability)
    {
        $this->probability = $probability;
    }

    public function __toString()
    {
        return "[{$this->getX()}, {$this->getY()}] Probability: {$this->getProbability()} %";
    }
}
