<?php

namespace ArthroProbTests\Models\Simulation;

use ArthroProbTests\BaseTest;
use ArthroProb\Models\Simulation\FiveByFive;
use ArthroProb\Models\Simulation\BoardPosition;


class FiveByFiveTest extends BaseTest
{
    protected array $tests = [
        "testCornersIncluded"
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

    protected function setUp()
    {
        $this->fiveByFive = new FiveByFive();
    }

    protected function tearDown()
    {
        unset($this->fiveByFive);
    }
}
