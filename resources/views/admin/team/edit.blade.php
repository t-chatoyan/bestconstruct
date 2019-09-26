@extends('layouts.admin')

@section('title', 'Edit Team member')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Edit Team member: {{ $team_member->first_name .' '. $team_member->last_name}}
                </div>
                <div class="card-body">
                    <form action="{{ route('team.update', $team_member->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" value="{{ $team_member->first_name, old('first_name') }}" id="name" name="first_name" aria-describedby="emailHelp" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" value="{{ $team_member->last_name, old('last_name') }}" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">profession</label>
                            <input type="text" class="form-control" value="{{ $team_member->profession, old('profession') }}" id="profession" name="profession" placeholder="profession">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <img width="150" src="{{ $team_member->photo_path }}" alt="">
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
            var old_val = $('#old_category_ids').val().split(',');
            var category = $('#category');
            old_val.pop();
            category.multipleSelect();
            category.multipleSelect('setSelects', old_val);
            var val = category.multipleSelect('getSelects');
            $('#category_ids').val(val);
            category.change(function () {
                val = category.multipleSelect('getSelects');
                $('#category_ids').val(val);
            });

            $(document).on('click', '.btn-delete-img', function () {
                var vm = $(this);
                var id = vm.data('id');

                $.ajax({
                    url: "/admin/delete-img/" + id,
                    method: 'GET',
                    success: function (data) {
                        vm.parent().remove();
                        alert(data.message);
                    }
                });
            });
            $(document).on('click', '.make-mean-btn', function () {
                var vm = $(this);
                var id = vm.data('id');

                $.ajax({
                    url: "/admin/make-mean-img/" + id,
                    method: 'GET',
                    success: function (data) {
                        alert(data.message);
                        $('.border-mean-img').removeClass('border-mean-img');
                        vm.parent('div').addClass('border-mean-img');
                    }
                });
            });
        });
    </script>
@endsection

