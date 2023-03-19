<?php

namespace ArthroProb\Console;

class EndProbabilityParameter extends AbstractParameter
{
    protected string $name = 'endProbability';
    protected bool $hasDefault = false;
    protected string $description = 'Array of [x,y] coordinates in json format, such that 0 < x,y <= maxRow. For a 5x5, "[[3,3]]" returns probability of the center.';

    public function validate($value): bool
    {
        $coords = json_decode($value);

        if (!is_array($coords) || empty($coords)) {
            return false;
        }

        foreach ($coords as $coord) {
            if (!is_array($coord) || sizeof($coord) !== 2 || !is_int($coord[0]) || !is_int($coord[1]) || $coord[0] < 1 || $coord[1] < 1) {
                return false;
            }
        }

        return true;
    }

    public function sanitize($value): mixed
    {
        if (!$this->validate($value)) {
            throw new \Exception('End Probability failed validation.');
        }
        return json_decode($value);
    }
}