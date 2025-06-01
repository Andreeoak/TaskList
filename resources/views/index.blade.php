@extends('layouts.app')
@section('title')
    List of tasks
@endsection

@section('content')
<nav class="mb-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="{{ route('tasks.create') }}" class="link">Create New Task</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',  $task->id) }}"
                @class(['line-through' => $task->completed])>{{$task->title}}</a>
        </div>
    @empty
        <div>
            No tasks found.
        </div>
    @endforelse
</nav>

@if($tasks->hasPages())
    <nav class="mt-16">
        {{ $tasks->links() }}
    </nav>
@endif
@endsection
