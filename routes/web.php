<?php

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\Response;
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

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/task/{id}', function ($id) {


    return view('/task', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' =>[ 'required','min:5','max:255'],
        'description' => 'required',
        'long_description' => 'required'
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');



// &  lekcija 33 Edit Form
