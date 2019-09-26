@extends('layouts.admin')

@section('title', 'Edit Feedback')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Edit Feedback: {{ $feedback->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('feedback.update', $feedback->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" value="{{ $feedback->first_name, old('first_name') }}" id="name" name="first_name" aria-describedby="emailHelp" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" value="{{ $feedback->last_name, old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Position</label>
                            <input type="text" class="form-control" value="{{ $feedback->position, old('position') }}" id="position" name="position" placeholder="position">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $feedback->description, old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <img width="150" src="{{ $feedback->photo_path }}" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection