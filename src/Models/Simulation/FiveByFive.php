<?php

namespace ArthroProb\Models\Simulation;

class FiveByFive extends Board
{
    /**
     * Initialize first place at 3,3, with 100% probability.
     */
    public function __construct()
    {
        parent::__construct(1,5,1,5, '5x5 Board');
    }

    public function init()
    {
        $this->set(3,3,100);
        return $this;
    }
}