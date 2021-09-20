<?php

namespace App\Support;

use IteratorAggregate;
use ArrayIterator;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function add(array $items): void
    {
        $this->items = array_merge($this->items, $items);
    }

    public function merge(Collection $collection): void
    {
        $this->add($collection->get());
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }

    public function jsonSerialize(): array
    {
        return $this->items;
    }

}