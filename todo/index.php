<?php

use Todo\Models\Task;

require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$task = new Task;
$task->setDescription('Learn oop');
$task->setDue(new DateTime('+ 2 days'));

var_dump($task);


