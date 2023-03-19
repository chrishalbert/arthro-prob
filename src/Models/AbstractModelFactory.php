<?php

namespace ArthroProb\Models;

use ArthroProb\Models\Arthropods\ArthropodInterface;
use ArthroProb\Models\Simulation\BoardInteface;

abstract class AbstractModelFactory {
    abstract public function createArthropod(string $arthropod): ArthopodInterface;
    abstract public function createBoard(string $board): BoardInterface;
}