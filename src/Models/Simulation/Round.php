<?php

namespace ArthroProb\Models\Simulation;

use ArthroProb\Models\Arthropods\Arthropod;


class Round
{
    public function __construct(Arthropod $insect, Board $board, int $time)
    {
        $this->insect = $insect;
        $this->board = $board;
        $this->time = $time;
    }

    public function run()
    {
        $insectMoves = $this->insect->getPossibilities();

        for ($i = 0; $i < $this->time; $i++) {
            $tempBoard = $this->board->getEmptyBoard();

            foreach ($this->board->getPositions() as $position) {
                // If there's no value on a position, there's nothing to consider.
                $probability = $position->getProbability();
                if ($probability === 0) {
                    continue;
                }
                
                // Based on the possible moves, determine the equal distribution
                $distributedProbability = $probability / count($insectMoves);
                
                foreach ($insectMoves as $insectMove) {
                    $newPosition = $position->plus($insectMove);
                    if ($this->board->includes($newPosition)) {
                        $tempPosition = $tempBoard->getPositionByCoord($newPosition->getX(), $newPosition->getY());
                    } else {
                        $tempPosition = $tempBoard->getPositionByCoord($position->getX(), $position->getY());
                    }
                    $tempPosition->addProbability($distributedProbability);
                }
                $position->addProbability($probability*-1);
            }
            $this->board = clone $tempBoard;
        }
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function __toString()
    {
        return "{$this->insect->getName()} on a {$this->board->getName()}";
    }
}