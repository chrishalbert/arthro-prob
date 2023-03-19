<?php

namespace ArthroProbTests\Models\Simulation;

use ArthroProbTests\BaseTest;
use ArthroProb\Models\Simulation\FiveByFive;
use ArthroProb\Models\Simulation\BoardPosition;


class FiveByFiveTest extends BaseTest
{
    protected array $tests = [
        "testCornersIncluded",
        "testCornersIncludedOnEmptyBoard",
        "testOutsidePositionsExcluded"
    ];

    public function testCornersIncluded()
    {
        $corners = [
            new BoardPosition(1,1),
            new BoardPosition(5,5),
            new BoardPosition(1,5),
            new BoardPosition(5,1),
        ];
        foreach ($corners as $corner) {
            $this->assert(true, $this->fiveByFive->includes($corner), "Should include the corners.");
        }
    }

    public function testCornersIncludedOnEmptyBoard()
    {
        $corners = [
            new BoardPosition(1,1),
            new BoardPosition(5,5),
            new BoardPosition(1,5),
            new BoardPosition(5,1),
        ];
        $emptyBoard = $this->fiveByFive->getEmptyBoard();
        foreach ($corners as $corner) {
            $this->assert(true, $emptyBoard->includes($corner), "Should include the corners.");
        }
    }

    public function testOutsidePositionsExcluded()
    {
        $corners = [
            new BoardPosition(0,1),
            new BoardPosition(5,0),
            new BoardPosition(-1,5),
            new BoardPosition(6,1),
        ];
        foreach ($corners as $corner) {
            $this->assert(false, $this->fiveByFive->includes($corner), "Should exclude outer parts.");
        }
    }

    protected function setUp()
    {
        $this->fiveByFive = new FiveByFive();
    }

    protected function tearDown()
    {
        unset($this->fiveByFive);
    }
}
