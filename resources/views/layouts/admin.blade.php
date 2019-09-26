<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>Admin | @yield('title')</title>
    {{-- Bootstrap Core CSS --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/multiple-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/LineIcons.min.css') }}">
    @yield('style')
</head>
<body>
@auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('admin') }}">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio.index') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('feedback.index') }}">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team.index') }}">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('offer.index') }}">Offers</a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="lni-exit"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        {{-- Error massage --}}
        @if ($errors->any())
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        {{-- Error massage --}}

        {{-- success massage --}}
        @if(Session::has('status'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{Session::get('status')}}
                    </div>
                </div>
            </div>
        @endif
        {{-- success massage --}}

        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 class="page-header">
                    @yield('page-name')
                </h2>
            </div>
        </div>
        {{-- Content --}}
        @yield('content')
        {{-- Content --}}
    @else
        @yield('login-form')
    @endauth

    </div>
<script src="{{ asset('js/jquery-min.js') }}"></script>
{{-- jQuery UI --}}
@yield('script')
{{-- Bootstrap Core JavaScript --}}
    <div id="loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/multiple-select.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
