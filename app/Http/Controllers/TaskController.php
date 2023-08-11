<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Enums\Status;
use Illuminate\Http\Request;
use App\Jobs\Task\GetTaskByIDJob;
use App\Http\Resources\Task\Resource;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;

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

        $validatedData['status'] = $validatedData['status'] == 0 ? Status::Incomplete : Status::Completed;

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

    public function update(UpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        $validatedData['status'] = $validatedData['status'] == 0 ? Status::Incomplete : Status::Completed;

        $task = GetTaskByIDJob::dispatchSync($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task does not exist',
            ], 404);
        }

        $task->update($validatedData);

        return new Resource($task);
    }

    public function destroy($id)
    {
        $task = GetTaskByIDJob::dispatchSync($id);

        if (! $task) {
            return response()->json([
                'message' => 'Task does not exist',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task deleted',
        ], 404);
    }
    
}
