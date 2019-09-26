@extends('layouts.admin')

@section('title', 'Add Slider')

@section('page-name', 'Add Slider')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Add Portfolio
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="add-image">New image</label>
                            <input type="file" name="image" id="add-image" class="filestyle" data-buttonBefore="true" data-buttonName="btn-primary">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Add images</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection