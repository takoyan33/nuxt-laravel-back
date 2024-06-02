<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;
use App\Models\Task;

class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Task $task)
    {
        //タスクの状態を変化させる
        $task->is_completed = $request->is_completed;
        $task->save();

        // 値を返す
        return TaskResource::make($task);
    }
}
