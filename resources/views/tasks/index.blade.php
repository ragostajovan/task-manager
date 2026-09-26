@extends('layouts.app')

@section('content')
    
   
        <table class="table table-bordered align-center">
            <thead class="table-secondary">
                <tr>
                    <th>Task Name</th>
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
                            <span class="badge {{ $task->status == 'Completed' ? 'bg-success' : 'bg-danger ' }}">
                                {{ $task->status }}
                            </span>
                        </td>
                        <td class="text-nowrap">
                            <form action="{{ route('tasks.status', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success">
                                    {{ $task->status == 'Pending' ? 'Mark Completed' : 'Mark Pending' }}
                                </button>
                            </form>

                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete task?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center" style="color: gray;">no task available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
  
<a href="{{ route('tasks.create') }}" class="btn btn-primary mt-3"> Add Task</a>
@endsection