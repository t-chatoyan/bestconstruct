@extends('layouts.admin')

@section('title', 'Portfolio list')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    Portfolio list
                    <a href="{{ route('portfolio.create') }}" class="btn btn-primary float-right btn-sm" role="button"
                       style="margin: -5px;">Add +</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th scope="col">category</th>
                                <th scope="col">edit</th>
                                <th scope="col">delet</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($portfolios))
                            @foreach($portfolios as $portfolio)
                                <tr>
                                    <th scope="row">3</th>
                                    <td>{{ $portfolio->name }}</td>
                                    <td>{{ $portfolio->description }}</td>
                                    <td>
                                        @foreach($portfolio->images as $image)
                                            @if($image->is_main === 1)
                                                <span>
                                                    <img src="{{ $image->photo_path }}" width="150" alt="">
                                                </span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($portfolio->categories as $category)
                                            <p>{{ $category }}</p>
                                        @endforeach
                                    </td>
                                    <td><a href="{{ route("portfolio.edit", $portfolio->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route("portfolio.destroy", $portfolio->id) }}" method="post">
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
