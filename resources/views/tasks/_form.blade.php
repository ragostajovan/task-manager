<div style="margin-bottom: 15px;">
    <label>Task Name</label><br>
    <input type="text" name="task_name"
           style="width: 100%; padding: 8px; margin-top: 5px;"
           value="{{ old('task_name', $task->task_name ?? '') }}">
    @error('task_name')
        <div style="color: red; font-size: 13px;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 15px;">
    <label>Description</label><br>
    <textarea name="description" rows="3"
              style="width: 100%; padding: 8px; margin-top: 5px;">{{ old('description', $task->description ?? '') }}</textarea>
</div>

<div style="margin-bottom: 15px;">
    <label>Due Date</label><br>
    <input type="date" name="due_date"
           style="width: 100%; padding: 8px; margin-top: 5px;"
           value="{{ old('due_date', isset($task) ? $task->due_date->format('Y-m-d') : '') }}">
    @error('due_date')
        <div style="color: red; font-size: 13px;">{{ $message }}</div>
    @enderror
</div>

<div style="margin-bottom: 15px;">
    <label>Status</label><br>
    <select name="status" style="width: 100%; padding: 8px; margin-top: 5px;">
        @foreach (['Pending', 'Completed'] as $s)
            <option value="{{ $s }}"
                {{ old('status', $task->status ?? 'Pending') == $s ? 'selected' : '' }}>
                {{ $s }}
            </option>
        @endforeach
    </select>
</div>