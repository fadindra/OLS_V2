<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Learning System</title>
    {{-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="{{route('homepage')}}">Online Learning System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> --}}
                    <li class="nav-item"><a class="nav-link" href="#course_detail">Course Detail</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    {{-- <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Welcome to OLS</h1>
            <p class="lead">A digital Online Learning Platform</p>
            <a class="btn btn-lg btn-light" href="#course_detail">Get Started!</a>
        </div>
    </header> --}}
    <section class="bg-light" id="course_detail">
        <div class="container px-4 mt-3">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex align-content-start flex-wrap">
                        <div class="card mt-3 px-3 py-3 lead" style="width: 80rem;margin-right:40px;">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-2">Course Name: {{ $course->course_name }}</h5>
                                <img style="width:45rem; height:20rem; margin-left:250px" class="card-img-top mt-2 mb-2"
                                    src="/storage/{{ $course->image }}"><br>
                                <p class="card-text">Description of the Course : {{$course->description}}</p>
                                <p class="card-text">Price of the Course : NRs. {{$course->price}} -/</p>
                                <a href="{{route('register')}}" class="btn btn-primary">Purchase Course</a>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; OLS 2023</p>
        </div>
    </footer>
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
    </script>
</body>

</html>
