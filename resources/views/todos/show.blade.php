@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Task Details') }}</div>

                <form method="POST" action="{{ route('todos.update', $todo->id) }}">
                @csrf                

                    <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea cols="5" rows="5" class="form-control" name="description" value="">{{ $todo->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status">
                            <option value="pending" {{ $todo->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="done" {{ $todo->status === 'done' ? 'selected' : '' }}>Done</option>
                            <option value="cancelled" {{ $todo->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
