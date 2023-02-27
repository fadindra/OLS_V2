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
            <a class="navbar-brand" href="#page-top">Online Learning System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#courses">Courses Offered</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-primary bg-gradient text-white">
        <div class="container px-4 text-center">
            <h1 class="fw-bolder">Welcome to OLS</h1>
            <p class="lead">A digital Online Learning Platform</p>
            <a class="btn btn-lg btn-light" href="#courses">Get Started!</a>
        </div>
    </header>
    <!-- About section-->
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>About this page</h2>
                    <p class="lead">This is a great place to talk about your webpage. This template is purposefully
                        unstyled so you can use it as a boilerplate or starting point for you own landing page designs!
                        This template features:</p>
                    <ul>
                        <li>Clickable nav links that smooth scroll to page sections</li>
                        <li>Responsive behavior when clicking nav links perfect for a one page website</li>
                        <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the
                            navbar</li>
                        <li>Minimal custom CSS so you are free to explore your own unique design options</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Services section-->
    <section class="bg-light" id="courses">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Courses we offer</h2>
                    <p class="lead">We offer the various courses among all the topics and the learners can choose the best among the courses available</p>
                   <div class="d-flex align-content-start flex-wrap">
                    @foreach ($data as $key => $item)
                        <div class="card mt-3 px-3 py-3 lead" style="width: 15rem;margin-right:40px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->course_name }}</h5>
                                <p class="card-text">{{$item->description}}</p>
                                <a href="{{route('course.detail',$item->id)}}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    @endforeach
                   </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section-->
    <section id="contact">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-8">
                    <h2>Contact us</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat
                        voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et
                        repudiandae ipsa exercitationem, in, quo totam.</p>
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
