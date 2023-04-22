@section('instructor_view', 'active')
@section('admin_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <div class="card" style="overflow-y: scroll; height: 100%; margin-left: -15px;">
        <div class="card-header">
            <h3 class="card-title">Instructor Lists</h3>
        </div>
        <div class="card-body mt-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">S.N</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instructors as $key => $instructor)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $instructor->name }}</td>
                            <td>{{$instructor->email}}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card -->
    </div>
@endsection
