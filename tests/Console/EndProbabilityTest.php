<?php

namespace ArthroProbTests\Console;

use ArthroProbTests\BaseTest;
use ArthroProb\Console\EndProbabilityParameter;

class EndProbabilityTest extends BaseTest
{
    protected array $tests = [
        'testValidateCases',
    ];

    public function validateCases(): array
    {
        return [
            '[]' => false,
            '[[]]' => false,
            '[2,3]' => false,
            '[[1,2]]' => true,
            '[[1,2],[4,5]]' => true,
            '[[1,2],[4,s]]' => false,
            '[[1,2],[4,5,1]]' => false,
        ];
    }

    public function testValidateCases()
    {
        $testCases = $this->validateCases();
        foreach ($testCases as $testCase => $expected) {
            $this->assert($expected, $this->endProbabilityParameter->validate($testCase), "Passing $testCase to validate()");
        }
    }

    protected function setUp()
    {
        $this->endProbabilityParameter = new EndProbabilityParameter();
    }

    protected function tearDown()
    {
        unset($this->endProbabilityParameter);
    }
}