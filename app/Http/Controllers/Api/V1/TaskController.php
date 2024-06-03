<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Resourceを使ってデータを返す
        return TaskResource::collection(Task::with('priority')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //リクエストのバリデーションを通過したデータを保存
        $task = Task::create($request->validated());
        //リレーションをロード
        $task->load('priority');

        //Resourceを使ってデータを返す
        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //Resourceを使って特定のデータを返す
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //リクエストのバリデーションを通過したデータで更新
        $task->update($request->validated());

        //Resourceを使ってデータを返す
        return TaskResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //データを削除
        $task->delete();
        //空のデータを返す
        return response()->noContent();
    }
}
