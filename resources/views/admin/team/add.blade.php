@extends('layouts.admin')

@section('title', 'Team add')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Add Team
                </div>
                <div class="card-body">
                    <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="last_name">Profession</label>
                            <input type="text" class="form-control" value="{{ old('profession') }}" id="profession" name="profession" placeholder="profession">
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
@section('script')
    <script>
        $(document).ready(function () {
            var category = $('#category');
            category.multipleSelect();
            var val = category.multipleSelect('getSelects');
            $('#category_ids').val(val);
            category.change(function () {
                val = category.multipleSelect('getSelects');
                $('#category_ids').val(val);
            });
        });
    </script>
@endsection