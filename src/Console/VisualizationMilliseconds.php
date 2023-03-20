<?php

namespace ArthroProb\Console;

class VisualizationMilliseconds extends AbstractParameter
{
    protected string $name = 'visualizationMs';
    protected bool $hasDefault = true;
    protected $default = null;
    protected string $description = 'If a visualization is desired, pass in the number of milliseconds you would like it to stop on each frame.';

    public function validate($value): bool
    {
        return (int) $value > 0;
    }

    public function sanitize($value): mixed
    {
        return (int) $value;
    }
}