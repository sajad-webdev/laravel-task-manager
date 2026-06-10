<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update(Task $task, array $data);
    public function delete(Task $task);
    public function toggle(Task $task);
}
