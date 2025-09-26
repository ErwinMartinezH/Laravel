<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 11 CRUD Example</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $tasks->links() !!}

</div>

</body>
</html>