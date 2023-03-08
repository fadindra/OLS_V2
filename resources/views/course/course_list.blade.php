{{-- @section('course_view', 'active')
@section('course_child_operate', 'menu-open') --}}
@extends('layout.config')
{{-- @section('sidebar')
    @include('layout.sidebar')
@endsection --}}

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Learning System</title>
        {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="{{ route('homepage') }}">Online Learning System</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#courses">Courses Offered</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="card" style="margin-top:50px;">
            <div class="card-body mt-1">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="mb-3">
                    <div class="mx-auto pull-right">
                        <div class="card">
                            <div class="card-header">
                                <nav class="navbar navbar-light bg-light ">
                                    <input class="form-control sm-4 quicksearch" name="quicksearch" type="text"
                                        placeholder="Search" aria-label="Search" id="quicksearch" autofocus>
                                    {{-- <button onhover="document.getElementById('quicksearch').value = ''">Clear</button> --}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Newly Added --}}
                <div class="item d-flex flex-wrap">
                    <div class="card-body item-material d-flex flex-wrap" id="item">
                        @if ($data->isNotEmpty())
                            @foreach ($data as $key => $course)
                                <div class="card-deck" style="width: 20rem;">
                                    <div class="card mt-2 mb-2 mr-4 px-2">
                                        <iframe height="225px" width="100%" src="/storage/{{ $course->image }}"
                                            style="border:none;">
                                        </iframe>
                                        <div class="card-body">
                                            <p class="card-text"><small
                                                    class="text-muted">{{ $course->course_name }}</small>
                                            </p>
                                            <p class="card-text"><small
                                                    class="text-muted">{{ $course->created_at->diffForHumans() }}</small>
                                            </p>
                                            <a href="{{ route('course.detail', $course->id) }}" class="btn btn-primary">View
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <tr>
                                <th class="text-center">No data found</th>
                            </tr>
                        @endif
                    </div>
                </div>



            </div>
            <!-- /.card -->
        </div>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#quicksearch").on("input", function() {
                var value = $(this).val();
                $("#item div").filter(function() {
                    $(this).toggle($(this).text().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>
