<div class="mb-3">
    <label class="form-label">Task Name</label>
    <input type="text" name="task_name"
           class="form-control @error('task_name') is-invalid @enderror"
           value="{{ old('task_name', $task->task_name ?? '') }}">
    @error('task_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" rows="3"
              class="form-control">{{ old('description', $task->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Due Date</label>
    <input type="date" name="due_date"
           class="form-control @error('due_date') is-invalid @enderror"
           value="{{ old('due_date', isset($task) ? $task->due_date->format('Y-m-d') : '') }}">
    @error('due_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-select">
        @foreach (['Pending', 'Completed'] as $s)
            <option value="{{ $s }}"
                {{ old('status', $task->status ?? 'Pending') == $s ? 'selected' : '' }}>
                {{ $s }}
            </option>
        @endforeach
    </select>
</div>