@section('assessment_add', 'active')
@section('assessment_child_operate', 'active')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    {{-- @dd($course); --}}
    <div class="card-header text-bold text-center mt-4">{{ $course->course_name }}</div>
    <div class="card-body mt-1">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('assessement.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    @if (auth()->user()->role == 'instructor')
                    <div class="card py-2" style="width:58.7rem; overflow-y: scroll;">
                    @else
                    <div class="card py-2" style="width:100%; overflow-y: scroll;">
                    @endif
                        <div class="item d-flex flex-wrap">
                            <div class="card-body item-material d-flex flex-wrap">
                                @if (count($course->assessments) > 0)
                                    <table class="table table-bordered"  id="item">
                                        <thead>
                                          <tr>
                                            <th scope="col">S.N</th>
                                            <th scope="col">Assessment Title</th>
                                            <th scope="col">Assessment Description</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col">Assessment File</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                    @foreach ($course->assessments as $key => $assessment)
                                        <tbody>
                                          <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$assessment->title}}</td>
                                            <td>{{$assessment->description}}</td>
                                            <td>{{$assessment->mark}}</td>
                                            <td><a href="{{URL::to('/'.'storage'.'/'.$assessment->files)}}" target="_blank">View File</a></td>
                                            @if(auth()->user()->role == 'learner')
                                            <td><a href="{{ route('assessement.submit.add', ['assessment_id' => $assessment->id]) }}"
                                                class="btn btn-primary" role="button">Submit Assessment</a></td>
                                            @else
                                            <td><a href="{{ route('assessement.submit.add', ['assessment_id' => $assessment->id]) }}"
                                                class="btn btn-primary" role="button">Manage Submits</a></td>
                                            @endif
                                          </tr>
                                        </tbody>
                                        @endforeach
                                      </table>
                                @else
                                    <div class="alert alert-danger col-12 text-center" role="alert">
                                        Assessments Not Added Yet !!
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                @if (auth()->user()->role == 'instructor')
                    <div class="col col-lg-3">
                        <div class="card bg-dark">
                            <div class="card-header text-bold">
                                Upload Assessments:
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <input type="hidden" name="status" value="1">
                                    <label for="title">Assessment Title</label>
                                    <input type="text" class="form-control" id="text" name="title"
                                        aria-describedby="textHelp" placeholder="Enter title">
                                    @error('title')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Assessment Title Required') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control text-wrap" id="description" name="description" placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Assessment Description Required') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Files Related to Assessments : </label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Files Required') }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mark" class="form-label">Marks: </label>
                                    <input type="number" name="mark" class="form-control">
                                    @error('mark')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Marks Required') }}
                                        </div>
                                    @enderror
                                </div>

                                <button style="float:right" class="btn btn-primary mt-2" type="submit">
                                    <span>&nbsp;Add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
