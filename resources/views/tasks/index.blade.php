<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        .add-button {
            display: inline-block;
            padding: 10px;
            background-color: #333;
            color: white;
            text-decoration: none;
        }

        .task {
            background-color: white;
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
        }

        button {
            padding: 6px 10px;
            cursor: pointer;
        }

        select {
            padding: 6px;
        }
    </style>
</head>
<body>

    <h1>Personal Task Manager</h1>

    <a class="add-button" href="{{ route('tasks.create') }}">Add New Task</a>

    <hr>

    @foreach ($tasks as $task)
        <div class="task">
            <h3>{{ $task->task_name }}</h3>

            <p>{{ $task->description }}</p>

            <p>Status: {{ $task->status }}</p>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="task_name" value="{{ $task->task_name }}">
    <input type="hidden" name="description" value="{{ $task->description }}">
    <input type="hidden" name="due_date" value="{{ $task->due_date }}">

    <select name="status">
        <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
    </select>

    <button type="submit">Update Status</button>
</form>

            <p>Due Date: {{ $task->due_date }}</p>

            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>

            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

        <hr>
    @endforeach

</body>
</html>