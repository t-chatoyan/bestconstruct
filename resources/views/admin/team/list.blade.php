@extends('layouts.admin')

@section('title', 'Team list')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-8 col-md-12 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    Team list
                    <a href="{{ route('team.create') }}" class="btn btn-primary float-right btn-sm" role="button"
                       style="margin: -5px;">Add +</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">first name</th>
                                <th scope="col">last name</th>
                                <th scope="col">profession</th>
                                <th scope="col">image</th>
                                <th scope="col">edit</th>
                                <th scope="col">delet</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($team_members))
                            @foreach($team_members as $team_member)
                                <tr>
                                    <th scope="row">3</th>
                                    <td>{{ $team_member->first_name }}</td>
                                    <td>{{ $team_member->last_name }}</td>
                                    <td>{{ $team_member->profession }}</td>
                                    <td><img width="150" src="{{ $team_member->photo_path }}" alt=""></td>
                                    <td><a href="{{ route("team.edit", $team_member->id) }}" class="btn btn-success btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route("team.destroy", $team_member->id) }}" method="post">
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
                    {{ $team_members->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
