<?php

namespace lesson04\example02\demo05\cart;

use Yii;

class YiiCart extends Cart
{
    public $sessionKey = 'cart';

    protected function loadItems()
    {
        return Yii::$app->session->get($this->sessionKey, []);
    }

    protected function saveItems($items)
    {
        Yii::$app->session->set($this->sessionKey, $items);
    }
} 