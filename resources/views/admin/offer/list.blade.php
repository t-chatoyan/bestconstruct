@extends('layouts.admin')

@section('title', 'Offer list')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-10 col-md-12 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    Offer list
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">email</th>
                                <th scope="col">read</th>
                                <th scope="col">files name</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($offers))
                            @foreach($offers as $offer)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->phone_number }}</td>
                                    <td>{{ $offer->email }}</td>
                                    <td>
                                        <span>
                                            {{ $offer->is_read ? 'kardacac che' : 'kardacac e' }}
                                        </span>
                                    </td>
                                    <td>
                                        @foreach($offer->files as $file)
                                            <a href="{{ asset('offer_files') . '/' . $file->name }}" download>{{ $file->name }}</a></br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route("offer.destroy", $offer->id) }}" method="post">
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
                    {{ $offers->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
