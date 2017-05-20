@extends('layouts.app')

@section('content')
    @if (Auth::check())
{{--    {{ dump($day) }}--}}

    <div class="container">

        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <form method="POST" action="/archive">
                    <h4>Search Data</h4>
                    <div class="form-group">
                        <input type="date" name="search" value="{{ date("Y-m-d") }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>

        <div class="row">

                <h1>Archiv List</h1>

                <table class="table-hover" style="width: 100%;">
                    <thead>
                    <tr>
                        <th style="width: 20%;">Task title</th>

                        <th style="width: 50%;">Description</th>

                        <th>Create</th>

                        <th>Update</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($archiv as $task)
                        <tr>

                            <td>
                                {{$task->title}}
                            </td>

                            <td>
                                {{$task->description}}
                            </td>

                            <td>
                                {{ substr($task->created_at, 0, 10) }}</td>

                            <td>
                                {{$task->updated_at}}
                            </td>

                        </tr>

                    @endforeach</tbody>
                </table>
        </div>
        @else
{{--            {{ redirect()->route('home') }}--}}

            <div class="row">
                <div class="col-md-3 col-md-offset-4">
                    <p>You need to log in.</p>
                    <a href="/login">Click here to login</a>
                </div>
            </div>
        @endif

    </div>

@endsection