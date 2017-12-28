<?php

use Todo\Models\Task as TaskModel;
use Todo\Models\User;
use Todo\Storage\DateBaseTaskStorage;

session_start();

require 'vendor/autoload.php';

$db = new PDO('mysql:host=127.0.0.1;dbname=todo','andrii','1');
$manager = new TaskManager(new DateBaseTaskStorage($db));

$task = new Task;








