@section('course_payment', 'active')
@section('course_child_operate', 'menu-open')
@extends('layout.layout')
@section('sidebar')
    @include('layout.sidebar')
@endsection

@section('content')
    <section class="bg-light" id="course_detail">
        <div class="container mt-3">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex align-content-start flex-wrap">
                        <div class="card mt-3 px-3 py-3 lead" style="width: 80rem;margin-right:40px;">
                            <form action="{{ route('pay') }}" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="amount" value="{{ $course->price }}">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="card-header text-center">Invoice</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3" style="border-right:2px solid">
                                            <img style="width:15rem; height:10rem;" class="card-img-top mt-2 mb-2"
                                                src="/storage/{{ $course->image }}"><br>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Course Name : {{ $course->course_name }}</p>
                                            <p class="card-text">Price of the Course : NRs. {{ $course->price }} -/</p>
                                            <p class="card-text">Total to Pay : NRs. {{ $course->price }} -/</p>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" value="pay">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
