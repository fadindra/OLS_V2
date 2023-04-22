@section('material_view', 'active')
@section('material_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="overflow-y: scroll; height: 100%; margin-left: -15px;">
        <div class="card-header">View Resources</div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {{-- @dd($data) --}}
            <form action="{{ route('material.add') }}" method="get">
                @csrf
                @if ($data->count())
                    Select Course :
                    <select name="course_id" class="js-example-basic-single js-states form-control-sm" id="courses">
                        <option selected>Select</option>
                        @foreach ($data as $key => $item)
                            @if ($role == 'instructor')
                                <option value="{{ $item->id }}">
                                    {{ $item->course_name }}
                                </option>
                            @else
                                <option value="{{ $item->course_id }}">
                                    {{ $item->course->course_name }}
                                </option>
                            @endif
                        @endforeach
                    </select>

                    <button class="btn btn-info mt-2" type="submit" title="Search Courses">
                        <span class="fas fa-search">&nbsp;Get</span>
                    </button>
            </form>
        @else
        @if ($role == 'learner')
            <div class="text-center bg-danger px-2 py-2">Courses Not Purchased !!</div>
            @else
            <div class="text-center bg-danger px-2 py-2">Courses Not Added !!</div>
        @endif
            @endif

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
