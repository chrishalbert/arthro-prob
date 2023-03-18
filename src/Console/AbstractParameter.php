<?php

namespace ArthroProb\Console;

abstract class AbstractParameter implements ParameterInterface
{
    protected string $name = '';
    protected string $description = '';
    protected bool $hasDefault = false;
    protected $default = null;

    abstract public function validate($value): bool;

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function hasDefault(): bool
    {
        return $this->hasDefault;
    }

    public function getDefault(): mixed
    {
        if (!$this->hasDefault()) {
            throw new \Exception("Parameter does not have a default.");
        }
        return $this->default;
    }

    public function sanitize($value): mixed
    {
        return $value;
    }
}