<?php

namespace ArthroProb\Models\Simulation;

class FiveByFive extends Board
{
    public function __construct()
    {
        parent::__construct(1,5,1,5);
    }
}