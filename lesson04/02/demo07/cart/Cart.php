<?php

namespace lesson04\example02\demo07\cart;

use lesson04\example02\demo07\cart\storage\StorageInterface;

class Cart
{
    private $items = [];
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
        $this->loadItems();
    }

    public function getItems()
    {
        return $this->items;
    }

    public function add($id, $count, $price)
    {
        $current = isset($this->items[$id]) ? $this->items[$id]->getCount() : 0;
        $this->items[$id] = new CartItem($id, $current + $count, $price);
        $this->saveItems();
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $this->saveItems();
    }

    public function clear()
    {
        $this->items = [];
        $this->saveItems($this->items);
    }

    public function getCost()
    {
        $cost = 0;
        foreach ($this->items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }

    private function loadItems()
    {
        $this->items = $this->storage->load();
    }

    private function saveItems()
    {
        $this->storage->save($this->items);
    }
} 