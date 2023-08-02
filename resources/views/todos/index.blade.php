@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks') }}</div>

                <div class="card-body">

                @if (Session::has("alert-success"))
                <div class="alert alert-success" role="alert">
                    {{ Session::get("alert-success") }}
                </div>
                @endif

                @if (count($todos) > 0)
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Functions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>        
                                <td>
                                <a class="btn btn-sm btn-info" href="{{ route('todos.show', $todo->id) }}">View</a>
                                <form action="">
                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                @else
                    <h5>No tasks added yet</h5>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
