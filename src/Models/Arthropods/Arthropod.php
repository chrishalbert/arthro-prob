<?php

namespace ArthroProb\Models\Arthropods;

abstract class Arthropod implements ArthropodInterface{
    protected array $possibilities = [];
    protected string $name = '';
    protected Move $onException;

    public function addPossibility(Move $move)
    {
        $this->possibilities[] = $move;
    }

    public function getPossibilities()
    {
        return $this->possibilities;
    }

    public function setException(Move $move)
    {
        $this->onException = $move;
    }

    public function getException()
    {
        return $this->onException;
    }

    protected function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}