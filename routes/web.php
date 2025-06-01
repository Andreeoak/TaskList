<?php


use Illuminate\Support\Facades\Route;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
//php artisan route:list




Route::get('/', function() {
    return redirect()->route('tasks.index');
})->name('welcome');


Route::get('/tasks', function ()  {
    return view('index', ['tasks' => Task::latest()->paginate()]); // Pass the number os tasks to paginate
})->name('tasks.index');


Route::view('/tasks/create', 'create')->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task)  {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');


//Indexblade redireciona para view chamada tasks.show. task.show precisa receber o id da task para formar a url.
//Ele aproveita e usa o valor de id recebido para buscar a task no array $tasks.
Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');


Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated()); // Create a new task using the validated data
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');


Route::put('/tasks/{task}', function (TaskRequest $request, Task $task) {

    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', "Task $task->title deleted successfully!");
})->name('tasks.destroy');



route::put('/tasks/{task}/complete', function (Task $task) {
    $task->toggleCompletion(); // Call the method to mark the task as completed
    $msg = $task->completed ? 'completed' : 'not completed';
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task $task->title marked as $msg!");
})->name('tasks.toggle-complete');


