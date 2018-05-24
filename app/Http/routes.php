<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('/', function () {
    //получить все задачи
    $tasks = Task::all();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('/task', function (Request $request) {
    //проверка данных 
    $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }
    $task = new Task();
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});

/**
 * Удалить задачу
 */
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect('/');
});

/**
 * Окно редактирования
 */
Route::post('/taskedit/{task}', function (Task $task) {
//    return view('taskedit')->with('editable_task_name', $task->name);
    return view('taskedit')->with([
                'editable_task_id' => $task->id,
                'editable_task_name' => $task->name
    ]);
});

/**
 * Сохранение изменений
 */
Route::post('/tasksave/{task}', function (Request $request) {
    //проверка данных 
    $validator = Validator::make($request->all(), [
                'name' => 'required|min:5|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
    }
    $task= Task::find($request->id);
    $task->name = $request->name;
    $task->save();
    return redirect('/');
});
