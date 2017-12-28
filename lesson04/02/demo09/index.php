<?php

use lesson04\example02\demo09\cart\Cart;
use lesson04\example02\demo09\cart\cost\BirthdayCost;
use lesson04\example02\demo09\cart\cost\FridayCost;
use lesson04\example02\demo09\cart\cost\SimpleCost;
use lesson04\example02\demo09\cart\storage\SessionStorage;

require_once __DIR__ . '/vendor/autoload.php';

$storage = new SessionStorage('cart');

$calculator = new SimpleCost();
if (!Yii::$app->user->isGuest) {
    $calculator = new BirthdayCost($calculator, 7, Yii::$app->user->identity->birthData, date('Y-m-d'));
}
$calculator = new FridayCost($calculator, 5, date('Y-m-d'));

$cart = new Cart($storage, $calculator);

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;