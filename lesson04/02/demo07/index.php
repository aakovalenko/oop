<?php

use lesson04\example02\demo07\cart\Cart;
use lesson04\example02\demo07\cart\storage\SessionStorage;

require_once __DIR__ . '/vendor/autoload.php';

$storage = new SessionStorage('cart');
$cart = new Cart($storage);

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;