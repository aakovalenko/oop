<?php

namespace demo05\points;

use demo05\graphics\Point as BasePoint;

class Point implements BasePoint
{
    public $x;
    public $y;
    public $z;

    public function getDecartCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}