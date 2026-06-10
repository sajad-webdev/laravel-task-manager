<?php

namespace App\Services;

use App\Models\Task;
use App\Interfaces\TaskRepositoryInterface;

class TaskService
{
    protected $tasks;

    public function __construct(TaskRepositoryInterface $tasks)
    {
        $this->tasks = $tasks;
    }

    public function getAllTasks()
    {
        return $this->tasks->getAll();
    }

    public function createTask(array $data)
    {
        return $this->tasks->create($data);
    }

    public function updateTask(Task $task, array $data)
    {
        $data['status'] = $data['status'] ?? 'pending';
        return $this->tasks->update($task, $data);
    }

    public function deleteTask(Task $task)
    {
        return $this->tasks->delete($task);
    }

    public function toggleStatus(Task $task)
    {
        return $this->tasks->toggle($task);
    }

}
