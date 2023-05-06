@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="height: 38.7rem;">
        <div class="card-header text-center"></div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('assessement.submit.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        @if (auth()->user()->role == 'learner')
                            <div class="card py-2" style="width:58.7rem; overflow-y: scroll;">
                            @else
                                <div class="card py-2" style="width:100%; overflow-y: scroll;">
                        @endif
                        <div class="item d-flex flex-wrap">
                            <div class="card-body item-material d-flex flex-wrap">
                                <table class="table table-bordered" id="item">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N</th>
                                            @if (auth()->user()->role == 'instructor')
                                                <th scope="col">Submitted By</th>
                                            @endif
                                            <th scope="col">Submission Title</th>
                                            <th scope="col">Submission File</th>
                                            <th scope="col">Marks Obtained</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assessement_submits as $key => $assessment_submit)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                @if (auth()->user()->role == 'instructor')
                                                    <th scope="row">{{ $assessment_submit->name }}</th>
                                                @endif
                                                <td>{{ $assessment_submit->title }}</td>
                                                <td><a href="{{ URL::to('/' . 'storage' . '/' . $assessment_submit->files) }}"
                                                        target="_blank">View File</a></td>
                                                <td>{{ $assessment_submit->marks_obtained }}</td>
                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                @if (auth()->user()->role == 'learner')
                    <div class="col col-lg-3">
                        <div class="card bg-dark">
                            <div class="card-header text-bold">
                                Submission of Assessments:
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
                                    <input type="hidden" name="learner_id" value="{{ auth()->user()->id }}">
                                    <label for="title">Submission Title</label>
                                    <input type="text" class="form-control" id="text" name="title"
                                        aria-describedby="textHelp" placeholder="Enter title">
                                    @error('title')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Submission Title Required') }}
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
                                <button style="float:right" class="btn btn-primary mt-2" type="submit">
                                    <span>&nbsp;Submit</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col col-lg-3">
                        <div class="card bg-dark">
                            <div class="card-header text-bold">
                                Marking Assessment:
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
                                    <label for="title">Mark Obtained</label>
                                    <select name="learner_id" id="learner_id" class="form-select mb-4">
                                        <option value="">Select Learner</option>
                                        @foreach ($assessement_submits as $key => $assessment_submit)
                                        <option value="{{$assessment_submit->id}}">{{$assessment_submit->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" id="marks_obtained" name="marks_obtained"
                                        aria-describedby="textHelp" placeholder="Mark Obtained">
                                    @error('marks_obtained')
                                        <div class="alert alert-light text-danger" role="alert">
                                            {{ __('Mark Obtained Required') }}
                                        </div>
                                    @enderror
                                </div>
                                <button style="float:right" class="btn btn-primary mt-2" type="submit">
                                    <span>&nbsp;Update Mark</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </form>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
