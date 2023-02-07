@extends('layout.config')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <style>
        <style>
        .navbar {
            border: none;
            outline: none;
            padding: 10px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
            font-size: 18px;
        }
        .badge {
            border: none;
            outline: none;
            padding: 10px 16px;
            background-color: #f1f1f1;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
        }

        /* Style the active class, and buttons on mouse-over */
        .active,
        .btn:hover {
            background-color: rgb(51, 160, 255);
            color: white;
        }

        .active,
        .login:hover {
            background-color: blue;
            color: white;
        }

        .signup:hover {
            background-color: red;
            color: white;
        }
    </style>
    </style>
    <div class="container">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="{{ route('homepage') }}">OLS</a>
            <div class="collapse navbar-collapse px-4 mr-auto" id="navbarSupportedContent">
                <div id="navbar">
                    <button class="btn active">Home</button>
                    <button class="btn">About Us</button>
                    <button class="btn" onclick="courses()">Courses</button>
                    <button class="btn">Pricing</button>
                </div>
            </div>
            <a class="badge login mr-2" href="#">Log In</a>
            <a class="badge signup" href="#">Sign Up</a>
        </nav>
        <hr>
        <div class="card-deck mt-3 text-wrap" id="courses" style="visibility: hidden">
            <div class="card">
                <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                        content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                        content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src=".../100px200/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                        content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function courses() {
            var x = document.getElementById("courses");
            if (window.getComputedStyle(x).visibility === "hidden") {
                x.style.visibility = "visible";
            }
        }
        var navbar = document.getElementById("navbar");
        var btns = navbar.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
@endsection
