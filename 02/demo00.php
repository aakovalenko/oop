<?php

namespace lesson02\example\demo00;

$rows = file(__DIR__ . '/list.txt');


foreach ($rows as $row) {
    $values = array_map('trim', explode(';', $row));

    echo $values[0] . ' ' . $values[1] . ' ' . $values[2] . PHP_EOL;
}