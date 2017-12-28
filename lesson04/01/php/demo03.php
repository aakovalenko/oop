<?php

namespace demo03\graphics
{
    interface Point {
        public function getDecartCoordinates();
    }

    class Canvas {
        public function paint(Point $point) {
            list($x, $y, $z) = $point->getDecartCoordinates();
            echo "[x = $x; y = $y; z = $z]\n";
        }
    }
}

namespace demo03\points
{
    use demo03\graphics\Point as BasePoint;

    class Point implements BasePoint
    {
        public $x;
        public $y;
        public $z;

        public function getDecartCoordinates() {
            return [$this->x, $this->y, $this->z];
        }
    }
}

namespace
{
    use demo03\graphics\Canvas;
    use demo03\points\Point;

    $canvas = new Canvas();
    $point = new Point();

    $canvas->paint($point);

    echo get_class($canvas) . PHP_EOL;
    echo get_class($point) . PHP_EOL;
}