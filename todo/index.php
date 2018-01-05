<?php

use Todo\Models\Task;
use Todo\Storage\MySqlDatabaseTaskStorage;
use Todo\TaskManager;

require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';



try{
    $db = new PDO('mysql:host=127.0.0.1; dbname=todo','andrii','1');
} catch(PDOException $e) {
    die($e->getMessage('No connection'));
}



$storage = new MySqlDatabaseTaskStorage($db);

$manager = new TaskManager($storage);

$task = $manager->getTask(4);
$task->setComplete();

$manager->updateTask($task);



//INSERT
/*$task = new Task();
$task->setDescription('Drink coffee ');
$task->setDue(new DateTime('+ 10 minutes'));
$task->setComplete(1);

$taskId = $storage->store($task);

var_dump($storage->get($taskId));*/


//UPDATE
/*$task = $storage->get(6);
$task->setDescription('Drink even more coffee');
$task->setDue(new DateTime('+2 year'));
$task->setComplete(false);

var_dump($storage->update($task));*/





