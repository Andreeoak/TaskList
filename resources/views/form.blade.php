@extends('layouts.app')


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
                @class(['border-red-500' => $errors->has('title')])
                id="title"
                name="title"
                value="{{ old('title', $task->title ?? '') }}"
            >
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea
                @class(['border-red-500' => $errors->has('description')])
                id="description"
                name="description"
                rows="3"
            >{{ old('description', $task->description ?? '') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
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
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button type="submit" class="btn btn-primary">
                @isset($task) Update Task @else Create Task @endisset
            </button>

            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>
@endsection
