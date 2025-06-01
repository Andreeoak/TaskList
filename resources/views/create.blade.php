@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    @include('form', ['task' => null])
@endsection
