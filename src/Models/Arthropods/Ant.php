<?php

namespace ArthroProb\Models\Arthropods;

class Ant extends Arthropod {
    public function __construct()
    {
        $this->addPossibility(new Move(0,1));
        $this->addPossibility(new Move(1,0));
        $this->addPossibility(new Move(-1,0));
        $this->addPossibility(new Move(0,-1));
        $this->addPossibility(new Move(0,0));
        $this->setName('Ant');
    }
}