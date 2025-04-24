<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h1>Welcome To the Task management</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Submit</button>
    </form>
    @forelse($tasks as $task)
        <p>{{ $task->title }}</p>
        <p>{{ $task->description }}</p>
        <form action="{{ route('tasks.edit', $task->id) }}" method="GET">
            @csrf
            <button type="submit">Edit</button>
        </form>
        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">DELETE</button>
        </form>
        @empty
            <p>No data</p>
    @endforelse
</body>
</html>