<?php

namespace ArthroProb\Models;

use ArthroProb\Models\Arthropods\ArthropodInterface;
use ArthroProb\Models\Arthropods\Ant;
use ArthroProb\Models\Arthropods\Beetle;
use ArthroProb\Models\Simulation\BoardInterface;
use ArthroProb\Models\Simulation\FiveByFive;

class ModelFactory {

    public function createArthropod(string $arthropod): ArthropodInterface
    {
        $insect = null;
        switch ($arthropod) {
            case 'beetle':
                $insect = new Beetle();
                break;
            case 'ant':
            default:
                $insect = new Ant();
        }
        return $insect;
    }

    public function createBoard(string $boardName): BoardInterface
    {
        $board = null;
        switch ($boardName) {
            case 'FiveByFive':
            default:
                $board = (new FiveByFive())->init();
        }
        return $board;
    }
}