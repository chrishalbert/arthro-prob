<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("./vendor/autoload.php");

use ArthroProbTests\Console\InsectParameterTest;

$tests = [
    new InsectParameterTest()
];

echo PHP_EOL . "Running tests..." . PHP_EOL;

foreach ($tests as $test) {
    $test->run();
}