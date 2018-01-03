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
