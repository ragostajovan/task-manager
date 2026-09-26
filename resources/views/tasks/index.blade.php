@extends('layouts.app')

@section('content')
    <h3> Tasks</h3>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date->format('M d, Y') }}</td>
                    <td>
                        <span class="badge {{ $task->status == 'Completed' ? 'badge-completed' : 'badge-pending' }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('tasks.status', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-green"style= cursor:pointer;>
                                {{ $task->status == 'Pending' ? 'Mark Completed' : 'Mark Pending' }}
                            </button>
                        </form>

                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-blue" style=text-decoration:none;>Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Delete task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-red" style= cursor:pointer;> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: gray;">No tasks.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}"  button class="btn btn-blue" style="margin-top: 15px; text-decoration: none; display: inline-block;"> Add Task</a>
@endsection