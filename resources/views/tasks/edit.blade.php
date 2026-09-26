@extends('layouts.app')

@section('content')
    <h3>Edit Task</h3>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        @include('tasks._form')
        <button type="submit" class="btn btn-blue">Update</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-gray">Cancel</a>
    </form>
@endsection