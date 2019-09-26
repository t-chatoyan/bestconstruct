@extends('layouts.admin')

@section('title', 'Feedback list')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Feedback list
                    <a href="{{ route('feedback.create') }}" class="btn btn-primary float-right btn-sm" role="button"
                       style="margin: -5px;">Add +</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">first name</th>
                                <th scope="col">last name</th>
                                <th scope="col">image</th>
                                <th scope="col">position</th>
                                <th scope="col">description</th>
                                <th scope="col">edit</th>
                                <th scope="col">delet</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($feedbacks))
                            @foreach($feedbacks as $feedback)
                                <tr>
                                    <th scope="row">3</th>
                                    <td>{{ $feedback->first_name }}</td>
                                    <td>{{ $feedback->last_name }}</td>
                                    <td>{{ $feedback->position }}</td>
                                    <td>{{ $feedback->description }}</td>
                                    <td><img width="150" src="{{ $feedback->photo_path }}" alt=""></td>
                                    <td><a href="{{ route("feedback.edit", $feedback->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route("feedback.destroy", $feedback->id) }}" method="post">
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
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
