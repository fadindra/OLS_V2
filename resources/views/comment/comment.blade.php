@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="height: 38.7rem;">
        <div class="card-header text-center">{{ $material->title }}</div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">
                        <input type="hidden" name="material_id" value="{{ $material->id }}">
                        <input type="hidden" name="course_id" value="{{ $material->course_id }}">
                        @if(auth()->user()->role=='instructor')
                        <input type="hidden" name="instructor_id" value="{{auth()->user()->id}}">
                        @else
                        <input type="hidden" name="learner_id" value="{{auth()->user()->id}}">
                        @endif
                        <input type="hidden" name="status" value="1">
                        <div class="card" style="height: 34.5rem;">
                            @if ($material->file_extension == 'pdf' || $material->file_extension == 'png')
                                <iframe style="height: 35rem;" src="/storage/{{ $material->files }}">
                                @elseif($material->file_extension == 'mp4')
                                    <video width="945" height="547" class="px-2"controls preload="metadata"
                                        controlsList="nodownload nofullscreen noremoteplayback">
                                        <source src="/storage/{{ $material->files }}" type="video/mp4">
                                    </video>
                            @endif
                            </iframe>
                        </div>
                    </div>
                    <style>
                        .container {
                            border: 2px solid #dedede;
                            background-color: #f1f1f1;
                            border-radius: 5px;
                            padding: 10px;
                            margin: 10px 0;
                            height:
                        }

                        /* Darker chat container */
                        .darker {
                            border-color: #ccc;
                            background-color: #ddd;
                        }

                        /* Clear floats */
                        .container::after {
                            content: "";
                            clear: both;
                            display: table;
                        }

                        /* Style images */
                        .container img {
                            float: left;
                            max-width: 60px;
                            width: 100%;
                            margin-right: 20px;
                            border-radius: 50%;
                        }

                        /* Style the right image */
                        .container img.right {
                            float: right;
                            margin-left: 20px;
                            margin-right: 0;
                        }

                        /* Style time text */
                        .time-right {
                            float: right;
                            color: #aaa;
                        }

                        /* Style time text */
                        .time-left {
                            float: left;
                            color: #999;
                        }
                    </style>
                    <div class="col-md-3">
                        <div class="card" style="width: 19rem; height:26rem;overflow-y:auto;">
                            <div class="card-header text-center bg-black">Comments</div>
                            <div class="card-body">
                                    @if ($comments != null)
                                        @foreach ($comments as $key => $comment)
                                            @if ($comment->learner_id != null && $comment->material_id == $material->id)
                                                <div class="container">
                                                    <img src="">
                                                    <p>{{ $comment->comment_text }}</p>
                                                    <span class="time-right">Learner</span><br>
                                                    <span class="time-right">{{ $comment->created_at }}</span>
                                                </div>
                                            @elseif($comment->instructor_id != null && $comment->material_id == $material->id)
                                                <div class="container darker">
                                                    <img src="" class="right">
                                                    <p>{{ $comment->comment_text }}</p>
                                                    <span class="time-left">Instructor</span><br>
                                                    <span class="time-left">{{ $comment->created_at }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                            <p>No Comments Yet !!</p>
                                    @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <textarea type="text" style="width:15rem" placeholder="Type Comment" name="comment_text"></textarea><br>
                            <button class="">Send</button>
                        </div>
                    </div>
            </form>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
