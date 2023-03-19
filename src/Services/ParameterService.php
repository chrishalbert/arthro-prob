<?php

namespace ArthroProb\Services;

class ParameterService
{
    private array $rawParameters = [];

    private array $sanitizedParameters = [];

    /**
     * @var ParameterInterface[]
     */
    private array $registeredParameters;

    public function __construct(array $registeredParameters = [])
    {
        $this->registeredParameters = $registeredParameters;
        $this->load();
    }

    public function validate()
    {
        $errorMessage = '';

        foreach ($this->registeredParameters as $registeredParameter) {
            $paramName = $registeredParameter->getName();
            if (isset($this->rawParameters[$paramName]) && !$registeredParameter->validate($this->rawParameters[$paramName])) {
                $errorMessage .= PHP_EOL . "Value: `{$this->rawParameters[$paramName]}` doesn't follow description: {$registeredParameter->getDescription()}";
            } elseif (!$registeredParameter->hasDefault() && !isset($this->rawParameters[$paramName])) {
                $errorMessage .= PHP_EOL . "Required Value: `{$registeredParameter->getName()}`. {$registeredParameter->getDescription()}";
            } elseif ($registeredParameter->hasDefault() && !isset($this->rawParameters[$paramName])) {
                $this->rawParameters[$paramName] = $registeredParameter->getDefault();
            }
        }

        if (!empty($errorMessage)) {
            echo $errorMessage . PHP_EOL . PHP_EOL;
            throw new \Exception("Validation Failed");
        }
    }

    public function getSanitized()
    {
        foreach ($this->registeredParameters as $registeredParameter) {
            $paramName = $registeredParameter->getName();
            if (isset($this->rawParameters[$paramName])) {
                $this->sanitizedParameters[$paramName] = $registeredParameter->sanitize($this->rawParameters[$paramName]);
            }
        }

        return $this->sanitizedParameters;
    }

    public function getRaw()
    {
        return $this->rawParameters;
    }

    protected function load()
    {
        $longopts = [];
        foreach ($this->registeredParameters as $parameter) {
            $parameterOpt = $parameter->getName() . ":";
            if ($parameter->hasDefault()) {
                $parameterOpt .= ":";
            }
            $longopts[] = $parameterOpt;
        }

        $this->rawParameters = getopt('', $longopts);
    }
}