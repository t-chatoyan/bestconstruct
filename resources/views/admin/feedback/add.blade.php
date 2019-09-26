@extends('layouts.admin')

@section('title', 'Portfolio add')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Add Portfolio
                </div>
                <div class="card-body">
                    <form action="{{ route('feedback.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" value="{{ old('first_name') }}" id="name" name="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Position</label>
                            <input type="text" class="form-control" value="{{ old('position') }}" id="position" name="position" placeholder="position">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection