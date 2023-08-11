<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Jobs\Task\GetTaskByIDJob;
use App\Http\Resources\Task\Resource;
use App\Http\Requests\Task\StoreRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); 

        return Resource::collection($tasks);
    }

    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        $task = Task::create($validatedData);

        return new Resource($task);
    }

    public function show($id)
    {
        $task = GetTaskByIDJob::dispatchSync($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task does not exist',
            ], 404);
        }

        return new Resource($task);
    }

    public function update(Request $request, $id)
    {
        $task = GetTaskByIDJob::dispatchSync($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task does not exist',
            ], 404);
        }

        $task->update($data);

        return new Resource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
    
}
