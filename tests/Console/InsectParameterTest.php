<?php

namespace ArthroProbTests\Console;

use ArthroProbTests\BaseTest;
use ArthroProb\Console\InsectParameter;

class InsectParameterTest extends BaseTest
{
    protected array $tests = [
        "testValidateAntReturnsTrue",
        "testValidateBeetleReturnsTrue",
        "testGetDefaultIsAnAnt",
        "testGetDescriptionOutput"
    ];

    public function testValidateAntReturnsTrue()
    {
        $this->assert(true, $this->insectParameter->validate('ant'));
    }

    public function testValidateBeetleReturnsTrue()
    {
        $this->assert(false, $this->insectParameter->validate('beetle'));
    }

    public function testGetDefaultIsAnAnt()
    {
        $this->assert('ant', $this->insectParameter->getDefault());
    }

    public function testGetDescriptionOutput()
    {
        $this->assert('Current insects with defined behavior: ant', $this->insectParameter->getDescription());
    }

    protected function setUp()
    {
        $this->insectParameter = new InsectParameter();
    }

    protected function tearDown()
    {
        unset($this->insectParameter);
    }
}
