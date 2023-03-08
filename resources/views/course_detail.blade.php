@extends('layout.config')
@extends('layout.custom_navbar')
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
                            <p class="card-text">Description of the Course : {{ $course->description }}</p>
                            <p class="card-text">Price of the Course : NRs. {{ $course->price }} -/</p>
                            @guest
                            <a href="{{ route('login') }}" class="btn btn-primary">Purchase Course</a>
                            @else
                            <a href="{{ route('course.payment') }}" class="btn btn-primary">Purchase Course</a>
                            @endguest
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