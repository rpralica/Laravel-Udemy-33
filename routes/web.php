<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::all()]);
})->name('tasks.index');

Route::view('/create', 'create')->name('tasks.create');

Route::get('/edit/{task}', function (Task $task) {
    return view('/edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {


    return view('/task', ['task' => $task]);
})->name('tasks.show');




Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::post('/tasks', function (TaskRequest $request) {
    $task=Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task]);
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

   $task->update($request->validated());
    return redirect()->route('tasks.index');
})->name('tasks.update');

//!  lekcija 33 Edit Form
