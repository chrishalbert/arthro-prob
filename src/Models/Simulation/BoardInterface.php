<?php

namespace ArthroProb\Models\Simulation;

interface BoardInterface
{
    /**
     * Returns a new empty board, based on the x and y start/stop.
     * @return BoardInterface
     */
    public function getEmptyBoard(): self;

    /**
     * Returns true if the position exists on the board.
     * @param array $position An [x,y] coordinate.
     * @return true
     */
    public function includes(BoardPosition $position): bool;

    /**
     * Get a list of all the positions.
     */
    public function getPositions(): array; 
}