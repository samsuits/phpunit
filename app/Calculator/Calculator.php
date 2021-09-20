<?php

namespace App\Calculator;

class Calculator
{
    protected $operations = [];

    public function setOperation(OperationInterface $operation): void
    {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations): void
    {
        $filteredOperations = array_filter($operations, function ($operation) {
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($this->operations, $filteredOperations);
    }

    public function getOperations(): array
    {
        return $this->operations;
    }

    public function calculate()
    {
        if (count($this->operations) > 1) {
            return (array_map(function ($operation):int {
                return $operation->calculate();
            }, $this->operations));
        }
        return $this->operations[0]->calculate();
    }
}