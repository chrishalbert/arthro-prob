<?php

namespace ArthroProb\Console;

interface ParameterInterface {

    public function getName(): string;
    public function getDescription(): string;
    public function hasDefault(): bool;
    public function getDefault(): mixed;

    public function validate($value): bool;
    public function sanitize($value): mixed;
}