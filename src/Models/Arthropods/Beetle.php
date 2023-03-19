<?php

namespace ArthroProb\Models\Arthropods;

class Beetle extends Arthropod {
    public function __construct()
    {
        $this->addPossibility(new Move(0,2));
        $this->addPossibility(new Move(2,0));
        $this->addPossibility(new Move(-2,0));
        $this->addPossibility(new Move(0,-2));
        $this->addPossibility(new Move(0,0));
        $this->setName('Beetle');
    }
}