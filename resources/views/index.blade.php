@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection
