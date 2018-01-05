<?php

use Todo\Models\Task;
use Todo\Storage\MySqlDatabaseTaskStorage;

require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

//$task = new Task;
//$task->setDescription('Learn oop');
//$task->setDue(new DateTime('+ 2 days'));

try{
    $db = new PDO('mysql:host=127.0.0.1; dbname=todo','andrii','1');
} catch(PDOException $e) {
    die($e->getMessage('No connection'));
}

/*$tasks = $db->prepare("SELECT * FROM tasks");

$tasks->setFetchMode(PDO::FETCH_CLASS, Task::class);

$tasks->execute();

foreach ($tasks->fetchAll() as $task) {
    echo $task->getDescription().PHP_EOL;
    echo $task->getDue()->format('H:i'),'<br>';
}*/

$storage = new MySqlDatabaseTaskStorage($db);

//INSERT
/*$task = new Task();
$task->setDescription('Drink coffee ');
$task->setDue(new DateTime('+ 10 minutes'));
$task->setComplete(1);

$taskId = $storage->store($task);

var_dump($storage->get($taskId));*/


//UPDATE
$task = $storage->get(6);
$task->setDescription('Drink even more coffee');
$task->setDue(new DateTime('+2 year'));
$task->setComplete(false);

var_dump($storage->update($task));





