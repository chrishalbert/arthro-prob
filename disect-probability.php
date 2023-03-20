<?php

require_once("./vendor/autoload.php");

use ArthroProb\Services\ParameterService;
use ArthroProb\Console\{InsectParameter,TimeParameter,BoardParameter,EndProbabilityParameter,VisualizationMilliseconds};
use ArthroProb\Models\ModelFactory;
use ArthroProb\Models\Simulation\Round;

$parameterService = new ParameterService([
    new InsectParameter(),
    new TimeParameter(),
    new BoardParameter(),
    new EndProbabilityParameter(),
    new VisualizationMilliseconds()
]);

$parameterService->validate();

$parameters = $parameterService->getSanitized();

$modelFactory = new ModelFactory();

$insect = $modelFactory->createArthropod($parameters['insect']);
$board = $modelFactory->createBoard($parameters['board']);

$round = new Round($insect, $board, $parameters['time'], $parameters['visualizationMs'] ?? null);
$round->run();

$total = 0;

echo PHP_EOL . "RESULTS: {$round} for {$parameterService->getRaw()['time']}" . PHP_EOL;
foreach ($parameters['endProbability'] as $coords)
{
    $position = $round->getBoard()->getPositionByCoord($coords[0], $coords[1]);
    $total += $position->getProbability();
    echo "  " . $position . PHP_EOL;
}
echo PHP_EOL . "TOTAL PROBABILITY: {$total} %" . PHP_EOL;


