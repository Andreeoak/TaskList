@extends('layouts.app')
@section('title')
    List of tasks
@endsection

@section('content')
<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="{{ route('tasks.create') }}">Create New Task</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',  $task->id) }}">{{$task->title}}</a>
        </div>
    @empty
        <div>
            No tasks found.
        </div>
    @endforelse
</div>

@if($tasks->hasPages())
    <div>
        {{ $tasks->links() }}
    </div>
@endif
@endsection
