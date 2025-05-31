@extends('layouts.app')

@section( 'styles')
    <style>
    .error-msg{
        color: red;
        font-size: 0.875rem;
    }
    </style>
@endsection

@section('title', 'Create Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value = "{{old("title")}}">
            @error('title')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" value = "{{old("description")}}"></textarea>
            @error('description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="3" value = "{{old("long_description")}}"></textarea>
            @error('long_description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
