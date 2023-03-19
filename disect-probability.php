<?php

require_once("./vendor/autoload.php");

use ArthroProb\Services\ParameterService;
use ArthroProb\Console\{InsectParameter,TimeParameter,BoardParameter,EndProbabilityParameter};
use ArthroProb\Models\ModelFactory;
use ArthroProb\Models\Simulation\Round;

$parameterService = new ParameterService([
    new InsectParameter(),
    new TimeParameter(),
    new BoardParameter(),
    new EndProbabilityParameter()
]);

$parameterService->validate();

$parameters = $parameterService->getSanitized();

$modelFactory = new ModelFactory();

$insect = $modelFactory->createArthropod($parameters['insect']);
$board = $modelFactory->createBoard($parameters['board']);

$round = new Round($insect, $board, $parameters['time']);
$round->run();

$total = 0;

echo PHP_EOL . "RESULTS: {$round} for {$parameterService->getRaw()['time']}" . PHP_EOL;
foreach ($parameters['endProbability'] as $coords)
{
    $position = $round->getBoard()->getPositionByCoord($coords[0], $coords[1]);
    echo "  " . $position . PHP_EOL;
}


