<?php

namespace ArthroProb\Models\Arthropods;

class Move {
    protected $horizontal;
    protected $vertical;

    public function __construct(int $horizontal, int $vertical)
    {
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    public function vertically()
    {
        return $this->vertical;
    }

    public function horizontally()
    {
        return $this->horizontal;
    }
}