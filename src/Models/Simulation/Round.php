<?php

namespace ArthroProb\Models\Simulation;

use ArthroProb\Models\Arthropods\Arthropod;


class Round
{
    public function __construct(Arthropod $insect, Board $board, integer $time)
    {
        $this->insect = $insect;
        $this->board = $board;
        $this->time = $time;
    }

    public function run()
    {
        $this->board->set([3,3], 100);

        $insectMoves = $this->insect->getPossibilities();

        for ($i = 0; $i < $time; $i++) {
            $tempBoard = $this->board::getEmptyBoard();

            foreach ($this->board->getPositions() as $position) {
                // If there's no value on a position, there's nothing to consider.
                $probability = $position->getProbability();
                if ($probability === 0) {
                    continue;
                }
                
                // Based on the possible moves, determine the equal distribution
                $distributedProbability = $probabilty / count($insectMoves);
                
                foreach ($insectMoves as $insectMove) {
                    $newPostion = $position->plus($insectMove);
                    if (!$this->board->includes($newPosition)) {
                        $newPosition = $position + $this->insect->getException();
                    }
                    $tempBoard->add($probability, $newPosition);
                }
                
            }
        }
    }
}