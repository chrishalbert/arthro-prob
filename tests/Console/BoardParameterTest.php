<?php

namespace ArthroProbTests\Console;

use ArthroProbTests\BaseTest;
use ArthroProb\Console\BoardParameter;

class BoardParameterTest extends BaseTest
{
    protected array $tests = [
        "testValidateBoardReturnsTrue",
        "testGetDefaultIsAFiveByFive",
        "testGetDescriptionOutput"
    ];

    public function testValidateBoardReturnsTrue()
    {
        $this->assert(true, $this->boardParameter->validate('FiveByFive'));
    }

    public function testGetDefaultIsAFiveByFive()
    {
        $this->assert('FiveByFive', $this->boardParameter->getDefault());
    }

    public function testGetDescriptionOutput()
    {
        $this->assert('Current boards: FiveByFive', $this->boardParameter->getDescription());
    }

    protected function setUp()
    {
        $this->boardParameter = new BoardParameter();
    }

    protected function tearDown()
    {
        unset($this->boardParameter);
    }
}
