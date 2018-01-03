<?php

use Todo\Models\Task;
use Todo\Storage\MySqlDatabaseTaskStorage;

require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

//$task = new Task;
//$task->setDescription('Learn oop');
//$task->setDue(new DateTime('+ 2 days'));

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=todo','andrii','1');
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
var_dump($storage);

$tasks = $storage->all();
var_dump($tasks);





