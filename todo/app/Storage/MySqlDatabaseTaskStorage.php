<?php

namespace Todo\Storage;

use \PDO;
use Todo\Storage\Contracts\TaskStorageInterface;
use Todo\Models\Task;


class MySqlDatabaseTaskStorage implements TaskStorageInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function store(Task $task)
    {
        $statement = $this->db->prepare("
            INSERT INTO tasks (description, due, complete)
            VALUES (:description, :due, :complete)
        ");

        $statement->execute([
           'description' => $task->getDescription(),
            'due' => $task->getDue()->format('Y-m-d H:i:s'),
            'complete' => $task->getComplete() ? 1 : 0,
        ]);

        return $this->db->lastInsertId();

    }

    public function update(Task $task)
    {

    }

    public function get($id)
    {

    }

    public function all()
    {
        $statement = $this->db->prepare("
            SELECT id, description, due, complete 
            FROM tasks
        ");

        $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $statement->execute();

        return $statement->fetchAll();
    }
}
