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
                    <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
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
                        <input type="hidden" name="category_ids[]" id="category_ids">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="images[]" multiple>
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