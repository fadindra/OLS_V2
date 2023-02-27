@section('material_view', 'active')
@section('material_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">View Resources</div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('material.add') }}" method="get">
                @csrf
                Select Course :
                <select name="course_id" class="js-example-basic-single js-states form-control-sm" id="courses">
                    @if ($data->isNotEmpty())
                        <option selected>Select</option>
                        @foreach ($data as $key => $item)
                            <option value="{{ $item->id }}">{{ $item['course_name'] }}
                            </option>
                        @endforeach
                    @else
                        <div>
                            <option selected>Courses Not Available</option>
                        </div>
                    @endif
                </select>
                <button class="btn btn-info mt-2" type="submit" title="Search Courses">
                    <span class="fas fa-search">&nbsp;Get</span>
                </button>
            </form>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
