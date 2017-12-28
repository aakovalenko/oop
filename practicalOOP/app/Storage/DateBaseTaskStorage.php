<?php

namespace Todo\Storage;

use Todo\Models\Task;

interface TaskStorageInterface
{
    public function get($id);

    public function store(Task $task);
}



class DateBaseTaskStorage implements TaskStorageInterface
{
    public function get($id)
    {

    }

    public function store(Task $task)
    {

    }
}