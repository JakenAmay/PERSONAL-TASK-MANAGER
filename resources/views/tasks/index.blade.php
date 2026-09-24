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
            background-color: #e5e5e5;
        }

        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 25px;
        }

        .add-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #666;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-button:hover {
            background-color: #444;
        }

        .task {
            background-color: #f7f7f7;
            padding: 20px;
            margin-top: 15px;
            border-radius: 8px;
            border: 1px solid #cfcfcf;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .task h3 {
            color: #444;
        }

        .task p {
            color: #555;
        }

        button {
            padding: 7px 12px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #666;
            color: white;
        }

        button:hover {
            background-color: #444;
        }

        select {
            padding: 7px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .edit-link {
            color: #555;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <h1>Personal Task Manager</h1>

    <a class="add-button" href="{{ route('tasks.create') }}">
        Add New Task
    </a>

    <hr>

    @foreach ($tasks as $task)

        <div class="task">

            <h3>{{ $task->task_name }}</h3>

            <p>{{ $task->description }}</p>

            <p>Status: {{ $task->status }}</p>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="task_name"
                       value="{{ $task->task_name }}">

                <input type="hidden" name="description"
                       value="{{ $task->description }}">

                <input type="hidden" name="due_date"
                       value="{{ $task->due_date }}">

                <select name="status">
                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>

                <button type="submit">Update Status</button>
            </form>

            <p>Due Date: {{ $task->due_date }}</p>

            <a class="edit-link"
               href="{{ route('tasks.edit', $task->id) }}">
                Edit
            </a>

            <form action="{{ route('tasks.destroy', $task->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>

            </form>

        </div>

    @endforeach

</body>
</html>