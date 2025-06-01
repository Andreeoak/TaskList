@extends('layouts.app')

@section('styles')
    <style>
        .error-msg {
            color: red;
            font-size: 0.875rem;
        }
    </style>
@endsection

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                value="{{ old('title', $task->title ?? '') }}"
            >
            @error('title')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="3"
            >{{ old('description', $task->description ?? '') }}</textarea>
            @error('description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea
                class="form-control"
                id="long_description"
                name="long_description"
                rows="3"
            >{{ old('long_description', $task->long_description ?? '') }}</textarea>
            @error('long_description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            @isset($task) Update Task @else Create Task @endisset
        </button>
        @if(!isset($task))
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
        @endif
    </form>
@endsection
