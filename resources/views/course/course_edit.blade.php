@section('course_add', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
<div class="card" style="overflow-y: scroll; height: 100%; margin-left: -15px;">
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Edit Course') }}</p>
                </div>
            </div>
        </div>
        <div class="container mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="{{ route('course.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <input type="hidden" name="course" value="{{ $course->id }}">
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" name="instructor_id" value="{{auth()->user()->id}}">
                                <label for="course_name" class="form-label">Course Name : </label>
                                <input type="text" name="course_name" value="{{ $course->course_name }}"
                                    class="form-control">
                                @error('course_name')
                                    <div class="alert alert-light text-danger" role="alert">
                                        {{ __('Course Name Required') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description : </label>
                                <textarea type="text" name="description" class="form-control">{{ $course->description }}</textarea>
                                    
                                @error('description')
                                    <div class="alert alert-light text-danger" role="alert">
                                        {{ __('Course Description Required') }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="type" class="form-label">Image Related to Course: </label>
                            <input type="file" name="image" value="{{ $course->image }}" class="form-control">
                            <img style="width:275px;height:140px;margin-left:450px;margin-top:-50px;"
                                src='{{ asset('storage/' . $course->image) }}'>
                            @error('image')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Image Required') }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Course Price : </label>
                            <input type="text" name="price" value="{{ $course->price }}" class="form-control">
                            @error('price')
                                <div class="alert alert-light text-danger" role="alert">
                                    {{ __('Course Price Required') }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 my-2 mx-0">
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-left:-6px;"
                            onclick="return confirm('Are you Sure ?')">
                            <i class="fas fa-plus px-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
