<?php

use demo04\graphics\Canvas;
use demo04\points\Point;

$canvas = new Canvas();
$point = new Point();

$canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;
 