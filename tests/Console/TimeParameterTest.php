<?php

namespace ArthroProbTests\Console;

use ArthroProbTests\BaseTest;
use ArthroProb\Console\TimeParameter;

class TimeParameterTest extends BaseTest
{
    protected array $tests = [
        'testValidateCases',
        'testSanitizeCases'
    ];

    public function validateCases(): array
    {
        return [
            '15s' => true,
            '3m' => true,
            '10h' => true,
            '-12s' => false,
            '10M' => false,
            '5' => false,
            'h' => false
        ];
    }

    public function sanitizeCases(): array
    {
        return [
            '15s' => 15,
            '3m' => 180,
            '10h' => 36000
        ];
    }

    public function testValidateCases()
    {
        $testCases = $this->validateCases();
        foreach ($testCases as $testCase => $expected) {
            $this->assert($expected, $this->timeParameter->validate($testCase), "Passing $testCase to validate()");
        }
    }

    public function testSanitizeCases()
    {
        $testCases = $this->sanitizeCases();
        foreach ($testCases as $testCase => $expected) {
            $this->assert($expected, $this->timeParameter->sanitize($testCase), "Passing $testCase to validate()");
        }
    }

    protected function setUp()
    {
        $this->timeParameter = new TimeParameter();
    }

    protected function tearDown()
    {
        unset($this->timeParameter);
    }
}