<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$app->title}}</title>
    <link rel="shortcut icon" href="{{asset('images/apps/'.$app->favicon)}}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweetalert2 -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">


  <!-- Slick CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <link rel="stylesheet" href="{{asset('main.css')}}">

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            @if($app->logo)
                <img src="{{asset('images/apps/'.$app->logo)}}" alt="{{$app->title}}" style="height: 45px;width:auto;">
            @else
                {{$app->title}}
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li> --}}
            @Auth
            <li class="nav-item">
            <a class="nav-link" href="{{url('dashboard')}}">Dashboard</a>
            </li>
            @else
            <li class="nav-item">
            <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
            @endauth
            
        </ul>
        <div class="d-flex">
            <a  class="btn btn-primary">Get Started</a>
        </div>
        </div>
    </div>
    </nav>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="notice-marquee shadow-sm">
                    <div class="notice-track">
                        @foreach($notices as $notice)
                            <a href="#" class="notice-item">{{ $notice->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.notice-marquee {
    overflow: hidden;
    white-space: nowrap;
    position: relative;
    padding: 10px 0; 
}

.notice-track {
    display: inline-block;
    animation: scroll-left 20s linear infinite;
}

.notice-item {
    display: inline-block;
    margin-right: 50px;
    font-weight: 500;
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s;
}

.notice-item:hover {
    color: #0056b3;
}

/* Animation */
@keyframes scroll-left {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

/* Pause animation on hover */
.notice-marquee:hover .notice-track {
    animation-play-state: paused;
}



</style>


    @php
        $app->youtube_embed = preg_replace(
            "/^.*(?:youtu\.be\/|v=)([a-zA-Z0-9_-]+).*$/",
            "https://www.youtube.com/embed/$1",
            $app->youtube
        );
    @endphp

<section>
    <style>
        .banner-youtube{ width: 100%; height: 500px; }
        @media only screen and (max-width: 600px) {
            .banner-youtube{ height: 250px; }
        }
    </style>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <iframe class="banner-youtube"
                    src="{{ $app->youtube_embed }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>



    <section>
        <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="slider">
                @foreach($reviews as $review)
                <div class="card">
                    <div style="height: 250px;width:100%; 
                    background-image:url({{asset('images/studentreviews/'.$review->image)}});
                    background-position:center;
                    background-size:cover;
                    background-repeat:no-repeat;
                    "></div>
                    {{-- <img style="height: " src="" class="card-img-top" alt="image"> --}}
                    <div class="card-body">
                    <h5 class="card-title">{{$review->name}}</h5>
                    <p class="card-text mb-0">{{$review->varsity}}</p>
                    <p class="card-text mb-0">{{$review->review}}</p>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>




    
        <!-- sweetalert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });
            @endif
            });
        </script> 

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Slick JS -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: true,
            responsive: [
                {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
                },
                {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
                }
            ]
            });
        });
        </script>

        <script src="{{asset('main.js')}}"></script>

</body>
</html>