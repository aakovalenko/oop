<?php

namespace lesson04\example02\demo09\cart\storage;

use Yii;

class YiiHybridStorage implements StorageInterface
{
    private $storage;

    public function __construct($sessionKey)
    {
        $sessionStorage = new YiiSessionStorage($this->sessionKey);

        if (Yii::$app->user->isGuest) {
            $this->_storage = $sessionStorage;
        } else {
            $dbStorage = new YiiDbStorage(Yii::$app->user->id);
            if ($sessionItems = $sessionStorage->load()) {
                $items = array_merge($dbStorage->load(), $sessionItems);
                $dbStorage->save($items);
                $sessionStorage->save([]);
            }
            $this->storage = $dbStorage;
        }
    }

    public function load()
    {
        return $this->storage->loadItems();
    }

    public function save($cartItems)
    {
        $this->storage->saveItems($cartItems);
    }
}