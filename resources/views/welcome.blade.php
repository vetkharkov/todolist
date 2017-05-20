@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())
            <h1>Tasks List</h1>
            <a href="/task" class="btn btn-primary">Add new Task</a>
            <a href="/archive" class="btn btn-primary">Archive</a>

            <table class="table-hover" style="width: 100%;">
                <thead>
                <tr>
                    <th style="width: 20%;">Task title</th>

                    <th style="width: 40%;">Description</th>

                    <th>Create</th>

                    <th>Update</th>
                </tr>

                </thead>
                <tbody>
                @foreach($user->tasks as $task)
                    <tr>

                        <td>
                            {{$task->title}}
                        </td>

                        <td>
                            {{$task->description}}
                        </td>

                        <td>
                            {{ substr($task->created_at, 0, 10) }}
                        </td>

                        <td>
                            {{$task->updated_at}}
                        </td>

                        <td>

                            <form action="/task/{{$task->id}}">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete
                                </button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>

                @endforeach</tbody>
            </table>
        @else
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-4">
                        <p>You need to log in.</p>
                        <a href="/login">Click here to login</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection