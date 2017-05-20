@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Add New Task</h1>

                <form method="POST" action="/task">

                    <h4>Title</h4>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"></input>
                    </div>

                    <h4>Description</h4>
                    <div class="form-group">
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <h4>Data</h4>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control" value="{{ date("Y-m-d") }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection