@extends('layouts.app')

@section('title')
    Task Details
@endsection
@section('content')
    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2>{{ $task->title }}</h2>
        <p>{{ $task->description }}</p>
        <p>Created at: {{ $task->created_at }}</p>
        <p>Updated at: {{ $task->updated_at }}</p>
    </div>
    <div>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Task</button>
        </form>
    </div>
    <div>
        <a href="{{ route('tasks.index') }}">Back to Task List</a>
    </div>
@endsection
