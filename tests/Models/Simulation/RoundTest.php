<?php

namespace ArthroProbTests\Models\Simulation;

use ArthroProbTests\BaseTest;
use ArthroProb\Models\Simulation\Round;
use ArthroProb\Models\Simulation\FiveByFive;
use ArthroProb\Models\Simulation\BoardPosition;
use ArthroProb\Models\Arthropods\Ant;


class RoundTest extends BaseTest
{
    protected array $tests = [
        "testRun",
        "testEdgeCases"
    ];

    public function testEdgeCases()
    {
        $testCases = $this->getEdgeCases();

        foreach ($testCases as $testCase) {
            $board = new FiveByFive();
            $board->set($testCase['start']['x'], $testCase['start']['y'], 100);
            $round = new Round(new Ant(), $board, $testCase['time']);
            $round->run();
            $position = $round->getBoard()
                ->getPositionByCoord($testCase['position']['x'], $testCase['position']['y']);
            $this->assert($testCase['expected'], $position->getProbability());
        }
    }

    public function getEdgeCases()
    {
        return [
            [
                'time' => 0,
                'start' =>  ['x' => 1, 'y' => 1],
                'position' => ['x' => 1, 'y' => 1],
                'expected' => 100
            ],
            [
                'time' => 1,
                'start' =>  ['x' => 1, 'y' => 1],
                'position' => ['x' => 1, 'y' => 1],
                'expected' => 60
            ],
            [
                'time' => 2,
                'start' =>  ['x' => 1, 'y' => 1],
                'position' => ['x' => 1, 'y' => 1],
                'expected' => 44
            ],
        ];
    }

    public function testRun()
    {
        $testCases = $this->getRunTestCases();

        foreach ($testCases as $testCase) {
            $round = new Round(new Ant(), (new FiveByFive())->init(), $testCase['time']);
            $round->run();
            $position = $round->getBoard()
                ->getPositionByCoord($testCase['position']['x'], $testCase['position']['y']);
            $this->assert($testCase['expected'], $position->getProbability());
        }
    }

    public function getRunTestCases()
    {
        // seconds, position, expected probability
        return [
            [
                'time' => 0, 
                'position' => ['x' => 3, 'y' => 3],
                'expected' => 100
            ],
            [
                'time' => 0, 
                'position' => ['x' => 3, 'y' => 4],
                'expected' => 0
            ],
            [
                'time' => 1, 
                'position' => ['x' => 3, 'y' => 3],
                'expected' => 20
            ],
            [
                'time' => 1, 
                'position' => ['x' => 4, 'y' => 3],
                'expected' => 20
            ],
            [
                'time' => 2, 
                'position' => ['x' => 3, 'y' => 3],
                'expected' => 20
            ],
            [
                'time' => 2, 
                'position' => ['x' => 1, 'y' => 1],
                'expected' => 0
            ],
            [
                'time' => 2, 
                'position' => ['x' => 3, 'y' => 1],
                'expected' => 4
            ],
        ];
    }
}
