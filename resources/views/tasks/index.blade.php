<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Index</title>
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4 text-center">Welcome To Task Management</h1>

        <!-- Task Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter description" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Task List -->
        @forelse($tasks as $task)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <div class="mb-3">
                        <label class="form-label">Status</label><br>
                        <div class="form-check form-check-inline">
                            <form action="{{ route('tasks.status',$task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="is_completed" value="0">
                                <input class="form-check-input" type="checkbox" name="is_completed" value="1" {{ $task->is_completed ? 'checked' : '' }} onchange="this.form.submit();">
                            </form>
                            @if($task->is_completed)
                                <label class="form-check-label">Completed</label>
                            @else
                                <label class="form-check-label">Incomplete</label>
                            @endif
                        </div>
                    </div>
                    <p class="card-text">{{ $task->description }}</p>

                    <div class="d-flex gap-2">
                        <form action="{{ route('tasks.edit', $task->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">No tasks available.</p>
        @endforelse
    </div>
</body>
</html>