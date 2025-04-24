<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $tasks->title }}" placeholder="Title">
        <input type="text" name="description" value="{{ $tasks->description }}" placeholder="Description">
        <button type="submit">Update</button>
    </form>
</body>
</html>