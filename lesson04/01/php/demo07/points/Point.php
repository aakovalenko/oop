<?php

namespace demo07\points;

use demo07\graphics\Point as BasePoint;

class Point implements BasePoint
{
    public $x;
    public $y;
    public $z;

    public function getDecartCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}