<?php

use demo05\graphics\Canvas;
use demo05\points\Point;

require_once __DIR__ . '/graphics/Point.php';
require_once __DIR__ . '/graphics/Canvas.php';
require_once __DIR__ . '/points/Point.php';

$canvas = new Canvas();
$point = new Point();

$canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;
 