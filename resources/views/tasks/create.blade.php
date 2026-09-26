@extends('layouts.app')

@section('content')
    <h3>Add Task</h3>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        @include('tasks._form')
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection