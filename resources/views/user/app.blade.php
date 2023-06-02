{{-- Header --}}
{{-- Header --}}
{{-- Header --}}
<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- oswiper-crousel -->
    <link rel="stylesheet" href="assets\swiper\swiper-bundle.min.css">

    <title>FYP</title>
</head>

<body>


    <section class="mynav">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class=" nav-head ms-3" >
                    <a href="{{url('/')}}"><img  src="assets/images/logo.png" alt="Not found" ></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header ">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">HelpAcre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body ">
                        <ul class="navbar-nav mx-auto  pe-5 my-2 my-lg-0 navbar-nav-scroll">

                            <li class="nav-item mx-3">
                                <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/about') }}">About Us</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link" href="{{ url('/project') }}">Projects</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/event') }}">Social Events</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/gallery') }}">Gallery</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link " href="{{ url('/contact') }}">Contact</a>
                            </li>

                        </ul>

                        <div class="profile-box">

                            @if (!Auth::id())
                                <button class="btn-2"><a href="login" class="text-white text-decoration-none">
                                        Login</a></button>
                            @else
                                <button class="btn-2"><a href="/profile" class="text-white text-decoration-none">
                                        Profile</a></button>
                                @if (Auth::user()->role == 1)
                                    <a href="{{ url('/dash') }}"><button class="btn-2">Dashboard</button></a>
                                @else
                                    <button class="btn-2">


                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </form>

                                    </button>
                                @endif

                            @endif
                        </div>

                    </div>


                </div>
            </div>
        </nav>
        <!-- <div class="cart-box">
            
        </div> -->

    </section>

    



    {{-- including content fron other pages --}}
    {{-- including content fron other pages --}}
    {{-- including content fron other pages --}}



    @yield('content')





    <!-- Footer coding -->
    <!-- Footer coding -->
    <!-- Footer coding -->
    <div class="container-fluid  text-light footer text-center mt-5">
        <div class="row pt-4 ">
            <div class="col-lg-4  col-sm-12">
                <h2 class=" my-4"><em>HelpAcre</em></h2>
                <p class="h5">Your Help,their Need</p>
            </div>
            <div class="col-lg-4 col-sm-4 col-sm-12  mt-4 ">
                <h4>Explore Us and make the life easy and progressive for someone</h4>
                
            </div>
            <div class="col-lg-4  col-sm-12  footer-media">
                <div class="footer-icon mt-4">
                    <a href="#" class="mx-1"><i class="fa fa-facebook "></i></a>
                    <a href="#" class="mx-1"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="mx-1"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="mx-1"><i class="fa fa-dribbble"></i></a>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                <h2 class=" my-4"><em>HelpAcre</em></h2>
            </div> --}}
            <div class="col-lg-4 col-md-6 col-sm-12 my-4 tabs">
                <a href="{{url('/about')}}"><p class="h6">About Us</p></a>
                <a href="{{url('/project')}}" ><p class="mt-3" class="h6">Projects</p></a>
                <a href="{{url('/event')}}" ><p class="mt-3" class="h6">Events</p></a>
                <a href="{{url('/gallery')}}" ><p class="mt-3" class="h6">Gallery</p></a>
                <a href="{{url('/contact')}}" ><p class="mt-3" class="h6">Contact Us</p></a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-4">
                <h4>Phone & Email</h4>
                <br>
                <p>support@gmail.com</p>
                <p>+1 212-683-9756</p>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-4">
                <h4> Office Address</h4>
                <br>
                <p>799 W 6th st hoisington, kansas 121</p>
                <p>sparrow Halk, Alberta</p>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-8 my-3">
                <p>Copyright &copy;2022 All rights reserved </p>
            </div>
            <div class="col-lg-4 text-center my-3">
                <p> Term and Use &nbsp;&nbsp; &nbsp;&nbsp;Privacy Policy</p>
            </div>

        </div>
    </div>












    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


    <script src="assets\swiper\swiper-bundle.min.js"></script>
    <script src="assets\countMe\countMe.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 3,
            spaceBetween: 40,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false
            },

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
    <script>
        // $(selector).countMe(speed,delay)
        // to increase counting speed decrease delay and increase speed and vice versa

        $("#counter").countMe(50, 60);
        $("#counter2").countMe(80, 45);
        $("#counter3").countMe(10, 130);
        $("#counter4").countMe(50, 60);
    </script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 40) {
                    $("#top-btn").fadeIn();
                } else {
                    $("#top-btn").fadeOut();
                }
            });

            $("#top-btn").click(function() {
                $('html,body').animate({
                    scrollTop: 0
                }, 1000);
            });
        });


        // $(window).on("load", function() {
        //     $("#preloader").fadeOut(3000);

        // });
    </script>





</body>

</html>
