@extends('layouts.app')

@section('title')
    Task Details
@endsection
@section('content')
    <div>
        <h2>{{ $task->title }}</h2>
        <p class="mb-4 text-slate-700">{{ $task->description }}</p>
        @if($task->long_description)
            <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
        @else
            <p class="mb-4 text-slate-700">No long description provided.</p>
        @endif
        <p class="mb-4 text-sm text-slate-500">{{ $task->created_at->diffForHumans()}} • {{ $task->updated_at->diffForHumans()}}</p>
    </div>

     <p class="mb-4 text-sm">
        @if ($task->completed)
        <span class="text-green-500">Completed</span>

        @else
        <span class="text-red-500">Not completed</span>
        @endif
    </p>

   <div class="flex gap-2 items-center mb-2">
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
        </form>

        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
            class="btn">Edit Task</a>
        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete Task</button>
        </form>
    </div>

    <div>
        <a href="{{ route('tasks.index') }}"
        class="link">Back to Task List</a>
    </div>
@endsection
