@extends('layouts.admin')

@section('title', 'Category list')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Category list
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right btn-sm" role="button"
                       style="margin: -5px;">Add +</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">edit</th>
                                <th scope="col">delet</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($categories) && is_object($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">3</th>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route("category.edit", $category->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route("category.destroy", $category->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
