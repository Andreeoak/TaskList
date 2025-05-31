@extends('layouts.app')
@section('title')
    List of tasks
@endsection

@section('content')
<div>
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
@endsection
