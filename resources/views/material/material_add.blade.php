@section('material_add', 'active')
@section('material_child_operate', 'active')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card-header text-bold text-center">{{ $course->course_name }}</div>
    <div class="card-body mt-1">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('material.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card py-2" style="width:58.7rem;">
                        <div class="card-header">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <input class="form-control sm-4 quicksearch" style="width:50rem;" name="quicksearch"
                                    type="text" placeholder="Search" aria-label="Search" id="quicksearch" autofocus>
                                {{-- <button onhover="document.getElementById('quicksearch').value = ''">Clear</button> --}}
                            </nav>
                        </div>
                        <div class="item d-flex flex-wrap">
                            <div class="card-body item-material d-flex flex-wrap" id="item">
                                @if (count($course->materials) > 0)
                                    @foreach ($course->materials as $key => $material)
                                        <div class="card-deck" style="width: 29rem;">
                                            <div class="card mt-2 mb-2 mr-4 px-2">
                                                @if ($material->file_extension == 'pdf' || $material->file_extension == 'png')
                                                    <iframe height="225px" width="100%" src="../../dist/img/files.png"
                                                        name="{{ $material->title }}" style="border:none;">
                                                    </iframe>
                                                @elseif($material->file_extension == 'mp4')
                                                    <video width="370" height="240" controls preload="metadata"
                                                        controlsList="nodownload nofullscreen noremoteplayback">
                                                        <source src="/storage/{{ $material->files }}" type="video/mp4">
                                                    </video>
                                                @endif
                                                <div class="card-body">
                                                    <a href="{{ route('comment.add',['material_id' => $material->id]) }}">
                                                        <h5 class="card-title">{{ $material->title }}</h5>
                                                    </a>
                                                    <p class="card-text">{{ $material->description }}</p>
                                                    <p class="card-text"><small
                                                            class="text-muted">{{ $material->created_at->diffForHumans() }}</small>
                                                    </p>
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
                </div>
                <div class="col col-lg-3">
                    <div class="card bg-dark">
                        <div class="card-header text-bold">
                            Upload Resources:
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <input type="hidden" name="status" value="1">
                                <label for="title">Resource Title</label>
                                <input type="text" class="form-control" id="text" name="title"
                                    aria-describedby="textHelp" placeholder="Enter title">
                                @error('title')
                                    <div class="alert alert-light text-danger" role="alert">
                                        {{ __('Resource Title Required') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control text-wrap" id="description" name="description" placeholder="Description"></textarea>
                                @error('description')
                                    <div class="alert alert-light text-danger" role="alert">
                                        {{ __('Reosurce Description Required') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Files Related to Course : </label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <div class="alert alert-light text-danger" role="alert">
                                        {{ __('Files Required') }}
                                    </div>
                                @enderror
                            </div>

                            <button style="float:right" class="btn btn-primary mt-2" type="submit">
                                <span>&nbsp;Add</span>
                            </button>
                        </div>
                    </div>
                </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
