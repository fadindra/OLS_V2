@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    @extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Course List</h3>
        </div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <!-- /.card-header -->
            <div class="d-flex justify-content-around flex-wrap">
                @foreach ($data as $key => $item)
                    <div class="card text-center">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            @if ($item->image != null)
                                {
                                <img style="min-width:350px; min-height:300px;" class="card-img-top"
                                    src="/storage/{{ $item->image }}"><br>
                                }
                            @else
                                <img style="width:350px; min-height:300px;" class="card-img-top"
                                    src="/storage/{{ $item->image }}"><br>
                            @endif
                        </div>
                        <div class="card-footer text-muted text-bold text-wrap" style="max-width: 400px;min-height:100px;">
                            <h3 class="mt-1">{{ $item->course_name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@endsection
