<?php

namespace demo08\points;

use demo08\graphics\Point as BasePoint;

class Point implements BasePoint
{
    public $x;
    public $y;
    public $z;

    public function getDecartCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}