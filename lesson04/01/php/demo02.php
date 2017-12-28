<?php

namespace graphics
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

namespace points
{
    class Point implements \graphics\Point
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
    $canvas = new \graphics\Canvas();
    $point = new \points\Point();

    $canvas->paint($point);

    echo get_class($canvas) . PHP_EOL;
    echo get_class($point) . PHP_EOL;
}