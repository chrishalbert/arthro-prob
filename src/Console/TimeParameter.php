<?php

namespace ArthroProb\Console;

class TimeParameter extends AbstractParameter
{
    protected string $name = 'time';
    protected string $description = 'Time can be represented in second, minutes, or hours for example: 3600s, 60m, 1h';
    protected bool $hasDefault = false;

    public function validate($value): bool
    {
        return preg_match('/^\d+[smh]$/', $value);
    }

    public function sanitize($value): int
    {
        $parts = str_split($value);
        $scalar = null;
        switch(array_pop($parts)) {    
            case 's':
                $scalar = 1;
                break;
            case 'm':
                $scalar = 60;
                break;
            case 'h':
                $scalar = 3600;
                break;
            default:
                throw new \Exception('Unexpected format. Please validate first.');
        }
        return intval(implode('', $parts)) * $scalar;
    }
}