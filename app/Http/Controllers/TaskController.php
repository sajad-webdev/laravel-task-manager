<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest; // اگر برای آپدیت هم کلاس ساختی این را هم اضافه کن
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request) // اینجا کلاس جدید را جایگزین Request معمولی کن
    {
        // لاراول قبل از اینکه کدِ این متد اجرا شود، به StoreTaskRequest می‌رود
        // اگر اعتبار سنجی خطا داشته باشد، خودش کاربر را برمی‌گرداند.
        
       $this->taskService->createTask($request->validated());

        return redirect()->route('tasks.index')->with('success', 'کار با موفقیت ثبت شد!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->taskService->updateTask($task, $request->validated());

        return redirect()->route('tasks.index')->with('success', 'کار با موفقیت ویرایش گردید!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task);
        return redirect()->route('tasks.index')->with('success', 'کار با موفقیت حذف گردید!');
    }

    public function toggle(Task $task) {
        $this->taskService->toggleStatus($task);
        return back()->with('success', 'وضعیت تسک تغییر کرد.');
    }

}
