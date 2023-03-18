<?php

namespace ArthroProb\Console;

class BoardParameter extends AbstractParameter
{
    protected string $name = 'board';
    protected array $types = ['FiveByFive'];
    protected bool $hasDefault = true;
    protected $default = 'FiveByFive';

    public function __construct()
    {
        $this->description = 'Current boards: ' . implode(', ', $this->types);
    }

    public function validate($value): bool
    {
        return in_array($value, $this->types);
    }
}