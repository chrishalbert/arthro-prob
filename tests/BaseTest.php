<?php

namespace ArthroProbTests;

abstract class BaseTest
{
    protected array $tests = [];

    protected function setUp()
    {
    }

    protected function tearDown()
    {
    }

    public function run()
    {
        echo PHP_EOL . static::class;
        foreach ($this->tests as $test) {
            $this->setUp();
            $this->$test();
            $this->tearDown();
        }
        echo PHP_EOL . PHP_EOL;
    }

    protected function assert($expected, $actual, $description = '')
    {
        if ($expected !== $actual) {
            echo PHP_EOL . "  FAILED: " . debug_backtrace()[1]['function'] . ' ' . $description;
            echo PHP_EOL . "    Expected: `" . strval($expected) . "`";
            echo PHP_EOL . "    Actual:   `" . strval($actual) . "`";
        } else {
            echo PHP_EOL . "  passed: " . debug_backtrace()[1]['function'];
        }
    }
}