<?php

namespace ArthroProb\Console;

class InsectParameter extends AbstractParameter
{
    protected string $name = 'insect';
    protected array $types = ['ant'];
    protected bool $hasDefault = true;
    protected $default = 'ant';

    public function __construct()
    {
        $this->description = 'Current insects with defined behavior: ' . implode(', ', $this->types);
    }

    public function validate($value): bool
    {
        return in_array($value, $this->types);
    }
}