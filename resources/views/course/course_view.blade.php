@section('course_view', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Course List</h3>
            <a href="{{ route('course.add') }}"><button class="float-right btn btn-primary" style="float: right;">
                    <i class="fa fa-plus"> Add New</i>
                </button>
            </a>
        </div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3">
                <div class="mx-auto pull-right">
                    <div class="">
                        <form action="{{ route('course.search') }}" method="GET" role="search">

                            <div class="input-group">
                                <span class="input-group-btn mr-3 mt-1">
                                    <button class="btn btn-info" type="submit" title="Search Courses">
                                        <span class="fas fa-search"></span>
                                    </button>
                                </span>
                                <input type="text" class="form-control mr-2" name="search" placeholder="Search Courses"
                                    oninput="add_element_to_array()" id="search" value="{{ request('search') }}">
                                <a href="{{ route('course.view') }}" class=" mt-1">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt"></span>
                                        </button>
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="d-flex justify-content-around flex-wrap">
                @if ($data->isNotEmpty())
                    @foreach ($data as $key => $item)
                        {{-- @dd($item); --}}

                        <div class="card text-center">
                            <div class="card-header">
                                <h5 class="mt-2 text-center">
                                    <a href="{{ route('course.edit', $item->id) }}"><button type="button"
                                            class="btn btn-sm btn-outline-primary">Edit</button></a>
                                    <a href="{{ route('course.delete', $item->id) }}"><button type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Are you Sure ?')">Delete</button></a>
                                </h5>
                            </div>
                            <div class="card-body">
                                <img style="width:20rem; height:10rem;" class="card-img-top"
                                    src="/storage/{{ $item->image }}"><br>
                                <a href="#" class="btn btn-primary mt-2">Rs.{{ $item->price }}/-</a>
                            </div>
                            <div class="card-footer text-muted text-bold text-wrap"
                                style="max-width: 400px;min-height:100px;">
                                <h3 class="mt-1">{{ $item->course_name }}</h3>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No Courses found</h2>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
