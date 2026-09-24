<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #e5e5e5;
        }

        .form-box {
            background-color: #f7f7f7;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #cfcfcf;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-top: 10px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #aaa;
            border-radius: 5px;
            background-color: white;
            font-size: 14px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .button {
            background-color: #666;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #444;
        }

        .back {
            display: inline-block;
            margin-top: 18px;
            color: #555;
            text-decoration: none;
        }

        .back:hover {
            color: #222;
        }
    </style>
</head>

<body>

    <div class="form-box">

        <h1>Add New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label>Task Name:</label>
            <input type="text" name="task_name"
                   placeholder="Enter your task" required>

            <label>Description:</label>
            <textarea name="description"
                      placeholder="Enter task description"></textarea>

            <label>Status:</label>
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>

            <label>Due Date:</label>
            <input type="date" name="due_date">

            <button class="button" type="submit">
                Add Task
            </button>
        </form>

        <a class="back" href="{{ route('tasks.index') }}">
            ← Back to Tasks
        </a>

    </div>

</body>
</html>