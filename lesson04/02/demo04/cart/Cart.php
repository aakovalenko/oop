<?php

namespace lesson04\example02\demo04\cart;

class Cart
{
    private $items = [];

    public function __construct()
    {
        $this->items = isset($_SESSION['cart']) ? unserialize($_SESSION['cart']) : [];
    }

    public function getItems()
    {
        return $this->items;
    }

    public function add($id, $count)
    {
        $current = isset($this->items[$id]) ? $this->items[$id] : 0;
        $this->items[$id] = $current + $count;
        $_SESSION['cart'] = serialize($this->items);
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $_SESSION['cart'] = serialize($this->items);
    }

    public function clear()
    {
        $this->items = [];
        $_SESSION['cart'] = serialize($this->items);
    }
} 