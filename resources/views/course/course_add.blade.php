@section('course_add', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card text-md ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Add Course') }}</p>
                </div>
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <a href="{{ route('course.view') }}"><button type="button" class="btn btn-outline-info"
                            style="float: right;">{{ __('Go Back') }}</button></a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name : </label>
                            <input type="text" name="course_name" class="form-control">
                            @error('course_name')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Course Name Required') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description : </label>
                            <input type="text" name="description" class="form-control">
                            @error('description')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Course Description Required') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Image Related to Course : </label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Image is Required') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Course Price </label>
                            <input type="number" name="price" class="form-control">
                            @error('price')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Price is Required') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="status" value="1" class="form-control">
                <input type="hidden" name="instructor_id" value="1" class="form-control">
                <div class="col-4 my-2 mx-0">
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left:-6px;">
                        <i class="fas fa-plus px-1"></i>Add Course
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
