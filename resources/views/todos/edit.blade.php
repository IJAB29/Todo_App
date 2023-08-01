@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Todo') }}</div>

                <div class="card-body">

                <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea cols="5" rows="5" class="form-control" name="description">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
