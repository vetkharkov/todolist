@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Edit the Task</h1>

                <form method="POST" action="/task/{{ $task->id }}">

                    <h4>Title</h4>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{$task->title }}">
                    </div>

                    <h4>Description</h4>
                    <div class="form-group">
                        <textarea name="description" class="form-control">{{$task->description }}</textarea>
                    </div>

                    <h4>Data</h4>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control" value="{{ substr($task->created_at, 0, 10) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary">Update task</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>

@endsection