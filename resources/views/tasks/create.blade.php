@extends('layouts.app')

@section('content')
    <h3> add task </h3>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        @include('tasks._form')
        <button type="submit" class="btn btn-blue">Save</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-gray">Cancel</a>
    </form>
@endsection