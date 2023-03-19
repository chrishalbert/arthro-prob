<?php

namespace ArthroProb\Models\Arthropods;

interface ArthropodInterface
{
    public function addPossibility(Move $move);
    public function getPossibilities();
    public function setException(Move $move);
    public function getException();
}