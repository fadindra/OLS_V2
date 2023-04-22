@extends('layout.config')
@extends('layout.custom_navbar')
<div class="card">
    <div class="card-header">View Resources</div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-12">
                <div class="d-flex align-content-start flex-wrap">
                    <div class="mt-3 px-3 py-3 lead" style="width: 90rem;margin-right:20px;">
                        <div class="card-body">
                            <div class="row">
                                {{-- @dd($role); --}}
                                <div class="col-3" style="border-right:2px solid">
                                    <img style="width:15rem; height:10rem;" class="card-img-top mt-2 mb-2"
                                        src="/storage/{{ $course->image }}"><br>
                                </div>
                                <div class="col">
                                    <p class="card-text">Course Name : {{ $course->course_name }}</p>
                                    <p class="card-text">Description of the Course : {{ $course->description }}</p>
                                    <p class="card-text">Price of the Course : NRs. {{ $course->price }} -/</p>
                                    {{-- <p class="card-text">Added By : {{ $instructor[0]->name }}</p> --}}
                                    @if ($role == null)
                                        <a href="{{ route('login') }}" class="btn btn-primary">Purchase
                                            Course</a>
                                    @else
                                        @if ($role == 'learner')
                                            <a href="{{ route('course.payment', ['course' => $course->id]) }}"
                                                class="btn btn-primary">Purchase Course</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">Course Materials</div>
                            <hr>
                            <div class="item d-flex flex-wrap">
                                <div class="card-body item-material d-flex flex-wrap" id="item">
                                    @if (count($course->materials) > 0)
                                        @foreach ($course->materials as $key => $material)
                                            <style>
                                                #player {
                                                    pointer-events: none
                                                }
                                            </style>
                                            <div class="card-deck" style="width: 18rem;">
                                                <div class="card mt-2 mb-2 mr-4 py-2">
                                                    @if ($material->file_extension == 'pdf' || $material->file_extension == 'png')
                                                        <iframe height="225px" width="100%"
                                                            src="../../dist/img/files.png" name="{{ $material->title }}"
                                                            style="border:none;">
                                                        </iframe>
                                                    @elseif($material->file_extension == 'mp4' || $material->file_extension == 'mp3')
                                                        <video width="255" height="225px" controls="controls"
                                                            preload="true" muted loop id="player" preload="metadata"
                                                            poster="/storage/{{ $material->files }}">
                                                            <source src="/storage/{{ $material->files }}"
                                                                type="video/mp4">
                                                        </video>
                                                    @endif
                                                    <div class="card-body">
                                                        <p class="card-text">{{ $material->title }}</p>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        const mainNav = document.body.querySelector('#mainNav');
        if (mainNav) {
            new bootstrap.ScrollSpy(document.body, {
                target: '#mainNav',
                offset: 74,
            });
        };
        const navbarToggler = document.body.querySelector('.navbar-toggler');
        const responsiveNavItems = [].slice.call(
            document.querySelectorAll('#navbarResponsive .nav-link')
        );
        responsiveNavItems.map(function(responsiveNavItem) {
            responsiveNavItem.addEventListener('click', () => {
                if (window.getComputedStyle(navbarToggler).display !== 'none') {
                    navbarToggler.click();
                }
            });
        });

    });
    var video = document.getElementById("player");
    video.addEventListener("canplay", function() {
        setTimeout(function() {
            video.play();
        }, 100);
    });
</script>
</body>

</html>
