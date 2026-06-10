<?php

namespace App\Repositories;

use App\Models\Task;
use App\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll()
     { 
        return Task::latest()->get();
     }

    public function create(array $data)
     { 
        return Task::create($data);
     }

    public function update(Task $task, array $data)
     {
         $task->update($data); return $task;
     }

    public function delete(Task $task)
     { 
        return $task->delete();
     }

    public function toggle(Task $task)
     { 
        $task->status = $task->status === 'pending' ? 'completed' : 'pending';
        $task->save();
        return $task;
     }
}
