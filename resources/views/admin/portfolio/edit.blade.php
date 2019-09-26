@extends('layouts.admin')

@section('title', 'Edit Portfolio')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Edit Portfolio: {{ $portfolio->name }}
                </div>
                <div class="card-body">
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ $portfolio->name, old('name') }}" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category">
                                @if(isset($categories) && is_object($categories))
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $portfolio->description, old('description') }}</textarea>
                        </div>
                        <input type="hidden" name="old_category_ids[]" id="old_category_ids" value="@foreach($portfolio->categories as $category){{$category->id.','}}@endforeach">
                        <input type="hidden" name="category_ids[]" id="category_ids">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            @foreach($portfolio->images as $image)
                                <div class="d-inline-block position-relative @if($image->is_main === 1) {{ 'border-mean-img' }} @endif">
                                    <img width="150" height="135" src="{{ $image->photo_path }}" alt="">
                                    <button data-id="{{ $image->id }}" onclick="return confirm('Are you sure?')" type="button" class="btn-delete-img btn-danger btn">
                                        x
                                    </button>
                                    <a data-id="{{ $image->id }}" class="make-mean-btn">Make to mean</a>
                                </div>
                            @endforeach
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

