@section('course_view', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="overflow-y: scroll; height: 100%; margin-left: -15px;">
        <div class="card-header">
            <h3 class="card-title">Course List</h3>
            @if ($role == 'instructor')
                <a href="{{ route('course.add') }}"><button type="button" class="float-right btn btn-outline-primary" style="float: right;">
                        <i class="fa fa-plus"></i> {{ __('Add New') }}</button>
                </a>
                
            @endif
        </div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <div class="mx-auto pull-right">
                        @if ($role == 'instructor')
                            <form action="{{ route('course.search') }}" method="GET" role="search">
                                <div class="input-group">
                                    <span class="input-group-btn mr-3 mt-1">
                                        <button class="btn btn-info" type="submit" title="Search Courses">
                                            <span class="fas fa-search"></span>
                                        </button>
                                    </span>
                                    <input type="text" class="form-control mr-2" name="search"
                                        placeholder="Search Courses" oninput="add_element_to_array()" id="search"
                                        value="{{ request('search') }}">
                                    <a href="{{ route('course.view') }}" class=" mt-1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button" title="Refresh page">
                                                <span class="fas fa-sync-alt"></span>
                                            </button>
                                        </span>
                                    </a>
                                </div>
                            </form>
                        @else
                            <nav class="navbar navbar-light bg-light ">
                                <input class="form-control sm-4 quicksearch" name="quicksearch" type="text"
                                    placeholder="Search" aria-label="Search" id="quicksearch" autofocus>
                            </nav>
                        @endif
                </div>
            </div>
            <!-- /.card-header -->
            <div class="item d-flex flex-wrap">
                <div class="card-body item-material d-flex flex-wrap" id="item">
                    @if (count($data))
                        @foreach ($data as $key => $course)
                            <div class="card-deck" style="width: 20rem;">
                                <div class="card mt-2 mb-2 mr-4">
                                    @if ($role == 'instructor')
                                        <div class="card-header">
                                            <h5 class="mt-2 text-center">
                                                <a href="{{ route('course.edit', $course->id) }}"><button type="button"
                                                        class="btn btn-sm btn-outline-primary">Edit</button></a>
                                                <a href="{{ route('course.delete', $course->id) }}"><button type="button"
                                                        class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Are you Sure ?')">Delete</button></a>
                                            </h5>
                                        </div>
                                    @endif
                                    <img height="225px" width="100%" src="/storage/{{ $course->image }}"
                                        style="border:none;">
                                    </img>
                                    <div class="card-body">
                                        <p class="card-text"><small class="text-muted">{{ $course->course_name }}</small>
                                        </p>
                                        {{-- <p class="card-text"><small class="text-muted">{{ $course->created_at }}</small>
                                        </p> --}}
                                        <a href="{{ route('course.detail', $course->id) }}" class="btn btn-primary">View
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="alert alert-primary col-12 text-center" role="alert">
                        Oops !! Data Not Found !!
                    </div>
                    @endif
                </div>
            </div>
            <!-- /.card-body -->
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
