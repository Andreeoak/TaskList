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
