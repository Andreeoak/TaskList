<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
//php artisan route:list




Route::get('/', function() {
    return redirect()->route('tasks.index');
})->name('welcome');

Route::get('/tasks', function ()  {
    return view('index', ['tasks' => Task::latest()->get()]); // Use Eloquent to fetch all tasks
})->name('tasks.index');


Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id)  {
    return view('edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');


//Indexblade redireciona para view chamada tasks.show. task.show precisa receber o id da task para formar a url.
//Ele aproveita e usa o valor de id recebido para buscar a task no array $tasks.
Route::get('/tasks/{id}', function ($id)  {
    return view('show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'long_description' => 'nullable|string|max:2000',
    ]);
    $task =  new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null;
    $task->completed = false; // Default value for new tasks
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function (Request $request, $id) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'long_description' => 'nullable|string|max:2000',
    ]);
    $task =  Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'] ?? null;
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');




